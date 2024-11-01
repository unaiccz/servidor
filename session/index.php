<?php
session_start();
// Inicializar variables de sesión si no están definidas
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}
if (!isset($_SESSION['carro'])) {
    $_SESSION['carro'] = array();
}

// Lista de productos
$prods = [
    ['id' => 1, 'name' => 'T-shirt', 'price' => 10],
    ['id' => 2, 'name' => 'Jeans', 'price' => 20],
    ['id' => 3, 'name' => 'Socks', 'price' => 5],
    ['id' => 4, 'name' => 'Jacket', 'price' => 50],
    ['id' => 5, 'name' => 'Shoes', 'price' => 100],
    ['id' => 6, 'name' => 'Hat', 'price' => 15],
    ['id' => 7, 'name' => 'Gloves', 'price' => 10],
    ['id' => 8, 'name' => 'Shorts', 'price' => 15],
    ['id' => 9, 'name' => 'Scarf', 'price' => 20],
    ['id' => 10, 'name' => 'Belt', 'price' => 10]
];

// Mostrar lista de productos
foreach ($prods as $prod) {
    echo "<a href='index.php?id=" . htmlspecialchars($prod['id']) . "'>" . htmlspecialchars($prod['name']) . " (" . htmlspecialchars($prod['price']) . ")</a><br>";
}

// Verificar si hay un ID en la URL y si es válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    foreach ($prods as $prodf) {
        if ($id === $prodf['id']) {
            $pr = $prodf['price'];
            $_SESSION['total'] += $pr;
            $_SESSION['carro'][] = $prodf;
            break; // Salir del bucle una vez encontrado el producto
        }
    }
}
if($_GET['id'] == 'vaciar'){
    session_unset();
}
// Mostrar el total
$tot = $_SESSION['total'];
echo "<h4>Carro</h4>";
foreach($_SESSION['carro'] as $cr){
    echo "Nombre: {$cr['name']}";
    echo "precio: ({$cr['price']})"."<br>";

}
echo "total: ".$tot."<br>";
echo "<a href='index.php?id=vaciar'>"."VACIAR"."</a>" ;