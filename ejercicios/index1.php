<?php
function main() {
    // productos
    $prods = [
        ['nombre' => 'camisa', 'precio' => 20],
        ['nombre' => 'pantalon', 'precio' => 25],
        ['nombre' => 'calcetines', 'precio' => 5],
        ['nombre' => 'zapatos', 'precio' => 50],
        ['nombre' => 'gorra', 'precio' => 10],
    ];

    // variables para el control de los productos para facilitar el manejo en el bucle
    $cantidades = [
        'camisa' => 0,
        'pantalon' => 0,
        'calcetines' => 0,
        'zapatos' => 0,
        'gorra' => 0
    ];
    // variable para almacenar el precio total de la compra
    $precio_total = 0;

    // variables de sesion para guardar los productos y cantidades y descuentos
    $nombre = readline("Introduce tu nombre: ");
    echo "Hola $nombre, estos son los productos que tenemos: \n";
    foreach ($prods as $prod) {
        echo $prod['nombre'] . " - " . $prod['precio'] . "\n";
    }
    // uso intval para evitar errores de tipado
    $num_prod = intval(readline("Introduce el numero de productos a comprar (1-5): "));
    if ($num_prod < 1 || $num_prod > 5) {
        echo "El numero de productos debe ser entre 1 y 5\n";
        return;
    }
    // bucle para introducir los productos y cantidades
    for ($i = 0; $i < $num_prod; $i++) {
        $el = readline("Introduce el nombre del producto: ");
        if (!array_key_exists($el, $cantidades)) {
            echo "Producto no válido. Inténtalo de nuevo.\n";
            $i--;
            continue;
        }

        $cant = intval(readline("Introduce la cantidad del producto: "));
        if ($cant < 1) {
            echo "La cantidad debe ser al menos 1. Inténtalo de nuevo.\n";
            $i--;
            continue;
        }
        // sumar las cantidades y calcular el precio total
        $cantidades[$el] += $cant;
        foreach ($prods as $prod) {
            if ($prod['nombre'] == $el) {
                $precio_total += $prod['precio'] * $cant;
                break;
            }
        }
    }
    // Mostrar la compra
    echo "Compra de ". $nombre . ":\n";
    foreach ($cantidades as $key => $value) {
        if ($value > 0) {
            foreach ($prods as $prod) {
                if ($prod['nombre'] == $key) {
                    echo "$key: $value unidades - " . ($prod['precio'] * $value) . "€\n";
                    break;
                }
            }
        }
    }
    echo "El precio total sin descuentos es: $precio_total\n";

    // Aplicar descuentos

    // Descuento del 10% por comprar 10 o más unidades de un producto
    foreach($cantidades as $key => $value){
        if($value >= 10){
            $precio_total -= $precio_total * 0.05;
            echo "Se aplica un descuento del 10% por comprar 10 o más unidades de un producto($key).\n";
        }
    }

    // Descuento del 5% por comprar 5 productos diferentes
    if (count(array_filter($cantidades)) == 5) {
        $precio_total -= $precio_total * 0.05;
        echo "Se aplica un descuento del 5% por comprar 5 productos diferentes.\n";
    }


if($precio_total > 200){
    $precio_total -= $precio_total * 0.10;
    echo "Se aplica un descuento del 10% por comprar más de 200€.\n";
} else if($precio_total > 100){
    $precio_total -= $precio_total * 0.15;
    echo "Se aplica un descuento del 15% por comprar más de 100€.\n";

}
echo "###El precio total con descuentos es: $precio_total\n";

}

main();