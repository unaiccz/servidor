<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Batcueva</title>
    <style>
        .matriz span {
            display: inline-block;
            width: 20px;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="index3.css">
</head>
<body>
    <h1>Bienvenidos a la Batcueva</h1>
    <?php
    // Incluir las funciones
    include 'index3.inc.php';

    // Función principal
    function main() {
        // Tamaño de la matriz
        $tamanio = 20;
        // Inicializar la matriz
        $matriz = array();
        inicializar_matriz($tamanio, $matriz);
        
        // Posición de la Batcueva
        $matriz[0][0] = 'B';
        
 
        $sensores = array();
        $peligro_maximo = 0;
        crear_sensores(5, $sensores, $peligro_maximo);
        colocar_sensores($sensores, $matriz);
        
        // Imprimir la matriz
        echo "<h2>Matriz de Sensores</h2>";
        imprimir_matriz($matriz, $tamanio);
        
        // Mostrar detalles de los sensores
        echo "<h2>Detalles de los Sensores</h2>";
        mostrar_sensores($sensores);
        
        // Ejecutar protocolo de seguridad
        echo "<h2>Protocolo de Seguridad</h2>";
        protocolo_seguridad($sensores);
        echo "<p class='max'>El peligro máximo es: $peligro_maximo</p>";
    }

    // Ejecutar la función principal
    main();
    ?>
</body>
</html>