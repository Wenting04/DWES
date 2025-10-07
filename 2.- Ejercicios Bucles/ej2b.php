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
Numero 48 en base 2 = 00110000
Numero 48 en base 4 = 300
Numero 48 en base 6 = 120
-->

<BODY>
<?php
    $num="48";
    $base=”8”;
?>
</BODY>