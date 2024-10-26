<?php

use Exception;

if($_POST){
    $username = $_POST['username'];
    $puntuacion = $_POST['puntuacion'];
    if(strlen($username)< 3 || $puntuacion < 0){
        echo "ERROR: Nombre demasiado cortoo puntuacion incorrecta";
        header('Refresh: 5; URL=./main.php');
        exit();
        
    }
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
        return;
    }
}header('Location: ./main.php');
exit();