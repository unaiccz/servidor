<!-- html para la vista principal de la aplicacion -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntuaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .form-container {
            margin-bottom: 20px;
        }
        .form-container input[type="text"] {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="number"] {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
include 'utils/crear_archivo.php';
include 'utils/leer_archivo.php';

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