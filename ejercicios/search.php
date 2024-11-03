<?php
// Enlace para volver a la página principal
echo "<a href='index4.php'>Volver</a>";

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar la consulta del usuario
    $query = htmlspecialchars($_POST['query']);

    try {
        // Intentar abrir el archivo de puntuaciones en modo lectura
        $file = fopen('puntuaciones.txt', 'r');
        if ($file) {
            $found = false;
            // Incluir el archivo de estilos CSS
            echo '<link rel="stylesheet" href="styles4.css">';
            // Crear la tabla para mostrar los resultados
            echo '<table>
                    <tr>
                        <th>Usuario</th>
                        <th>Puntuacion</th>
                    </tr>';
            // Leer el archivo línea por línea
            while (($line = fgets($file)) !== false) {
                // Separar los datos por el delimitador ";"
                $data = explode(";", $line);
                if (count($data) == 2) {
                    // Buscar coincidencias en el nombre de usuario
                    if (stripos($data[0], $query) !== false) {
                        // Mostrar los resultados en la tabla
                        echo "<tr><td>" . htmlspecialchars($data[0]) . "</td><td>" . htmlspecialchars($data[1]) . "</td></tr>";
                        $found = true;
                    }
                }
            }
            // Cerrar la tabla
            echo '</table>';
            // Cerrar el archivo
            fclose($file);
            // Mostrar mensaje si no se encontraron resultados
            if (!$found) {
                echo "<p class='no-result'>No se encontraron resultados para '$query'.</p>";
            }
        } else {
            // Lanzar una excepción si no se pudo abrir el archivo
            throw new Exception("No se pudo abrir el archivo.");
        }
    } catch (Exception $e) {
        // Mostrar el mensaje de error
        echo "ERROR: " . $e->getMessage();
    }
} else {
    // Mostrar mensaje si no se envió una consulta
    echo "<p>Por favor, envíe una consulta.</p>";
}
?>