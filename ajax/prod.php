<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);



try {
    // Read file
    $file = file("productos.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($file === false) {
        throw new Exception("No se pudo leer el archivo.");
    }
    
    // Array of products
    $productos = array();
    foreach ($file as $linea) {
        $campos = explode(",", $linea); // Assuming fields are comma-separated
        if (count($campos) < 1) {
            throw new Exception("Formato de línea no válido: " . $linea);
        }
        $productos[] = array(
            "nombre" => trim($campos[0]),
            // Add more fields if necessary
        );
    }

    // Return JSON of products\
header('Content-Type: application/json');
    echo json_encode($productos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    // In case of error, return JSON with the error message
    echo json_encode(["error" => "Error al leer el archivo: " . $e->getMessage()]);
    exit;
}
exit; // Ensure nothing else is returned after the JSON