<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.2</h2>
    <h3>Ejercicio 19</h3>

    <?php
    /*19. Precedencia con and/or vs &&/||:
• Declara $res1 = false or true; y muéstralo.
• Declara $res2 = false || true; y muéstralo.
• Declara $res3 = true and false; y muéstralo.
• Declara $res4 = true && false; y muéstralo.
• Añade un comentario indicando qué diferencias observas entre los pares 
(or/||) y (and/&&).
*/
echo $res1 = false or true; 
echo $res2 = false || true; //
echo $res3 = true and false; //
echo $res4 = true && false; //

echo "\res1 = false or true: ".($res1 ? 'true':'false')."<br>";
echo "\res2 = false or true: ".($res2 ? 'true':'false')."<br>";
echo "\res3 = false or true: ".($res3 ? 'true':'false')."<br>";
echo "\res4 = false or true: ".($res4 ? 'true':'false')."<br>";

    ?>
</body>

</html>