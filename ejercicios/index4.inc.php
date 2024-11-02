//crear archivo
<?php
use Exception;
function crear_archivo(){
    try {
        // Verificar si el archivo 'puntuaciones.txt' existe
        if (!file_exists('puntuaciones.txt')) {
            // Si no existe, lanzar una excepción
            throw new Exception("El archivo no existe. añade un participante para crearlo.");
        }
        // Abrir el archivo en modo lectura
        $file = fopen('puntuaciones.txt', 'r');
        if ($file) {
            // Si el archivo se abre correctamente, cerrarlo inmediatamente
            fclose($file);
        } else {
            // Si no se puede abrir el archivo, lanzar una excepción
            throw new Exception("No se pudo abrir el archivo.");
        }
    } catch (Exception $e) {
        // Capturar cualquier excepción y mostrar el mensaje de error
        echo "ERROR: " . $e->getMessage();
        return;
    }

}
//leer archivo
function leer_archivo(){
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
                    // Separar cada fila en columnas usando el delimitador ";"
                    $columns = explode(";", $row);
                    // Crear un array asociativo con 'usuario' y 'puntuacion'
                    $dataArray[] = ['usuario' => $columns[0], 'puntuacion' => (int)$columns[1]];
                }
            }
            // Ordenar el array por puntuacion de mayor a menor
            usort($dataArray, function($a, $b) {
                return $b['puntuacion'] - $a['puntuacion'];
            });
            // Mostrar el contenido en una tabla HTML
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>Usuario</th><th>Puntuacion</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($dataArray as $item) {
                // Crear una fila de la tabla por cada elemento del array
                echo "<tr><td>{$item['usuario']}</td><td>{$item['puntuacion']}</td></tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            // Si no se puede abrir el archivo, lanzar una excepción
            throw new Exception("No se pudo abrir el archivo.");
        }
    } catch (Exception $e) {
        // Capturar cualquier excepción y mostrar el mensaje de error
        echo "ERROR: " . $e->getMessage();
    }
}