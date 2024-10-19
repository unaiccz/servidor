<?php

function remove_accents($str) {
    $accents = array(
        'á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú',
        'à', 'è', 'ì', 'ò', 'ù', 'À', 'È', 'Ì', 'Ò', 'Ù',
        'ä', 'ë', 'ï', 'ö', 'ü', 'Ä', 'Ë', 'Ï', 'Ö', 'Ü',
        'â', 'ê', 'î', 'ô', 'û', 'Â', 'Ê', 'Î', 'Ô', 'Û',
        'ã', 'õ', 'ñ', 'Ã', 'Õ', 'Ñ', 'ç', 'Ç'
    );
    $no_accents = array(
        'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U',
        'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U',
        'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U',
        'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U',
        'a', 'o', 'n', 'A', 'O', 'N', 'c', 'C'
    );
    return str_replace($accents, $no_accents, $str);
}


function main($txt){
    $txt = strtolower($txt);
    $txt = remove_accents($txt);
$rev = strrev($txt);
echo $txt. "\n";
if ($rev != $txt){
    return "false";
} else{
    return "true";
}
}


echo main("Árbol");