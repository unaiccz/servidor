<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = htmlspecialchars($_POST['query']);

    try {
        $file = fopen('puntuaciones.txt', 'r');
        if ($file) {
            $found = false;
            echo '<style>
                    body { font-family: Arial, sans-serif; }
                    table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                    th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
                    th { background-color: #f2f2f2; }
                    .no-result { color: red; }
                  </style>';
            echo '<table>
                    <tr>
                        <th>Usuario</th>
                        <th>Puntuacion</th>
                    </tr>';
            while (($line = fgets($file)) !== false) {
                $data = explode(";", $line);
                if (count($data) == 2) {
                    if (stripos($data[0], $query) !== false) { // stripos for case-insensitive search
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