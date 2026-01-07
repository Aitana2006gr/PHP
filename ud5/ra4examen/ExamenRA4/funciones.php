<?php
    // Datos de Conceptos Extra
    function get_extras() {
        return array(
            "Noche" => 100,
            "Festivo" => 60,
            "Hora" => 35,
            "Peligro" => 120,
            "Otros" => 70
        );
    }

    // Datos de Departamentos
    function get_departamentos() {
        return array(
            "D001" => "Contabilidad",
            "D002" => "Marketing",
            "D003" => "Ventas",
            "D004" => "Soporte Técnico",
            "D005" => "Recursos Humanos"
        );
    }

    // Función para Calcular la Nómina
    function calcular_nomina($sueldo_base, $extras, $num_hijos) {
        $importe_extra = array_sum($extras);
        return $sueldo_base + $importe_extra + (10 * $num_hijos);
    }

    // Función para Obtener el Nombre del Departamento
    function obtener_departamento($clave_departamento) {
        $departamentos = get_departamentos();
        return isset($departamentos[$clave_departamento]) ? $departamentos[$clave_departamento] : "General";
    }

    // Función para Cerrar Sesión y Mostrar el Listado de Empleados
    function cerrar_sesion_y_mostrar_listado() {
        // Comprobar si una sesión ya está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar si hay empleados en la sesión
        if (isset($_SESSION['empleados']) && !empty($_SESSION['empleados'])) {
            $empleados = $_SESSION['empleados'];
            // Calcular el total_empresa
            $total_empresa = 0;
            foreach ($empleados as $empleado) {
                $total_empresa += $empleado['salario'];
            }
        } else {
            $empleados = array();
            $total_empresa = 0;
        }

        // Destruir la sesión para cerrar sesión
        session_destroy();

        // Mostrar el listado de empleados
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Listado de Empleados</title>
                <link rel="stylesheet" type="text/css" href="styles.css">
            </head>
            <body>
                <div class="container2">
                    <h2>Listado de Empleados y sus Salarios</h2>
                    <?php if (!empty($empleados)): ?>
                        <ul>
                            <?php foreach ($empleados as $empleado): ?>
                                <li><?php echo htmlspecialchars($empleado['nombre']); ?>: <?php echo htmlspecialchars($empleado['salario']); ?> &euro;</li>
                            <?php endforeach; ?>
                        </ul>
                        <p><b>Total Acumulado de la Empresa:</b> <?php echo htmlspecialchars($total_empresa); ?> &euro;</p>
                    <?php else: ?>
                        <p>No hay empleados registrados.</p>
                    <?php endif; ?>
                    <br>
                    <p>La sesión se ha cerrado. <a href="nomina.php">Volver al formulario de nómina.</a></p>
                </div>
            </body>
        </html>
        <?php
        exit;
    }
?>
