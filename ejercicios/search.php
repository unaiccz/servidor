<?php
echo "<a href='index4.php'>Volver</a>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = htmlspecialchars($_POST['query']);

    try {
        $file = fopen('puntuaciones.txt', 'r');
        if ($file) {
            $found = false;
            echo '<link rel="stylesheet" href="styles4.css">';
            echo '<table>
                    <tr>
                        <th>Usuario</th>
                        <th>Puntuacion</th>
                    </tr>';
            while (($line = fgets($file)) !== false) {
                $data = explode(";", $line);
                if (count($data) == 2) {
                    if (stripos($data[0], $query) !== false) { // Buscar por nombre
                        echo "<tr><td>" . htmlspecialchars($data[0]) . "</td><td>" . htmlspecialchars($data[1]) . "</td></tr>";
                        $found = true;
                    }
                }
            }
            echo '</table>';
            fclose($file);
            if (!$found) {
                echo "<p class='no-result'>No se encontraron resultados para '$query'.</p>";
            }
        } else {
            throw new Exception("No se pudo abrir el archivo.");
        }
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
} else {
    echo "<p>Por favor, envíe una consulta.</p>";
}
?>