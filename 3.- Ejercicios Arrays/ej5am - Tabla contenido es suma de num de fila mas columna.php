<html>
<head>
    <title>Tabla con contenido como la suma del número de la columna más fila</title>
    <style>
        body{
            font-family: Arial;
            display: flex;
            flex-direction: column; /*Apilar elementos uno debajo del ot*/
            justify-content: center; /*Centrar verticalmente*/
            align-items: center /*Centrar horizontalmente*/
        }

        table{
            border-collapse: collapse; /*Entre contenidos de la tabla, no haya espacio, se colapsa, si lo quito se queda como cuadritos internos flotantes*/
            text-align: center;
            margin-bottom: 15px;
        }

        td{
            border: 1px solid black; /*Mostrar línea de la tabla en cada cuadrito*/
            padding: 5px;
        }
    </style>
</head>
<!--
Definir matriz 5x3
En cada posición contenga número que sea la suma del número 
    que identifica la columna con el número que identifica la fila del mismo
Imprimir array por columnas
-->
<body>
<?php
    $tabla = array();

    //Creamos el array de 5x3 (5 columnas y 3 filas)
    for ($i = 0; $i < 3; $i++) { 
        for ($j = 0; $j < 5; $j++) { 
            $tabla[$i][$j] = ($i + 1) + ($j + 1);
        }
    }

    //Imprimir por columna
    echo "<span>Mostrar por columnas</span>";

    echo "<table>";
    for ($i = 0; $i < count($tabla[0]); $i++) { 
        echo "<tr>";
        for ($j = 0; $j < count($tabla); $j++) { 
            echo "<td> ( " . ($j + 1) . ", " . ($i + 1) . " ) = {$tabla[$j][$i]} </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>