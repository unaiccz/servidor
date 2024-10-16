<?php
//clase para los productos
class Producto{
    public $nombre;
    public $precio;
    public function __construct($nombre, $precio){
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
}
// instancias de productos
$pantalones = new Producto("pantalones", 100);
$camisa = new Producto("camisa", 50);
$zapatillas = new Producto("zapatillas", 200);
$gorra = new Producto("gorra", 20);

// variables de control de cantidad y costo
$pantalones_cantidad = 0;
$camisa_cantidad = 0;
$zapatillas_cantidad = 0;
$gorra_cantidad = 0;
// estado global para controlar el ciclomientras los ingresos no sean correctos
$state = 0;
while ($state != 1){
    echo "Ingrese su nombre: ";
    $nombre = trim(fgets(STDIN));
    // si el nombre no es vacio
    if (strlen($nombre)  < 3){
        echo "nombre no valido... ";
        $state = 1;
    }
    // recoger y validar la cantidad de productos
    echo "¿Cuántos productos diferentes vas a comprar? (mínimo 1, máximo 5): ";
    $cantidad = trim(fgets(STDIN));
    // parsear
    $cantidad = intval($cantidad);
    if ($cantidad < 1 || $cantidad > 5){
        echo "cantidad no valida... ";
        $state = 1;
    }
    // recoger y validar el costo inicial y bucle para recoger los productos
$costeInicial = 0;

    for($i = 0; $i < $cantidad; $i++){
        echo "Ingresa el nombre del producto: ";
        $producto = trim(fgets(STDIN));
    
        echo "Ingresa la cantidad de productos: ";
        $cantidadProducto = trim(fgets(STDIN));
        // parsear
        $cantidadProducto = intval($cantidadProducto);
        if ($producto == "pantalones"){
$costeInicial += $pantalones->precio * $cantidadProducto;
            echo "coste por unidad: $pantalones->precio\n";
            $pantalones_cantidad += $cantidadProducto;
        //  ver si es el ultimo producto para mostrar los costes
            if ($i == $cantidad - 1){
                $state = 1;
            }
        } 
        
        elseif ($producto == "camisa"){
$costeInicial += $camisa->precio * $cantidadProducto;
            echo "coste por unidad: $camisa->precio\n";
            $camisa_cantidad += $cantidadProducto;
        // ver si es el ultimo producto para mostrar los costes
            if ($i == $cantidad - 1){
                $state = 1;
            }
        } 
        elseif ($producto == "zapatillas"){
$costeInicial += $zapatillas->precio * $cantidadProducto;
            echo "coste por unidad: $zapatillas->precio\n";
            $zapatillas_cantidad += $cantidadProducto;
        // ver si es el ultimo producto para mostrar los costes
            if ($i == $cantidad - 1){
                $state = 1;
            }
        } 
         
        
        elseif ($producto == "gorra"){
$costeInicial += $gorra->precio * $cantidadProducto;
            echo "coste por unidad: $gorra->precio\n";
            $gorra_cantidad += $cantidadProducto;
            if ($i == $cantidad - 1){
                $state = 1;
            }
        } else {
            echo "producto no valido... ". 'pantalones, camisa, zapatillas, gorra'."\n";
            $state = 1;
        }

    }
} // fin del bucle
// mostrar los costes
echo "Resumen de la compra de $nombre: \n";
if ($pantalones_cantidad > 0){
    echo "Cantidad de pantalones: $pantalones_cantidad: precio:  ". $pantalones_cantidad*$pantalones->precio."\n";
}
if ($camisa_cantidad > 0){
    echo "Cantidad de camisas: $camisa_cantidad: precio:  ". $camisa_cantidad*$camisa->precio."\n";
}
if ($zapatillas_cantidad > 0){
    echo "Cantidad de zapatillas: $zapatillas_cantidad: precio:  ". $zapatillas_cantidad*$zapatillas->precio."\n";
}
if ($gorra_cantidad > 0){
    echo "Cantidad de gorras: $gorra_cantidad: precio:  ". $gorra_cantidad*$gorra->precio."\n";
}

echo "Coste sin descuentos: $costeInicial\n";
if($pantalones_cantidad > 10){
    
}
if ($costeInicial > 100 && $costeInicial< 200){
    $costeInicial = $costeInicial - ($costeInicial * 0.10);
    echo "Coste con descuento por superar los 100$ del 10%: $costeInicial\n" ;    
} elseif ($costeInicial >= 200){
    $costeInicial = $costeInicial - ($costeInicial *0.15);
    echo "Coste con descuento por superar los 200$ del 15%: $costeInicial\n" ;

}
echo "Precio final: $costeInicial\n";
?>