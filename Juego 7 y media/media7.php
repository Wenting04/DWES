<?php
// Importar funciones del archivo
include 'media7fun.php';

//Recoger datos del formulario
$numCartas = limpiar($_POST["numcartas"]);
$apuesta = limpiar($_POST["apuesta"]);

// Crea todos los jugadores (escalable)
$jugadores = array(); // Crear array jugadores para almacenar los 4

$cont = 1;
// isset verifica si existe
while ( isset($_POST["nombre$cont"]) ){
    $jug = $_POST["nombre$cont"];
    $jugadores[] = crearJugador($jug);
    $cont++;
}


// Crea baraja y desordena
$baraja = barajar();

// Jugar (reparte cartas a cada jugador y calcula valor)
$juego = jugar($baraja, $jugadores, $numCartas); // Array asociativo ("jugador", "cartas", "valor", "ganador")

$juego = ganador($juego, $apuesta); // Cambia "ganador" a true a quienes ganaron

imprimir($juego);

fichero($juego);
?>
