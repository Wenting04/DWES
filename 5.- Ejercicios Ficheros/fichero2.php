<!-- Formulario que recoge datos de alumnos y almacene en un fichero con nombre alumnos2.txt
    Los campos del fichero estarán separas usando como caracter delimitador: ##
    No se completan con espacios los campos pq se separan por carácteres delimitadores -->

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

    <form action="fichero2.php" method="post">
        Nombre: 
        <input type="text" name="nombre" required>
        <br>

        Primer apellido: 
        <input type="text" name="apellido1" required>
        <br>

        Segundo apellido: 
        <input type="text" name="apellido2" required>
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

    $fichero = "alumnos2.txt";

    // Crear cabecera si el archivo no existe
    if (!file_exists($fichero)){
        $cabecera = "Nombre##" . 
                    "PrimerApellido##" . 
                    "SegundoApellido##" . 
                    "FechaNacimiento##" . 
                    "Localidad" . 
                    "\n";
        file_put_contents($fichero, $cabecera);
    }

    // Concatenar todo (tmb podía guardarlo todo de una vez en el anterior paso)
    $todo = $nombre . "##" . $apellido1 . "##" . $apellido2 . "##" . $fecha . "##" . $localidad . "\n";

    // Abrir o crear dichero y añadir línea
    file_put_contents($fichero, $todo, FILE_APPEND); // FILE_APPEND (añadir al final)

    // Confirmación al usuario
    echo "<h3> Alumno guardado correctamente </h3>";
    echo "<a href='fichero2.php'>Voler al formulario</a>";
}
?>
</body>
</html>