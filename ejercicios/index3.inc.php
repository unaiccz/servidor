<?php
// =======================================
//           Funciones de la Batcueva
// =======================================
// funcion para representar una matriz con tamanio $n
function inicializar_matriz($n, &$matriz) {
    // Inicializar la matriz
    for ($i = 0; $i < $n; $i++) {
        $matriz[$i] = array();
        for ($j = 0; $j < $n; $j++) {
            $matriz[$i][$j] = 0;
        }
    }


}
    // Imprimir la matriz en formato de cuadrícula
function imprimir_matriz($matriz, $n){
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $valor = $matriz[$i][$j];
            if ($valor === 'B') {
                echo "<span style='color: blue;'>$valor</span> ";
            } elseif ($valor === 0) {
                echo "<span style='color: green;'>$valor</span> ";
            } elseif ($valor < 7) {
                echo "<span style='color: orange;'>$valor</span> ";
            } else {
                echo "<span style='color: red;'>$valor</span> ";
            }
        }
        echo "<br>";
    }
}
//funcion para crear sensores
function crear_sensores($numero_sensores, &$sensores,&$peligro_maximo){
    for ($i=0; $i < $numero_sensores; $i++) {
    $x = rand(0,20);
    $y = rand(0,20);
    $peligro = rand(1,10);
    $sensor = array("x"=>$x,"y"=>$y,"peligro"=>$peligro, "distancia"=>(abs($x)+abs($y)));
    $sensores[$i] = $sensor;
    if($peligro > $peligro_maximo){
        $peligro_maximo = "x: ".$sensor['x']. " y: ".$sensor['y']." peligro: ".$sensor['peligro'];
    }
    }
function colocar_sensores($sensores, &$matriz){
foreach ($sensores as $sensor) {
    $matriz[$sensor["x"]][$sensor["y"]] = $sensor["peligro"];
}
}
    function mostrar_sensores($sensores){
        foreach ($sensores as $sensor) {
            echo "Sensor en x: ".$sensor["x"]." y: ".$sensor["y"]." peligro: ".$sensor["peligro"]. " Distancia a la Batcueva:   ".$sensor['distancia']."<br>";
        }
    }

}
function protocolo_seguridad($sensores){
    foreach($sensores as $sensor){
        if($sensor["peligro"] >= 7){
            echo "Alerta! Sensor en x: ".$sensor["x"]." y: ".$sensor["y"]." peligro: ".$sensor["peligro"]. "  Distancia a la Batcueva:   ".$sensor['distancia']."<br>";
        }
    }
}