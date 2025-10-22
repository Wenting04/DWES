<html>
<head>
    <title>Array 3x3 aleatorio, valor máx y promedio cada fila</title>
    <style></style>
</head>
<!--
Definir array 3x3 con nº aleatorios
Generar array que contenga valor max de cada fila y otro con los promedios
Mostrar contenido de ambos
-->
<body>
<?php
$tabla = array();

for ($i = 0; $i < 3; $i++) { 
    for ($j = 0; $j < 3; $j++) { 
        $tabla[$i][$j] = rand(1, 101); //Lo dejaría con rand() sin más pero genera num demasiados grandes
    }
}

echo "<table>";
for ($i = 0; $i < 3; $i++) { 
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) { 
        echo "<td> {$tabla[$i][$j]} </td>";
    }
    echo "</tr>";
}
echo "</table>";

$mayor = array();
$promedio = array();

$numMayor = 0;
$promedio = 0;

for ($i = 0; $i < count($tabla); $i++) { 
    for ($j = 0; $j < count($tabla[0]); $j++) { 
        if
    }
}
?>
</body>
</html>