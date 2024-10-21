<?php
function divide($dividendo, $divisor) {
    if ($divisor == 0) {
        throw new Exception("División por cero.");
    }
    return $dividendo / $divisor;
}

try {
    echo divide(10, 0);
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>
