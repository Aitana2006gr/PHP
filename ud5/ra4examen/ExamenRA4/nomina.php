<?php
    session_start();
    include 'funciones.php';

    // Inicializar empleado_id si no existe
    if (!isset($_SESSION['empleado_id'])) {
        $_SESSION['empleado_id'] = 1;
    }

    // Recuperar datos del empleado si se está modificando
    if (isset($_SESSION['empleado_data'])) {
        $empleado_data = $_SESSION['empleado_data'];
        $empleado_id = $_SESSION['empleado_id'];
        // Limpiar empleado_data después de cargar
        unset($_SESSION['empleado_data']);
    } else {
        $empleado_id = $_SESSION['empleado_id'];
        $empleado_data = array(
            'nombre' => '',
            'sueldo_base' => '',
            'clave_departamento' => '',
            'extras' => array(),
            'num_hijos' => 0
        );
    }

    $extras = get_extras();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nómina Empleado <?php echo htmlspecialchars($empleado_id); ?></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class="container1">
            <h2>Empleado Número: <?php echo htmlspecialchars($empleado_id); ?></h2>

            <!-- Mostrar mensajes de error si existen -->
            <?php
            if (isset($_SESSION['error'])) {
                echo '<p class="error">' . htmlspecialchars($_SESSION['error']) . '</p>';
                unset($_SESSION['error']);
            }
            ?>

            <!-- Formulario para Calcular Nómina -->
            <div class="container2">
                <form action="resultado.php" method="post">
                    <div class="form-group">
                        <label>Nombre del Empleado:</label>
                        <input type="text" name="nombre" value="<?php echo htmlspecialchars($empleado_data['nombre']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Sueldo Base:</label>
                        <input type="number" name="sueldo_base" value="<?php echo htmlspecialchars($empleado_data['sueldo_base']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Clave de Departamento:</label>
                        <input type="text" name="clave_departamento" value="<?php echo htmlspecialchars($empleado_data['clave_departamento']); ?>" required>
                    </div>

                    <div class="form-group extras-group">
                        <label>Conceptos Extra:</label>
                        <div class="extras">
                            <?php foreach ($extras as $key => $value): ?>
                                <div class="inline-label">
                                    <input type="checkbox" name="extras[]" value="<?php echo htmlspecialchars($key); ?>" <?php echo in_array($key, $empleado_data['extras']) ? 'checked' : ''; ?>> <?php echo htmlspecialchars($key) ; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="form-group hijos-group">
                        <label>Número de Hijos:</label>
                        <div class="hijos compact">
                            <?php for ($i = 0; $i <= 4; $i++): ?>
                                <div class="radio-item">
                                    <input type="radio" name="num_hijos" value="<?php echo $i; ?>" <?php echo ($empleado_data['num_hijos'] == $i) ? 'checked' : ''; ?>> <?php echo $i; ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <br>

                    <div class="form-buttons">
                        <button type="submit" name="accion" value="calcular" class="btn btn-primary">Calcular Nómina</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container1">
            <!-- Formulario para Cerrar Sesión -->
            <form action="resultado.php" method="post">
                <div class="form-buttons">
                    <button type="submit" name="accion" value="cerrar" class="btn btn-secondary">Cerrar Sesión</button>
                </div>
            </form>
        </div>
    </body>
</html>
