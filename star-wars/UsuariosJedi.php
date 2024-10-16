<?php
include 'Utils.php';
use Exception;

function crearUsuario($nombre, $email, $fechaNacimiento)
{
    $expReg = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    if (!validarNombre($nombre)) {
$nombre = "nombre no valido";
    } 
    
    if (!validarExp($expReg, $email)) {
        $email = " email no valido";
    }
    
    $edad = calcularEdad($fechaNacimiento);
    $item = ["Nombre" => $nombre, "Email" => $email, "Edad" => $edad];
    return $item;
}
?>