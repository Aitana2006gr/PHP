<?php
require_once "conexion.php";

// Cargar equipos
$stmt = $conexion->prepare("SELECT nombre FROM equipos ORDER BY nombre");
$stmt->execute();
$equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$jugadores = [];

if (isset($_POST["equipo"])) {
    $stmt2 = $conexion->prepare("SELECT codigo, nombre, peso FROM jugadores WHERE nombre_equipo = :eq");
    $stmt2->bindParam(":eq", $_POST["equipo"]);
    $stmt2->execute();
    $jugadores = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}

// Actualizar pesos
if (isset($_POST["actualizar"])) {
    foreach ($_POST["pesos"] as $cod => $pesoNuevo) {
        $stmt = $conexion->prepare("UPDATE jugadores SET peso = :p WHERE codigo = :c");
        $stmt->bindParam(":p", $pesoNuevo);
        $stmt->bindParam(":c", $cod);
        $stmt->execute();
    }
    echo "<p>Pesos actualizados correctamente.</p>";
}
?>

<form method="POST">
    <label>Equipo:</label>
    <select name="equipo" onchange="this.form.submit()">
        <option value="">Selecciona</option>
        <?php foreach($equipos as $e): ?>
            <option value="<?= $e['nombre'] ?>" <?= (isset($_POST["equipo"]) && $_POST["equipo"] == $e["nombre"]) ? "selected" : "" ?>>
                <?= $e['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<?php if (!empty($jugadores)): ?>
<form method="POST">
    <input type="hidden" name="equipo" value="<?= $_POST['equipo'] ?>">

    <table border="1" cellpadding="5">
        <tr><th>Jugador</th><th>Peso</th></tr>

        <?php foreach($jugadores as $j): ?>
            <tr>
                <td><?= $j["nombre"] ?></td>
                <td><input type="text" name="pesos[<?= $j['codigo'] ?>]" value="<?= $j['peso'] ?>"></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <input type="submit" name="actualizar" value="Actualizar">
</form>
<?php endif; ?>
