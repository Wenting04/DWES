<HTML>
<HEAD><TITLE> EJ6B – Factorial</TITLE></HEAD>

<!--


- -- Ejemplos salida -- -
5!=5x4x3x2x1=120
4!=4x3x2x1=24
-->

<BODY>
<?php
    $num="5";
    $num2="4";

    function factorial($num){
        $result = 1;

        echo "$num! = ";
        //Repite mientras $i sea mayor a 0, aquí, el $i va disminuyendo
        for ($i = $num; $i > 0; $i--) { 

            // $result = $result * $i
            $result *= $i;

            if ($i > 1){
                echo "$i x ";
            } else {
                echo "$i = ";
            }
        }

        echo $result;
    }
    
    factorial($num);
    echo("<br>");
    factorial($num2);
?>
</BODY>
</HTML>