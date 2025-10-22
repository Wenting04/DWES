<html>
<head>
    <title>Imprimir elemento mayor en un array</title>
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

    function elementoMayor($tabla){
        $fila = 0;
        $coumna = 0;
        $mayor = 0;
        for ($i = 0; $i < count($tabla); $i++) { 
            for ($j = 0; $j < count($tabla[0]); $j++) { 
                if ($mayor < $tabla[$i][$j]){
                    $mayor = $tabla[$i][$j];
                    $fila = $i + 1;
                    $columna = $j + 1;
                }
            }
        }

        echo "Elemento Mayor " . $mayor . " - fila " . $fila . " columna " . $columna;
    }

    elementoMayor($tabla);
?>
</body>
</html>