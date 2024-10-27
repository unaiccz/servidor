<?php
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