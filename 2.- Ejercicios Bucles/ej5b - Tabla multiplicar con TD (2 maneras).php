<HTML>
<HEAD><TITLE> EJ5B – Tabla multiplicar con TD</TITLE></HEAD>

<style>
    body{
        font-family: Arial;
    }

    table{
        border-collapse: collapse; /*Bode fino*/
    }

    td{
        border: 1px solid black;
        padding: 2px 50px 2px 10px; /*Arriba Derecha Abajo Izquierda*/
    }
</style>

<!--
Mostrar por pantalla la tabla de multiplicar con su tabla HTML

En el ejemplo:
Tabla de 2 columnas, a la izq la multiplicación y la derecha resultado
-->

<BODY>
<?php
    $num="8";

    echo "<h2>- -- Tabla del $num -- -</h2>";

    //Abrir tabla
    echo "<table>";

    for ($i=0; $i <= 10; $i++) { 
        echo "<tr>";
        echo "<td>$num x $i</td>";
        echo "<td>" . ($num * $i) . "</td>";
        echo "</tr>";
    }

    //Cerrar tabla
    echo "</table>";
?>

<br>
<br>


<!-- MEZCLA de HTML con PHP -->
<?php
    $num = 8;
?>

<h2>- -- Tabla del <?= $num ?> -- -</h2>
<table>
    <?php for ($i=0; $i <= 10 ; $i++): ?>
        <tr>
            <td> <?= $num ?> x <?= $i ?> </td>
            <td> <?= $num * $i ?> </td>
        </tr>
    <?php endfor; ?>
</table>

</BODY>
</HTML>