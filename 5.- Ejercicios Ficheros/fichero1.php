<!-- Formulario que recoge datos de alumnos y almacena en ficheros.
    Campo de ficheros separados por posiciones
    Posiciones no ocupadas se completan con espacios -->

<html>
<head>
    <title>Formulario alumnos</title>
</head>
<body>
<?php
    // Si formulario aun no enviado, se muestra fomrulario
    if (!isset($_POST["enviar"])){
?>
    <h2>Formulario de alumnos</h2>

    <form action="fichero1.php" method="post">
        Nombre: 
        <input type="text" name="nombre" required>
        <br>

        Primer apellido: 
        <input type="text" name="apellido1" required>
        <br>

        Segundo apellido: 
        <input type="text" name="apellido2">
        <br>

        Fecha de nacimiento:
        <input type="date" name="fecha" required>
        <br>

        Localidad: 
        <input type="text" name="localidad" required>
        <br>

        <input type="submit" name="enviar" value="Guardar">
    </form>
<?php
} else {
// Si formulario ya enviado, procesar datos

    //Recoger datos
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $fecha = $_POST["fecha"];
    $localidad = $_POST["localidad"];

    $fichero = "alumnos1.txt";

    // Crear cabecera si el archivo no existe
    if (!file_exists($fichero)){
        $cabecera = str_pad("Nombre", 40, " ") .
                    str_pad("Primer apellido", 41, " ") .
                    str_pad("Segundo apellido", 41, " ") .
                    str_pad("Fecha", 10, " ") .
                    str_pad("Localidad", 27, " ") . "\n";
        file_put_contents($fichero, $cabecera);
    }

    // Ajustar cada campo a longitud fija requerida
    $nombre =       str_pad(substr($nombre, 0, 40), 40, " "); // Posición 1 a 40
    $apellido1 =    str_pad(substr($apellido1, 0, 41), 41, " "); // Posición 41 hasta 81
    $apellido2 =    str_pad(substr($apellido2, 0, 41), 41, " "); // Posición 82 a 123
    $fecha =        str_pad(substr($fecha, 0, 10), 10, " "); // Posición 124 a 133
    $localidad =    str_pad(substr($localidad, 0, 27), 27, " "); // Posición 134 a 160

    // Concatenar todo (tmb podía guardarlo todo de una vez en el anterior paso)
    $todo = $nombre . $apellido1 . $apellido2 . $fecha . $localidad . "\n";

    // Abrir o crear dichero y añadir línea
    file_put_contents($fichero, $todo, FILE_APPEND); // FILE_APPEND (añadir al final)

    // Confirmación al usuario
    echo "<h3> Alumno guardado correctamente </h3>";
    echo "<a href='fichero1.php'>Voler al formulario</a>";
}
?>
</body>
</html>