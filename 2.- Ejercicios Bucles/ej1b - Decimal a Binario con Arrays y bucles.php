<!DOCTYPE html>
<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>

<!--
Transformar un número decimal a binario usando bucles (no se podrá utiliza la función decbin)
--------------------------------------------
Ejemplo de salida:

Numero 168 en binario = 10101000
Numero 128 en binario = 10000000
Numero 127 en binario = 01111111
Numero 1 en binario = 1
Numero 2 en binario = 10

Para elevar un núm:
    pow(mixed $num, mixed $exponent): int|float|object
Del 2 al 128, es decir hasta del 2^1 hasta el 2^7
-->

<body>
<?php
    $num = "168";
    $num2 = "128";
    $num3 = "127";
    $num4 = "1";
    $num5 = "2";

    function decABin ($num){

        $num = (int) $num;

        $bin = array();

        for ($i=0; $num > 0; $i++){

            if (  $num%2 == 0  ){ //Si es 0 es par
                $bin[$i] = 0;

                $num = $num/2; //Divide entre 2
                $num = (int) $num;
                //Pued usar $num = intdiv($num, 2); pq es más limpio pero meh
            } else { //Si no es igual a 0 es impar
                $bin[$i] = 1;

                $num = $num/2;
                $num = (int) $num;
            }
        }

        $binar = "";

        for ($i = count($bin) - 1; $i >= 0; $i--){ //El bucle se repite si es mayor o igual a 0
            $binar .= $bin[$i];
        }

        return $binar;
    }

    echo "Número $num en binario = " . decABin($num) . "<br>";
    echo "Número $num2 en binario = " . decABin($num2) . "<br>";
    echo "Número $num3 en binario = " . decABin($num3) . "<br>";
    echo "Número $num4 en binario = " . decABin($num4) . "<br>";
    echo "Número $num5 en binario = " . decABin($num5) . "<br>";
?>
</body>
</html>