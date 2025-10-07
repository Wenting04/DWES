<HTML>
<HEAD><TITLE> EJ4B – Tabla Multiplicar</TITLE></HEAD>

<!--
- -- Ejemplos salida -- -
8 x 1 = 8
8 x 2 = 16
8 x 3 = 24
...
-->

<BODY>
<?php
    $num="8";

    function tablamult($num){
        for ($i=0; $i < 11; $i++) { 
            echo "$num x $i = " . $num*$i . "<br>";
        }
    }

    tablamult($num);
?>
</BODY>
</HTML>