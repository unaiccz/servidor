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