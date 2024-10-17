<h1>Puntuaciones</h1>
<hr>
<form action="main.php" method="post">
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="number" name="puntuacion" placeholder="Puntuación">
    <input type="submit" value="Enviar">
</form>


<?php
if ($_POST){
    $usuario = $_POST["usuario"];
    $puntuacion = $_POST["puntuacion"];
}
function main(){


try{
    $file = fopen("puntuaciones.txt", "a+");
} catch (Exception $e) {
    echo "Error al abrir el archivo";
    return;
}
$puntos = fread($file, filesize("puntuaciones.txt"));
$campos = explode("\n", $puntos);
foreach ($campos as $campo){
    $datos = explode(";", $campo);
    echo "<p>Usuario: $datos[0] - Puntuación: $datos[1]</p>";
}

}



main();