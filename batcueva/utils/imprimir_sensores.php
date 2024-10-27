<?php
function imprimir_sensores($matrix){
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
}