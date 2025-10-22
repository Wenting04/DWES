<html>
<head>
    <title>Array 3x5, imprimir elementos fila luego columna</title>
    <style>
        body{
            font-family: Arial;
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
Crear matriz de 3x5, mostrarla por pantalla imprimiendo elementos por fila en 1º lugar y luego po columnas
-->
<body>
<?php
    $tabla = array([2, 4, 6, 9, 7],
                    [8, 10, 12, 1, 12],
                    [14, 16, 88, 3, 15]);

    echo "<span>Tabla</span>";

    echo "<table>";
    for ($i = 0; $i < count($tabla); $i++) { 
        echo "<tr>";
        for ($j = 0; $j < count($tabla[0]); $j++) { 
            echo "<td> {$tabla[$i][$j]} </td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    function porFilas($tabla){
        echo "<span>Mostrar por filas</span>";

        echo "<table>";
        for ($i = 0; $i < count($tabla); $i++) { 
            echo "<tr>";
            for ($j = 0; $j < count($tabla[0]); $j++) { 
                echo "<td> ( " . ($i + 1) . ", " . ($j + 1) . " ) = {$tabla[$i][$j]} </td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    
    function porColumnas($tabla){
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
    }

    porFilas($tabla);
    porColumnas($tabla);
?>
</body>
</html>