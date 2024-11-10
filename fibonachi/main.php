<?php
function fibonacci($n) {
    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib;
}

$fibonacciSeries = fibonacci(50);
foreach ($fibonacciSeries as $number) {
    echo $number . " ";
}
?>