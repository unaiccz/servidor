<form action="./UserController.php" method="post">
    <input type="text" placeholder="Usuario">
    <input type="text" placeholder="Puntuacion">
    <input type="submit">
</form>



<?php
use Exception;

function main() {
    try {
        $file = fopen('puntuaciones.txt', 'a+');
        if ($file) {
            // Escribir en el archivo
            fwrite($file, "username;puntuacion" . PHP_EOL);
            fclose($file);
        } else {
            throw new Exception("No se pudo abrir el archivo.");
        }
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
        return;
    }

    try {
        $file = fopen('puntuaciones.txt', 'r');
        if ($file) {
            $data = fread($file, filesize('puntuaciones.txt'));
            fclose($file);
            $rows = explode(PHP_EOL, trim($data));
            echo "<table border='1'>";
            echo "<thead>";
            echo "<tr><th>Usuario</th><th>Puntuacion</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($rows as $row) {
                if (!empty($row)) {
                    $columns = explode(";", $row);
                    echo "<tr><td>{$columns[0]}</td><td>{$columns[1]}</td></tr>";
                }
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