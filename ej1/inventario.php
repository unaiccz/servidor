<?php
// Clase para los productos
class Producto {
    public $nombre;
    public $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
}

// Instancias de productos
$productos = [
    "pantalones" => new Producto("pantalones", 100),
    "camisa" => new Producto("camisa", 50),
    "zapatillas" => new Producto("zapatillas", 200),
    "gorra" => new Producto("gorra", 20)
];

// Variables de control de cantidad y costo
$cantidades = [
    "pantalones" => 0,
    "camisa" => 0,
    "zapatillas" => 0,
    "gorra" => 0
];

$state = 0;
while ($state != 1) {
    echo "Ingrese su nombre: ";
    $nombre = trim(fgets(STDIN));

    if (strlen($nombre) < 3) {
        echo "Nombre no válido...\n";
        continue;
    }

    echo "¿Cuántos productos diferentes vas a comprar? (mínimo 1, máximo 5): ";
    $cantidad = intval(trim(fgets(STDIN)));

    if ($cantidad < 1 || $cantidad > 5) {
        echo "Cantidad no válida...\n";
        continue;
    }

    $costeInicial = 0;

    for ($i = 0; $i < $cantidad; $i++) {
        echo "Ingresa el nombre del producto: ";
        $producto = trim(fgets(STDIN));

        if (!array_key_exists($producto, $productos)) {
            echo "Producto no válido... (pantalones, camisa, zapatillas, gorra)\n";
            continue 2;
        }

        echo "Ingresa la cantidad de productos: ";
        $cantidadProducto = intval(trim(fgets(STDIN)));

        $costeInicial += $productos[$producto]->precio * $cantidadProducto;
        echo "Coste por unidad: {$productos[$producto]->precio}\n";
        $cantidades[$producto] += $cantidadProducto;

        if ($i == $cantidad - 1) {
            $state = 1;
        }
    }
}

// Mostrar los costes
echo "Resumen de la compra de $nombre:\n";
foreach ($cantidades as $producto => $cantidad) {
    if ($cantidad > 0) {
        echo "Cantidad de $producto: $cantidad, precio: " . $cantidad * $productos[$producto]->precio . "\n";
    }
}

echo "Coste sin descuentos: $costeInicial\n";

if ($costeInicial > 100 && $costeInicial < 200) {
    $costeInicial -= $costeInicial * 0.10;
    echo "Coste con descuento por superar los 100$ del 10%: $costeInicial\n";
} elseif ($costeInicial >= 200) {
    $costeInicial -= $costeInicial * 0.15;
    echo "Coste con descuento por superar los 200$ del 15%: $costeInicial\n";
}

echo "Precio final: $costeInicial\n";
?>
