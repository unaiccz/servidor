<?php
    function c_sensor(&$matrix){
        $n1 = rand(0, 19);
        $n2 = rand(0, 19);
        $nr = rand(1, 10);
        $red = $nr;
        $matrix[$n1][$n2] = $red;
        }