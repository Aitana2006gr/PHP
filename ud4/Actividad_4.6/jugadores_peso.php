<?php
require_once "conexion.php";

// Obtener equipos
$sqlEquipos = "SELECT nombre FROM equipos ORDER BY nombre";
$stmt = $conexion->prepare($sqlEquipos);
$stmt->execute();
$equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$jugadores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipo = $_POST["equipo"];

    $sqlJug = "SELECT nombre, peso FROM jugadores WHERE nombre_equipo = :eq ORDER BY nombre";
    $stmt2 = $conexion->prepare($sqlJug);
    $stmt2->bindParam(":eq", $equipo);
    $stmt2->execute();
    $jugadores = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}
?>

<form method="POST">
    <label>Equipo:</label>
    <select name="equipo">
        <?php foreach($equipos as $e): ?>
            <option value="<?= $e['nombre'] ?>"><?= $e['nombre'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Mostrar jugadores">
</form>

<?php if (!empty($jugadores)): ?>
<table border="1" cellpadding="5">
    <tr><th>Nombre</th><th>Peso</th></tr>
    <?php foreach($jugadores as $j): ?>
        <tr>
            <td><?= $j["nombre"] ?></td>
            <td><?= $j["peso"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
