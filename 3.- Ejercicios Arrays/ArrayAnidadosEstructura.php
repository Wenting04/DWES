<?php
$jugadores = array(
    // Jugador 0
    array(
        // Cartón 0
        array(1, 2, 3),
        // Cartón 1
        array(4, 5, 6),
        // Cartón 2
        array(7, 8, 9)
    ),

    // Jugador 1
    array(
        array(10, 11, 12),
        array(13, 14, 15),
        array(16, 17, 18)
    )
);

echo '<pre>';
print_r($jugadores);

echo '<br>';
echo 'NIVEL   QUÉ REPRESENTA                                  EJEMPLO';
echo '<br>';
echo '1       Jugador	                                        $jugadores[0]';
echo '<br>';
echo '2       Cartón	                                        $jugadores[0][1] → cartón 2 del jugador 1';
echo '<br>';
echo '3       Número (o columna, o lo que tengas dentro)	$jugadores[0][1][2] → valor 6';
echo '</pre>';
?>