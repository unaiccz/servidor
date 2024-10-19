<?php
use Exception;
function WriteFile($username,$puntuacion){
try {
    $file = fopen('puntuaciones.txt', 'a+');
    if ($file) {
        fwrite($file, $username . ";" . $puntuacion . PHP_EOL);
        fclose($file);
    } else {
        throw new Exception("No se pudo abrir el archivo.");
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
}
if ($_POST){

    $username = $_POST['username'];
    $puntuacion = $_POST['puntuacion'];
WriteFile($username,$puntuacion);
}