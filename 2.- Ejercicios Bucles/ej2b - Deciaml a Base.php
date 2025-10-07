<HTML>
<HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD>

<!--
Pasar decimal a cualquier otra base (base 2 a base 9)
Usando bucles
No se puede usar funciones de conversión

Cómo pasar decimal a base:
Para una base, van de 0 al b-1
Para convertir un decimal N a base B:
1. Divides N entre B
2. Guardas el resto (será un dígito en la nueva base)
3. Tomas el cociente y repites el proceso hasta que el cociente sea 0
4. Lees los restos de abajo hacia arriba -> Ese nº es la nueva base
Hay que tener en cuenta que la base es de 2 a 9, no más ni menos

Ejemplo1 con 48 en base 8
1. Paso 1: 48 ÷ 8 = 6, resto 0 → primer dígito (menos significativo)
2. Paso 2: 6 ÷ 8 = 0, resto 6 → segundo dígito (más significativo)
Resultado: 60 → 48 en base 8

Ejemplo2 48 en base 4
1. 48 ÷ 4 = 12, resto 0
2. 12 ÷ 4 = 3, resto 0
3. 3 ÷ 4 = 0, resto 3
Leer los restos de arriba hacia abajo → 300 → 48 en base 4


- -- Ejemplo de salida -- -

Numero 48 en base 8 = 60
Numero 48 en base 2 = 00110000 -> 8 dígitos cuando base 2
Numero 48 en base 4 = 300
Numero 48 en base 6 = 120
-->

<BODY>
<?php
    $num = "48";
    $base = "8";
    $base2 = "2";
    $base3 = "4";
    $base4 = "6";


    function convertirBase($num, $base){

        /*En php no hace falta convertirlos en número, lo hace sólo
        //Convertirlos en enteros
        $num = (int)$num;
        $base = (int)$base;
        */

        if ($base < 2 || $base > 9){
            return "Base inválida";
        } else {
            
            //Para ir poniendo los dígitos
            $result = "";

            //Si num es mayor a 0, repetir hasta que num sea menor
            while ($num > 0){
                $resto = $num % $base;
                $result = (string)$resto . $result;  //Concatenar. Pasar a string y poner por delante de lo que teníamos anteriormente
                $num = intdiv($num, $base);          //Dividir para cociente entero y guardar result
            }

            //Si $rellenar es true y la base es 2
            //Para rellenar lo que falte con 0 hasta llegar a 8 dígitos
            //En caso de que el num sea 0, esto autocompletará todo
            if ($base == 2){
                while (strlen($result) < 8)
                    $result = '0' . $result;
            }

            return $result;
        }
    }

    echo "Número $num en base $base = " . convertirBase($num, $base) . "<br>";
    echo "Número $num en base $base2 = " . convertirBase($num, $base2) . "<br>";
    echo "Número $num en base $base3 = " . convertirBase($num, $base3) . "<br>";
    echo "Número $num en base $base4 = " . convertirBase($num, $base4) . "<br>";
?>
</BODY>