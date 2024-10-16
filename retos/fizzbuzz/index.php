<?php


for ($i=0; $i<= 100; $i++){
    if ($i % 3 == 0 && $i % 5 == 0){
        echo $i."    Fizz Buzz". "<br>";
    } elseif ($i % 5 == 0){
        echo $i. "     Buzz". "<br>";
    } elseif ($i % 3 == 0){
        echo $i."    Fizz". "<br>";
    } else {
        echo $i . "<br>";
    }
}