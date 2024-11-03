<?php
//crear cursor mediante tres numeros aleatorios
function c_sensor(&$matrix){
        $n1 = rand(0, 19);
        $n2 = rand(0, 19);
        $nr = rand(1, 10);
        $red = $nr;
        $matrix[$n1][$n2] = $red;
        }
        //crear matriz
        function imprimir_matriz($matrix){
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
        //imprimir sensores recogidos de la matriz
        function imprimir_sensores($matrix){
            $max_value = -1;
$max_coords = [];
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
                        // Actualizar el valor máximo y sus coordenadas
                        if ($value > $max_value) {
                            $max_value = $value;
                            $max_coords = [$i, $j];
                        }
                    }
                }
            }

            if ($max_value != -1) {
                echo "<div class='danger' style=\"border: 1px solid orange\">";
                echo "Zona de mayor peligro: Valor $max_value en las coordenadas (" . $max_coords[0] . ", " . $max_coords[1] . ")<br>";
                echo "</div>";
            }
        }
                
        