<?php
    session_start();
    include_once 'funciones.php';

    // Manejar la acción recibida desde el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        if ($accion == 'cerrar') {
            // Usar la función para cerrar sesión y mostrar el listado
            cerrar_sesion_y_mostrar_listado();
        }

        if ($accion == 'calcular') {
            // Recuperar datos del formulario
            $nombre = trim($_POST['nombre']);
            $sueldo_base = floatval($_POST['sueldo_base']);
            $clave_departamento = trim($_POST['clave_departamento']);
            $extras_seleccionados = isset($_POST['extras']) ? $_POST['extras'] : array();
            $num_hijos = intval($_POST['num_hijos']);

            // Validar los datos
            if (empty($nombre) || empty($sueldo_base) || empty($clave_departamento)) {
                // Guardar mensaje de error en la sesión
                $_SESSION['error'] = "Por favor, completa todos los campos obligatorios.";
                header('Location: nomina.php');
                exit;
            }

            // Obtener el nombre del departamento
            $departamento = obtener_departamento($clave_departamento);

            // Procesar los extras seleccionados
            $extras_nombres = array();
            $importe_extras = array();
            $extras = get_extras();
            foreach ($extras_seleccionados as $extra_key) {
                if (isset($extras[$extra_key])) {
                    $extras_nombres[] = htmlspecialchars("$extra_key: " . $extras[$extra_key] . " €");
                    $importe_extras[] = floatval($extras[$extra_key]);
                }
            }

            // Calcular importe por hijos y salario total
            $importe_por_hijos = 10 * $num_hijos;
            $salario = calcular_nomina($sueldo_base, $importe_extras, $num_hijos);

            // Guardar los resultados temporalmente en la sesión
            $_SESSION['resultado'] = array(
                'nombre' => $nombre,
                'sueldo_base' => $sueldo_base,
                'clave_departamento' => $clave_departamento,
                'departamento' => $departamento,
                'extras_nombres' => $extras_nombres,
                'extras' => $extras_seleccionados,
                'num_hijos' => $num_hijos,
                'importe_por_hijos' => $importe_por_hijos,
                'salario' => $salario
            );
        } elseif ($accion == 'modificar') {
            if (isset($_SESSION['resultado'])) {
                // Guardar los datos del empleado para su modificación
                $_SESSION['empleado_data'] = array(
                    'nombre' => $_SESSION['resultado']['nombre'],
                    'sueldo_base' => $_SESSION['resultado']['sueldo_base'],
                    'clave_departamento' => $_SESSION['resultado']['clave_departamento'],
                    'extras' => $_SESSION['resultado']['extras'],
                    'num_hijos' => $_SESSION['resultado']['num_hijos']
                );
                // Redirigir de vuelta al formulario para modificar
                header('Location: nomina.php');
                exit;
            } else {
                // Si no hay datos para modificar, redirigir al formulario
                header('Location: nomina.php');
                exit;
            }
        } elseif ($accion == 'otro') {
            if (isset($_SESSION['resultado'])) {
                $nombre = $_SESSION['resultado']['nombre'];
                $salario = $_SESSION['resultado']['salario'];

                // Inicializar el array de empleados si no existe
                if (!isset($_SESSION['empleados'])) {
                    $_SESSION['empleados'] = array();
                }

                // Agregar el empleado al array de empleados
                $_SESSION['empleados'][] = array(
                    'nombre' => $nombre,
                    'salario' => $salario
                );

                // Incrementar el número de empleado para el siguiente
                $_SESSION['empleado_id'] += 1;

                // Limpiar los datos del resultado
                unset($_SESSION['resultado']);

                // Redirigir de vuelta al formulario para ingresar otro empleado
                header('Location: nomina.php');
                exit;
            } else {
                // Si no hay datos para agregar, redirigir al formulario
                header('Location: nomina.php');
                exit;
            }
        }
    }

    // Mostrar la página de resultados si 'resultado' está en la sesión
    if (isset($_SESSION['resultado'])) {
        $resultado = $_SESSION['resultado'];
        // Calcular el total_empresa
        $total_empresa = 0;
        if (isset($_SESSION['empleados']) && !empty($_SESSION['empleados'])) {
            foreach ($_SESSION['empleados'] as $empleado) {
                $total_empresa += $empleado['salario'];
            }
        }
        // Incluir el salario del empleado actual
        $total_empresa += $resultado['salario'];
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Resultado Nómina</title>
                <link rel="stylesheet" type="text/css" href="styles.css">
            </head>
            <body>
                <div class="container2">
                    <h2>Resultado de la Nómina</h2>
                    <p><b>Nombre del Empleado:</b> <?php echo htmlspecialchars($resultado['nombre']); ?></p>
                    <p><b>Sueldo Base:</b> <?php echo htmlspecialchars($resultado['sueldo_base']); ?> &euro;</p>
                    <p><b>Departamento:</b> <?php echo htmlspecialchars($resultado['departamento']); ?></p>
                    <p><b>Extras:</b></p>
                    <ul>
                        <?php if (empty($resultado['extras_nombres'])): ?>
                            <li>Sin extras</li>
                        <?php else: ?>
                            <?php foreach ($resultado['extras_nombres'] as $extra_item): ?>
                                <li><?php echo $extra_item; ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <p><b>Importe por Hijos:</b> <?php echo htmlspecialchars($resultado['importe_por_hijos']); ?> &euro;</p>
                    <p><b>Importe Total de la Nómina:</b> <?php echo htmlspecialchars($resultado['salario']); ?> &euro;</p>
                    <br>
                    <p><b>Total Acumulado de la Empresa:</b> <?php echo htmlspecialchars($total_empresa); ?> &euro;</p><br>

                    <div class="form-buttons">
                        <form action="resultado.php" method="post" style="display: inline;">
                            <button type="submit" name="accion" value="modificar" class="btn btn-secondary">Modificar</button>
                        </form>
                        <form action="resultado.php" method="post" style="display: inline;">
                            <button type="submit" name="accion" value="otro" class="btn btn-primary">Otro Empleado</button>
                        </form>
                    </div>
                </div>
            </body>
        </html>
        <?php
    }
?>
