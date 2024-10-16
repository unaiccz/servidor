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
function validarNombre($nombre) {
    $exp = '/^[a-zA-Z]+$/';
    return validarExp($exp, $nombre);
}