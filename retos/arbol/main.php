<?php
function arbol($n) {
    $x = $n * 2;
    for ($i = 0; $i < $n; $i++) {
        echo "<br>";
        for ($j = 0; $j < $x; $j++) {
            echo str_repeat('*', $j) . "<br>";
        }
    }
}

function main() {
    arbol(4);
}

main();