<?php

use DateTime;

function validarExp($exp, $valor) {
    return preg_match($exp, $valor) === 1;
}

function calcularEdad($fechaNacimiento) {
    $fechaActual = new DateTime();
    $fechaNacimiento = new DateTime($fechaNacimiento);
    $edad = $fechaActual->diff($fechaNacimiento)->y;
    return $edad;
}
// se podria reutilizar la funcion validar_exp()
function nombreValido($nombre) {
    $exp = '/^[a-zA-Z]+$/';
    return validarExp($exp, $nombre);
}
use Exception;

function crearUsuario($nombre, $email, $fechaNacimiento)
{
    $expReg = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    if (!nombreValido($nombre)) {
$nombre = "nombre no valido";
    } 
    
    if (!validarExp($expReg, $email)) {
        $email = " email no valido";
    }
    
    $edad = calcularEdad($fechaNacimiento);
    $item = ["Nombre" => $nombre, "Email" => $email, "Edad" => $edad];
    return $item;
}