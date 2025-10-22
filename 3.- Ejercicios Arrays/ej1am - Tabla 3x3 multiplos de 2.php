<html>
<head>
    <title>Matriz 3x3</title>

    <style>
        body{
            font-family: Arial;
        }

        table{
            border-collapse: collapse; /*Bode fino*/
            text-align: center;
        }

        td{
            border: 1px solid black;
            padding: 2px 30px; /*(izq der) (arriba abajo)*/
        }

        #nombres{
            border-collapse: none;
            border: 0;
        }
    </style>
</head>

<!--
Crea matriz de 3x3 con sucesivos múltiplos de 2
Mostrar contenido por filas

        Col 1   Col 2   Col 3
Fila 1     2      4       6
Fila 2     8     10      12
Fila 3    14     16      18  
-->

<body>
<?php

//Crear array vacía para después rellenar
$matriz = array();

//Valor inicial
$num = 2;

//Bucle, recorre todo   $i -> fila     $j -> Columna
for ($i = 0 ; $i < 3 ; $i++){

    //Recorrer columnas
    for ($j = 0 ; $j < 3 ; $j++) { 
        $matriz[$i][$j] = $num;
        //Siguiente múltiplo de 2
        $num += 2;
    }
}

//Mostrar matriz en fila
echo "<table>";

//FIla encabezado
echo "<tr id='nombres'>      <th></th>  <th>Col 1</th>  <th>Col 2</th>  <th>Col 3</th>     </tr>";

for ($i=0; $i < count($matriz); $i++) { 
    echo "<tr>";
    echo "<td id='nombres'>Fila " . ($i + 1) . "</td>"; //Si no fuese por el +1 se imprime tmb 0
    for ($j=0; $j < count($matriz[0]); $j++) { 
        //php confunde las corchetes dentro de un string entre "" -> se queda con $matriz[$i] y no sabe qué hacer con [$j]
        // Para asegurarse, meter todo entre {}
        echo "<td>{$matriz[$i][$j]}</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>