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

<?php
use Exception;

function main() {
    // Crear archivo para la escritura y lectura del mismo
    try {
        if (!file_exists('puntuaciones.txt')) {
            throw new Exception("El archivo no existe. Creando archivo...");
        }
        $file = fopen('puntuaciones.txt', 'r');
        if ($file) {
            // Escribir en el archivo un ejemplo
            fclose($file);
        } else {
            throw new Exception("No se pudo abrir el archivo.");
        }
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
        return;
    }

    // Abrimos el archivo en modo lectura
    try {
        $file = fopen('puntuaciones.txt', 'r');
        if ($file) {
            // Guardamos el contenido del archivo en una variable, para poder tratarlo
            $data = fread($file, filesize('puntuaciones.txt'));
            fclose($file);
            // Uso explode para obtener cada una de las filas, usando trim para borrar espacios
            $rows = explode(PHP_EOL, trim($data));
            // Convertir cada fila en un array asociativo
            $dataArray = [];
            foreach ($rows as $row) {
                if (!empty($row)) {
                    $columns = explode(";", $row);
                    $dataArray[] = ['usuario' => $columns[0], 'puntuacion' => (int)$columns[1]];
                }
            }
            // Ordenar el array por puntuacion de mayor a menor
            usort($dataArray, function($a, $b) {
                return $b['puntuacion'] - $a['puntuacion'];
            });
            // Mostrar el contenido en una tabla
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>Usuario</th><th>Puntuacion</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($dataArray as $item) {
                echo "<tr><td>{$item['usuario']}</td><td>{$item['puntuacion']}</td></tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            throw new Exception("No se pudo abrir el archivo.");
        }
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

main();
?>

</body>
</html>