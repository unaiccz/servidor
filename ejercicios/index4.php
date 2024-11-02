<!-- html para la vista principal de la aplicacion -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntuaciones</title>
    <link rel="stylesheet" href="./styles4.css">
</head>
<body>

<div class="frms">
<div class="form-container">
    <form action="./UserController.php" method="post">
        <input type="text" placeholder="Usuario" name="username">
        <input type="number" placeholder="Puntuacion" name="puntuacion">
        <input type="submit">
    </form class="form-container">

</div>
<div class="form-container">
    <form action="./search.php" method="post">
        <input type="text" placeholder="Buscar" name="query">
        <input type="submit" value="Buscar">
    </form class="form-container">
    
</div>

</div>
<!-- codigo php -->
<?php
include 'index4.inc.php';

function main() {
    // Crear archivo para la escritura y lectura del mismo
  crear_archivo();
    // Abrimos el archivo en modo lectura
leer_archivo();
}

// Llamar a la función principal
main();
?>

</body>
</html>