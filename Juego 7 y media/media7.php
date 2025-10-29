<!--
Formulario:
- Nombre Apellido (no necesario comprobar) [4 jugadores] {nombreN}
- Cartas a repartir {numcartas}
- Cantidad apostada {apuesta}

Se les reparte aleatoriamente cartas (bajara francesa de 40 cartas)
    Todas las cartas valen su cifra excepto las letras
        A -> 1
        J, Q, K -> 0.5

Reglas para ganar:
- Si obtienen 7.5 justos: los ganadores se reparten el 80% del total de lo apostado
- Si obtienen menos de 7.5: los gaandores se reparten el 50% del total de lo apostado
- Si no hay ganador (todos superan de 7.5): total cantidad apostada a $bote
- El dinero restante se almacena en $bote (sería lo que gana los trabajadores)
Es decir, si no hay varios jugadores con el mismo puntaje, el más cercano a 7.5 sin superarse se queda con todo el porcentaje

Mostrar (en orden):
En caso de SÍ haber ganadores:
- Jugadores que han ganado con su puntuación
- Cantidad obtenida por los ganadores
- En una tabla, en cada fila se muestra la mano de cada jugador (jugador, carta1, carta2)
En caso de NO haber ganadores: 
- NO hay ganadores y cantidad acumulada en el bote
- En una tabla, en cada fila se muestra la mano de cada jugador (jugador, carta1, carta2)

En fichero (apuestas_ddmmaahhmiss.txt) [separados por #]:
- InicialNombreApellido # Puntuación # Cantidad ganada por dicho jugador
- TOTALPREMIOS # Cantidad ganadores # Cantidad total repartida

Criterios de calificación:
- Usar funciones
- Comentarios y explicaciones útiles y breves
- Validar campos mediante excepciones
- Generar y almacenar cartas de cada jugador
- Visualizar jugadas con imágenes/tabla HTML
- Obtener/Visualizar puntuazión de cada partida
- Obtener/Visualizar ganador/es de cada partida
- Obtener/Visualizar premios de cada partida
- Generar fichero con los datos
-->

<?php
// Importar funciones del archivo
include 'media7fun.php';

//Recoger datos del formulario
$numCartas = limpiar($_POST["numcartas"]);
$apuesta = limpiar($_POST["apuesta"]);

?>