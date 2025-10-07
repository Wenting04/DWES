<HTML>
<HEAD><TITLE> EJ3B – Conversor Decimal a base 16</TITLE></HEAD>

<!--
Transformar num deciaml a hexadecimal usando bucles
No se puede usar función de conversión hex

Cómo pasar de decimal a hexadecimal:
1. Dividir num entre base y obtener resto (es un dígito de la hexadecimal)
2. Num se sustituye por la cociente hasta que llegue a 0, ir guardando los restos
3. Leer los restos al revés, de abajo hacia arriba o de derecha a izquierda

Los hexadecimales van de 0 a 15:
 - De 0 a 9: Num igual
 - De 10 a 15: 10 -> A, 11 -> B, 12 -> C, 13 -> D, 14 -> E, 15 -> F


- -- Ejemplos salida -- -
Numero 48 en base 16 = 30
Numero 222 en base 16 = DE
Numero 15 en base 16 = F
Numero 1515 en base 16 = 5EB
-->

<BODY>
<?php
    $num = "48";
    $num2 = "222";
    $num3 = "15";
    $num4 = "1515";

    $base = "16";

    function convertirHex($num, $base){
        /*En php no hace falta convertirlos en número, lo hace sólo
        //Convertirlos en enteros
        $num = (int)$num;
        $base = (int)$base;
        */

        //Almacenar hexadecimal como string
        $result = "";

        while ($num > 0) {
            $resto = $num % $base;

            //Si resto es menor que 10, se pone tal cual
            if ($resto < 10){
                $result = (string)$resto . $result;
            } else {

                //En php, en cada switch necesita break
                switch ($resto){
                    case 10:
                        $result = "A" . $result;
                        break;
                    case 11:
                        $result = "B" . $result;
                        break;
                    case 12:
                        $result = "C" . $result;
                        break;
                    case 13:
                        $result = "D" . $result;
                        break;
                    case 14:
                        $result = "E" . $result;
                        break;
                    case 15:
                        $result = "F" . $result;
                        break;
                }
            }

            //Lo necesitamos entero
            $num = intdiv($num, 16);
        }

        return $result;
    }

    echo "Núm $num en case $base = " . convertirHex($num, $base) . "<br>";
    echo "Núm $num2 en case $base = " . convertirHex($num2, $base) . "<br>";
    echo "Núm $num3 en case $base = " . convertirHex($num3, $base) . "<br>";
    echo "Núm $num4 en case $base = " . convertirHex($num4, $base) . "<br>";
?>
</BODY>
</HTML>