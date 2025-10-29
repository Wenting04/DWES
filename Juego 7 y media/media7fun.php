<?php

// Crear jugadores
function creaJugador(){

    // Crear array jugadores para almacenar los 4
    $jugadores = array();

    $seguir = true;
    $cont = 0;

    while (seguir){
        if ( isset($jugador = $_POST["nombre$cont"];) ){
            $jugador = $_POST["nombre$cont"];
            $jugadores[] = $jugador;
        } else {
            $seguir = false;
        }
    }

    return $jugadores;
}

// Genera aleatoriamente una carta (num y letra) y su valor
function cartaAleatoria() {
    $valor = 0;
    $cartaN = rand(1,10);

    switch ($cartaN) {
        case '8':
            $valor = 0.5;
            $cartaN = 'J';
            break;
        case '9':
            $valor = 0.5;
            $cartaN = 'Q';
            break;
        case '10':
            $valor = 0.5;
            $cartaN = 'K';
            break;
        default:
            $valor = 0.5;
            break;
    }

    $letra = 'CDPT'; // Corazón Diamante Pica Trébol
    $cartaL = rand(0, strlen($letra) - 1);

    // [0] = Carta, [1] = Valor
    $carta = array();
    $carta[] = $cartaN + $cartaL;
    $carta[] = $valor;

    return $carta;
}

// Función limpiar
function limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
