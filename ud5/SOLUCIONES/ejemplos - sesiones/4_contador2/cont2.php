<?php session_start(); ?>
<html><body>
<?php
echo "Contador: " . $_SESSION['contador'];
?>
<br><a href="cont1.php">[ Volver ]</a>
<br><a href="cont3.php">[ Terminar ]</a>
</body></html>