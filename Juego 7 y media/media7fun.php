<?php

function crearJugador($jug){

    $jugador = explode(" ", $jug); // $jugador = [0] nombre, [1] apellido
    return [
        "nombre" => $jugador[0],
        "apellido" => $jugador[1]
    ];

    /* Para llamar por ejemplo el apellido del primero: $jugadores[0]["apellido"] */
}

// Crear array con la baraja entera y desordena
function barajar() {

    $baraja = array();

    $parte1 = array(1, 2, 3, 4, 5, 6, 7, 'J', 'Q', 'K');
    $parte2 = array('C', 'D', 'P', 'T'); // CDPT -> Corazón Diamante Pica Trébol

    foreach ($parte1 as $i) {
        foreach ($parte2 as $j) {
            $baraja[] = $i . $j;
        }
    }

    // Desordenar
    shuffle($baraja);

    return $baraja;
}

// Almacenar en un array el nombre del jugador, las cartas repartidas, el valor de las cartas y fijar premio como 0€ para luego editar
function jugar($baraja, $jugadores, $numCartas){
    $juego = array();
    $cont = 0; // Para barajas

    // Crear juego de cada jugador (array almacena $jugador y $cartas)
    foreach ($jugadores as $jug){ 
        $cartas = array();

        // Repartir cartas (almacenar en array $cartas las cartas de cada jugador)
        /* array_slice(array $array, int $iffset, ?int $length = null)
            $array -> Array para usar
            $offset -> Desde qué posición empezar
            $length -> Cuántos elementos extraer */
        $cartas = array_slice($baraja, $cont, $numCartas);
        $cont += $numCartas;

        $valorCartas = contar($cartas);

        // Array asociativo para almacenar jugador, cartas, valor y capital (predeterminado 0€)
        $juego[] = [
            "jugador" => $jug, // Almacena $jugador de 2 posiciones: nombre y apellido
            "cartas" => $cartas,
            "valor" => $valorCartas,
            "premio" => 0
        ];
    }

    /* Para acceder
    Por ejemplo: al nombre del 1º jugador
        echo $juego[0]["jugador"]["nombre"];
    Por ejemplo 2: 3º carta del 2º jugador
        echo $juego[1]["cartas"][2]; // A♥ */

    return $juego;
}

// Cuenta valor de las cartas de 1 sólo jugador
function contar($cartas){

    $suma = 0;
    
    foreach ($cartas as $carta) {
        // Obtener num de la carta
        $num = substr($carta, 0, 1);

        if ( is_numeric($num) ){
            $suma += $num;
        } else {
            $suma += 0.5;
        }
    }

    return $suma;
}

// Obtener el valor máximo para conseguir quienes son los ganadores y determinar premio
function ganador($juego, $apuesta){

    /* - -- Hallar ganadores -- - */
    // ALmacenar todos los valores de valor de cartas
    $valor = array_column($juego, "valor");

    // Cambiamos los que tengan valor mayor de 7.5 a 0 para luego hallar correctamente el más alto
    foreach ($valor as $num => $i) {
        if ($i > 7.5){
            $valor[$num] = 0;
        }
    }

    $bote = 0;

    // Hallamos dígito más alto
    $max = max($valor);
    // Extraer índice ganadores (devuelve array) [cantidad de jug que tengan dicho valor]
    $ganadores = array_keys($valor, $max);

    /* - -- Premios -- - */
    if ($max == 7.5){
        $dinero = $apuesta*0.8; // Los ganadores se reparten el 80%
        foreach ($ganadores as $i) {
            $juego[$i]["premio"] = $dinero/(count($ganadores));
            echo "{$juego[$i]["jugador"]["nombre"]} {$juego[$i]["jugador"]["apellido"]} ha ganado la partida con una puntuación de {$max} <br>";
        }

        echo "Los ganadores han obtenido {$dinero}€ de premio";

        $bote = $apuesta*0.2;
    } elseif ($max < 7.5) {
        $dinero = $apuesta*0.5; // Los ganadores se reparten el 50%
        foreach ($ganadores as $i) {
            $juego[$i]["premio"] = $dinero/(count($ganadores));
            echo "{$juego[$i]["jugador"]["nombre"]} {$juego[$i]["jugador"]["apellido"]} ha ganado la partida con una puntuación de {$max} <br>";
        }

        echo "Los ganadores han obtenido {$dinero}€ de premio";

        $bote = $apuesta*0.5;
    } elseif ($max == 0) {
        $bote = $apuesta; // No ganador = Todo al bote
        echo "No hubo ganadores, todos superan del 7.5";
    }

    return $juego;
}

// Imprimir tabla
function imprimir($juego){
    echo "<table border='1'>";
    foreach ($juego as $i) {
        echo "<tr>";

        echo "<td> {$i["jugador"]["nombre"]} {$i["jugador"]["apellido"]} </td>";
        foreach ($i["cartas"] as $j) {
            echo "<td> <img src='images/{$j}.png' style='width:70px; height:105px;'> </td>";
        }


        echo "</tr>";
    }
    echo "</table>";
}

// Imprimir al fichero
/* En fichero (apuestas_ddmmaahhmiss.txt) [separados por #]:
- InicialNombre e InicialApellido # Puntuación # Cantidad ganada por dicho jugador
- TOTALPREMIOS # Cantidad ganadores # Cantidad total repartida */
function fichero($juego){

    // Declarar nombre del fichero (apuestas_DíaMesAñoHoraMinutosSegundos.txt)
    $fichero = "apuestas_" . date("dmYHis") . ".txt";

    // Abrir o crear archivo y añadir línea
    $archivo = fopen($fichero, "a"); // "a" añade al final sin borrar

    // Obtención de datos (Inicial nombre, Inicial apellido, Puntuación de cada, Capital ganada de cada)
    foreach ($juego as $i) {
        // Metemos toda la info en un array para luego usar implode()
        $datos = array();

        $datos[0] = substr($i["jugador"]["nombre"], 0, 1); // Obtener 1º carácter apellido
        $datos[1] = substr($i["jugador"]["apellido"], 0, 1); // Obtener 1º carácter apellido
        $datos[2] = $i["valor"];
        $datos[3] = $i["premio"];

        // COncatenar usando # o meter
        $todo1 = implode("#", $datos);

        // Introducir en fichero
        fwrite($archivo, $todo1. PHP_EOL); // PHP_EOL -> Salto de línea
    }

    /* - -- TOTALPREMIO -- - */

    //Contar cantidad ganadores y cantidad total repartida
    $final = array();

    $final[0] = "TOTALPREMIO";
    $final[1] = 0;
    $final[2] = 0;
    foreach ($juego as $i) {
        if ($i["premio"] > 0){
            $final[1] += 1;
            $final[2] += $i["premio"];
        }
    }

    //Concatenar
    $todo2 = implode("#", $final);

    // INtroducir línea final
    fwrite($archivo, $todo2);
    fclose($archivo); // Liberar recurso
}

// Función limpiar
function limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
