<?php

use Exception;

if($_POST){
    $username = $_POST['username'];
    $puntuacion = $_POST['puntuacion'];
    if(strlen($username)< 3 || $puntuacion < 0){
        echo "ERROR: Nombre demasiado corto puntuacion incorrecta";
        header('Refresh: 5; URL=./index4.php');
        exit();
        
    }
    try {
        // abrir el archivo en modo escritura
        $file = fopen('puntuaciones.txt', 'a+');
        if ($file) {
            fwrite($file, $username . ";" . $puntuacion . PHP_EOL);
            fclose($file);
        } else {
            throw new Exception("No se pudo abrir el archivo.");
        }
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
        return;
    }
}

header('Location: ./index4.php');
exit();