<?php

function main(){
    $peligros = array();
    function c_sensor(&$matrix){
    $n1 = rand(0, 19);
    $n2 = rand(0, 19);
    $nr = rand(1, 10);
    $red = $nr;
    $matrix[$n1][$n2] = $red;
    }
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
    
    // Imprimir sensores
    echo "<div class= 'sensores'>";
    foreach ($matrix as $i => $row) {
        foreach ($row as $j => $value) {
                
            if ($value != 'X' && $value != 'B') {
                $distancia = abs($i) + abs($j);
                echo "<div class='coordenada'>";
                echo "Valor $value encontrado en las coordenadas ($i, $j)<br>". "Distancia a la Batcueva: $distancia<br>";
                echo "</div>";
                // Verificar si el valor pasa de 7
                if ($value >= 7) {
                    echo " <p class='warning'>  =>  Protocolo activado para el valor $value en las coordenadas ($i, $j)<br><p>";
                }

            }
        }
    }
    echo "</div>";

    // Estilos
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
    foreach ($matrix as $row) {
    foreach ($row as $i => $value) {
        if ($value == 'B') {
            $row[$i] = "<span style='color: blue;'>$value</span>";
        } elseif ($value == 'X') {
            $row[$i] = "<span style='color: gray;'>$value</span>";
        } elseif ($value <= 7) {
            $row[$i] = "<span style='color: green;'>$value</span>";
        } else {
            $row[$i] = "<span style='color: red;'>$value</span>";
        }
    }
    echo "</div>";
    echo implode(' ', $row) . "<br>";
    }
}


main();