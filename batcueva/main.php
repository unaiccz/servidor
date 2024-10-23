<?php
// Funcion principal
function main(){
    //Array para almacenar los peligros
    $peligros = array();
    //    Funcion para generar 'peligros'
    function c_sensor(&$matrix){
        // uso de rand() para obtener numeros aleatorios
        //coordenadas de posicion aleatorias  ###
    $n1 = rand(0, 19);
    $n2 = rand(0, 19);

        // numero entero aleatorio 1-10 para cada peligro ###
    $nr = rand(1, 10);
    $red = $nr;

        //creacion de peligro en la matriz con su valor de peligro*
    $matrix[$n1][$n2] = $red;
    }
    //definiendo la matriz para el 'mapa**'

    
    $matrix = [];

    //bucle para generar las filas
    for ($i = 0; $i < 20; $i++) {
        $row = [];

        //bucle anidado para rellenar las filas
        for ($j = 0; $j < 20; $j++) {
            $row[] = 'X';
        }

        //una vez las filas rellenadas, se añaden a la matriz
        $matrix[] = $row;
    }

    // creanndo en la matriz el primer elemento en referencia a la ***batcueva***
    $matrix[0][0] = 'B';

    // Colocar sensores
    //###################
    c_sensor($matrix);
    
    c_sensor( $matrix);
    c_sensor( $matrix);
    c_sensor( $matrix);
    c_sensor( $matrix);
    c_sensor( $matrix);
    //##################
    // Imprimir sensores
    echo "<div class= 'sensores'>";
    foreach ($matrix as $i => $row) {
        foreach ($row as $j => $value) {
                
            if ($value != 'X' && $value != 'B') {
                //obtener la distancia
                $distancia = abs($i) + abs($j);
                echo "<div class='coordenada'>";
                echo "Valor $value encontrado en las coordenadas ($i, $j)<br>". "Distancia a la Batcueva: $distancia<br>";
                echo "</div>";
                // Verificar si el valor pasa de 7, y en ese caso alertar !!!
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
    echo "<h1>Batcueva</h1>";
    echo "<hr>";

    // Imprimir matriz completa
    echo "<div class='matriz'>";
    foreach ($matrix as $row) {
    foreach ($row as $i => $value) {
        //deteccion de campos
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
