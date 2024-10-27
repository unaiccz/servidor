<?php
include 'utils/colocar_sensor.php';
include 'utils/imprimir_sensores.php';
include 'utils/imprimir_matriz.php';
//funcion principal
function main(){
    //funcion para colocar los sensores

    $matrix = [];
    for ($i = 0; $i < 20; $i++) {
        $row = [];
        for ($j = 0; $j < 20; $j++) {
            $row[] = 'X';
        }
        $matrix[] = $row;
    }
    $matrix[0][0] = 'B';

    // Colocar sensores

    c_sensor($matrix);
    c_sensor( $matrix);
    c_sensor( $matrix);
    c_sensor( $matrix);
    c_sensor( $matrix);
    c_sensor( $matrix);
    // Imprimir sensores detectados en la matriz
    echo "<div class= 'sensores'>";
imprimir_sensores($matrix);
    echo "</div>";

    // Estilos de la pagino
    echo "<style>";
    echo ".coordenada {";
echo "text-align: center;";
echo "margin-bottom: 20px;";
echo "padding: 20px;";
echo "border: 2px solid #ccc;";
echo "background-color: #f9f9f9;";
echo "border-radius: 10px;";
echo "box-shadow: 0 4px 8px rgba(0, 0, 0.1, 0.5);";
echo "}";
echo ".warning {";
echo "color: red;";
echo "font-weight: bold;";
echo "}";
    echo ".sensores {";
echo "text-align: center;";
echo "margin-bottom: 80px;";
echo "margin-top: 20px;";
echo "padding: 20px;";
echo "border: 2px solid #ccc;";
echo "background-color: #f9f9f9;";
echo "border-radius: 10px;";
echo "box-shadow: 0 4px 8px rgba(0, 0, 0.1, 0.5);";
echo "}";
echo ".matriz {";
echo "text-align: center;";
echo "margin-top: 20px;";
echo "padding: 20px;";
echo "border: 2px solid #ccc;";
echo "background-color: #f9f9f9;";
echo "border-radius: 10px;";
echo "box-shadow: 0 4px 8px rgba(0, 0, 0.1, 0.5);";
echo "width: 400px;";
echo "}";
    echo "</style>";

    // Encabezado
    echo "<div>";
    echo "<h1>Batcueva</h1>";
    echo "<hr>";
    echo "<h4>Sensores</h4>";
    echo "</div>";

    // Imprimir matriz
    echo "<div class='matriz'>";
imprimir_matriz($matrix);
    echo "</div>";
}


main();