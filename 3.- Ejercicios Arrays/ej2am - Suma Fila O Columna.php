<html>
<head>
    <title>Suma de array 3x3</title>

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

        .suma{
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .suma p{
            padding: 5px 10px;
        }
    </style>
</head>
<!--
Modificar el ej1.php para mostrar 
    array de suma por fila y 
    otro array que contenga sumas por columnas
-->
<body>
<?php

$matriz = array();

$num = 2;

for ($i = 0 ; $i < 3 ; $i++){

    for ($j = 0 ; $j < 3 ; $j++) { 
        $matriz[$i][$j] = $num;
        $num += 2;
    }
}

echo "<table id='datos'>";

echo "<tr id='nombres'>      <th></th>  <th>Col 1</th>  <th>Col 2</th>  <th>Col 3</th>     </tr>";

for ($i=0; $i < count($matriz); $i++) { 
    echo "<tr>";
    echo "<td id='nombres'>Fila " . ($i + 1) . "</td>";
    for ($j=0; $j < count($matriz[0]); $j++) { 
        echo "<td>{$matriz[$i][$j]}</td>";
    }
    echo "</tr>";
}
echo "</table>";

// - -- Funciones -- -
function sumarFila($matriz){

    //Inicializo un array para sumas de filas
    $sumaF = array();

    for ($i = 0; $i < count($matriz); $i ++) {
        //Hacer quela suma se reinicie cada vez que pasa a la sigueinte fila
        $suma = 0;
        for ($j = 0; $j < count($matriz[0]); $j++) { 
            $suma += $matriz[$i][$j];
        }
        //Almacena la suma de cada fila en array
        $sumaF[$i] = $suma;
        //En la imagen aparece en vertical, puedo almacenarlo en array simple o de 2 dimensiones donde hay 1 columna y 3 filas

    }

    return $sumaF;
}

function sumarColumna($matriz){

    //Inicializo un array para sumas de filas
    $sumaC = array();

    for ($i = 0; $i < count($matriz[0]); $i ++) {
        //Hacer quela suma se reinicie cada vez que pasa a la sigueinte fila
        $suma = 0;
        for ($j = 0; $j < count($matriz); $j++) { 
            $suma += $matriz[$j][$i];
        }
        //Almacena la suma de cada fila en array
        $sumaC[$i] = $suma;
        //En la imagen aparece en vertical, puedo almacenarlo en array simple o de 2 dimensiones donde hay 1 columna y 3 filas
    }

    return $sumaC;
}

echo "<div class='suma'>";
$sumaF = sumarFila($matriz);
echo "<p>SUMA POR FILAS: </p>";
echo "<table>";
foreach ($sumaF as $i){
    //Tabla de 1 columna y 3 filas
    echo "<tr><td> $i </td></tr>";
}
echo "</table>";
echo "</div>";

echo "<div class='suma'>";
$sumaC = sumarColumna($matriz);
echo "<p>SUMA POR COLUMNAS: </p>";
echo "<table><tr>";
foreach ($sumaC as $i){
    //Tabla de 3 columna y 1 filas
    echo "<td> $i </td>";
}
echo "</tr></table>";
echo "</div>";

?>
</body>
</html>