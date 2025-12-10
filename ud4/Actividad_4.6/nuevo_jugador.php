<?php
require_once "conexion.php";

function e($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }

$mensajes = []; // array de mensajes de error / éxito

// Cargar equipos para el primer select
try {
    $stmt = $conexion->prepare("SELECT nombre FROM equipos ORDER BY nombre");
    $stmt->execute();
    $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    die("Error cargando equipos: " . e($ex->getMessage()));
}

// Si seleccionado equipo para cargar jugadores (o para mantener selección)
$jugadores = [];
$equipoSeleccionado = $_POST['equipo'] ?? '';

// Cargar jugadores si hay equipo seleccionado (preserva selección)
if (!empty($equipoSeleccionado)) {
    $stmt = $conexion->prepare("SELECT codigo, nombre FROM jugadores WHERE nombre_equipo = :eq ORDER BY nombre");
    $stmt->execute([':eq' => $equipoSeleccionado]);
    $jugadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Procesar envío de transacción (baja + alta)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operar'])) {
    // Recoger y sanear valores brutos (no los convertimos aún)
    $equipo = $_POST['equipo'] ?? '';
    $cod_baja = $_POST['baja'] ?? '';
    $nuevo_codigo = $_POST['nuevo_codigo'] ?? '';
    $nuevo_nombre = trim($_POST['nuevo_nombre'] ?? '');
    $procedencia = trim($_POST['procedencia'] ?? null);
    $altura = trim($_POST['altura'] ?? null);
    $peso = trim($_POST['peso'] ?? null);
    $pos = trim($_POST['pos'] ?? null);

    // Validaciones básicas
    if (empty($equipo)) {
        $mensajes[] = "Debes seleccionar un equipo.";
    }
    if (empty($cod_baja)) {
        $mensajes[] = "Debes seleccionar el jugador que recibirá la baja.";
    }
    if ($nuevo_codigo === '' || !is_numeric($nuevo_codigo) || intval($nuevo_codigo) < 0) {
        $mensajes[] = "El código del nuevo jugador debe ser un número entero no negativo.";
    } else {
        $nuevo_codigo = intval($nuevo_codigo);
    }
    if ($nuevo_nombre === '') {
        $mensajes[] = "El nombre del nuevo jugador es obligatorio.";
    }
    // altura y peso, si se proporcionan, deben ser numéricos (pero no obligatorios)
    if ($altura !== '' && !is_numeric($altura)) {
        $mensajes[] = "La altura debe ser un número (ej: 1.98).";
    }
    if ($peso !== '' && !is_numeric($peso)) {
        $mensajes[] = "El peso debe ser un número (ej: 95.5).";
    }

    // Si ya hay errores de validación, no seguimos
    if (empty($mensajes)) {
        try {
            // Comprobaciones en BD antes de la transacción
            // 1) ¿existe el jugador que se va a dar de baja en ese equipo?
            $stmt = $conexion->prepare("SELECT codigo FROM jugadores WHERE codigo = :c AND nombre_equipo = :eq");
            $stmt->execute([':c' => $cod_baja, ':eq' => $equipo]);
            $filaBaja = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$filaBaja) {
                $mensajes[] = "El jugador seleccionado para la baja no existe en el equipo elegido.";
            } else {
                $cod_baja = intval($cod_baja);
            }

            // 2) ¿el nuevo código ya existe en otro jugador distinto al que se va a dar de baja?
            //    (si reutilizas el mismo código del jugador dado de baja está permitido porque lo borramos antes)
            $stmt = $conexion->prepare("SELECT COUNT(*) AS cnt FROM jugadores WHERE codigo = :cod AND codigo <> :cod_baja");
            $stmt->execute([':cod' => $nuevo_codigo, ':cod_baja' => $cod_baja]);
            $r = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($r && intval($r['cnt']) > 0) {
                $mensajes[] = "El código $nuevo_codigo ya está siendo usado por otro jugador. Elige otro código.";
            }

            // 3) opcional: comprobar que el equipo existe (defensivo)
            $stmt = $conexion->prepare("SELECT COUNT(*) AS cnt FROM equipos WHERE nombre = :eq");
            $stmt->execute([':eq' => $equipo]);
            $r2 = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$r2 || intval($r2['cnt']) === 0) {
                $mensajes[] = "El equipo seleccionado no existe.";
            }

            // Si todo ok, realizar la transacción
            if (empty($mensajes)) {
                $conexion->beginTransaction();

                // Borrar estadísticas del jugador que se da de baja (si hay)
                $stmt = $conexion->prepare("DELETE FROM estadisticas WHERE jugador = :c");
                $stmt->execute([':c' => $cod_baja]);

                // Borrar jugador
                $stmt = $conexion->prepare("DELETE FROM jugadores WHERE codigo = :c");
                $stmt->execute([':c' => $cod_baja]);
                $filasBorradas = $stmt->rowCount();
                if ($filasBorradas === 0) {
                    // algo raro: no se borró
                    throw new Exception("No se pudo borrar el jugador seleccionado (posible conflicto).");
                }

                // Insertar nuevo jugador
                $sqlInsert = "INSERT INTO jugadores (codigo, nombre, procedencia, altura, peso, posicion, nombre_equipo)
                              VALUES (:codigo, :nombre, :proc, :alt, :peso, :pos, :eq)";
                $stmt = $conexion->prepare($sqlInsert);
                $stmt->execute([
                    ':codigo' => $nuevo_codigo,
                    ':nombre' => $nuevo_nombre,
                    ':proc'   => $procedencia ?: null,
                    ':alt'    => ($altura !== '') ? $altura : null,
                    ':peso'   => ($peso !== '') ? $peso : null,
                    ':pos'    => $pos ?: null,
                    ':eq'     => $equipo
                ]);

                // Commit si todo OK
                $conexion->commit();
                $mensajes[] = "Operación completada con éxito: jugador dado de baja (código $cod_baja) y nuevo jugador insertado (código $nuevo_codigo).";

                // Vaciar campos para no mostrar datos viejos
                $equipoSeleccionado = '';
                $jugadores = [];
                $_POST = []; // limpia para que el formulario no conserve valores
            }

        } catch (PDOException $pe) {
            // Capturamos errores SQL y hacemos rollback, devolvemos mensaje amigable
            if ($conexion->inTransaction()) $conexion->rollBack();
            // Detectar error de duplicado por si se coló algo no previsto
            if ($pe->getCode() == 23000) {
                $mensajes[] = "Error de integridad: probablemente exista ya un jugador con ese código. Elige otro código.";
            } else {
                $mensajes[] = "Error en la base de datos: " . e($pe->getMessage());
            }
        } catch (Exception $ex) {
            if ($conexion->inTransaction()) $conexion->rollBack();
            $mensajes[] = "Error: " . e($ex->getMessage());
        }
    } // fin si no hay mensajes
} // fin POST operar

// Si el usuario simplemente ha seleccionado equipo para rellenar el segundo desplegable, lo respetamos:
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['equipo']) && !isset($_POST['operar'])) {
    $equipoSeleccionado = $_POST['equipo'];
    // recargar jugadores
    $stmt = $conexion->prepare("SELECT codigo, nombre FROM jugadores WHERE nombre_equipo = :eq ORDER BY nombre");
    $stmt->execute([':eq' => $equipoSeleccionado]);
    $jugadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Dar de baja e insertar jugador (transacción)</title>
</head>
<body>
    <h2>Transferencia (baja + alta) — transacción</h2>

    <?php if (!empty($mensajes)): ?>
        <ul>
            <?php foreach ($mensajes as $m): ?>
                <li><?= e($m) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Formulario principal: seleccionar equipo (recarga la página para mostrar jugadores) -->
    <form method="POST" style="margin-bottom:1em;">
        <label>Equipo:
            <select name="equipo" onchange="this.form.submit()">
                <option value="">-- selecciona --</option>
                <?php foreach ($equipos as $eq): ?>
                    <option value="<?= e($eq['nombre']) ?>" <?= ($equipoSeleccionado === $eq['nombre']) ? 'selected' : '' ?>>
                        <?= e($eq['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <noscript><input type="submit" value="Cargar jugadores"></noscript>
    </form>

    <?php if (!empty($jugadores)): ?>
    <!-- Formulario para hacer la operación -->
    <form method="POST">
        <input type="hidden" name="equipo" value="<?= e($equipoSeleccionado) ?>">

        <label>Jugador a dar de baja:
            <select name="baja" required>
                <option value="">-- selecciona jugador --</option>
                <?php foreach ($jugadores as $j): ?>
                    <option value="<?= e($j['codigo']) ?>"><?= e($j['nombre']) ?> (<?= e($j['codigo']) ?>)</option>
                <?php endforeach; ?>
            </select>
        </label>
        <hr>
        <h3>Datos del nuevo jugador</h3>
        <label>Código*: <input type="number" name="nuevo_codigo" value="<?= e($_POST['nuevo_codigo'] ?? '') ?>" required></label><br>
        <label>Nombre*: <input type="text" name="nuevo_nombre" value="<?= e($_POST['nuevo_nombre'] ?? '') ?>" required></label><br>
        <label>Procedencia: <input type="text" name="procedencia" value="<?= e($_POST['procedencia'] ?? '') ?>"></label><br>
        <label>Altura: <input type="text" name="altura" value="<?= e($_POST['altura'] ?? '') ?>"></label><br>
        <label>Peso: <input type="text" name="peso" value="<?= e($_POST['peso'] ?? '') ?>"></label><br>
        <label>Posición: <input type="text" name="pos" value="<?= e($_POST['pos'] ?? '') ?>"></label><br>

        <button type="submit" name="operar">Realizar traspaso (baja + alta)</button>
    </form>
    <?php elseif ($equipoSeleccionado !== ''): ?>
        <p>El equipo seleccionado no tiene jugadores para mostrar.</p>
    <?php endif; ?>

    <p><small>*Campos obligatorios</small></p>
</body>
</html>

