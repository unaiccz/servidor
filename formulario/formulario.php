<form action="formulario.php" method="post" enctype="multipart/form-data">
    <input type="text" name="nombre" id="" placeholder="nombre">
    <input type="email" name="email" id="" placeholder="email">
    <input type="file" name="archivo" >
    <input type="submit">
</form>
<?php
$folder = "fotos/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $tmpArchivo = $_FILES['archivo']['tmp_name'];
    //comprobar si el nombre esta vacio para no continuar
    if(strlen($nombre) == 0){
        header("Location:error.php?error=Deves indicar tu nombre");
        exit();

    }
    // comprobar el email
    if(strlen($email) == 0){
        header("Location:error.php?error=Deves indicar tu email");
        exit();

    }
    if(!$tmpArchivo || !file_exists($tmpArchivo)){
        header("Location:error.php?error=campo de imagen vacio");
        exit();

    }
    $destino = $folder . basename($_FILES['archivo']['name']);

    // Verificar si la carpeta existe, si no, crearla
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // Verificar si el archivo fue subido sin errores
    if (is_uploaded_file($tmpArchivo)) {
        if (move_uploaded_file($tmpArchivo, $destino)) {
            echo "El archivo ha sido subido exitosamente."."<br>";
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Error al subir el archivo.";
    }
}
echo "Nombre: $nombre"."<br>";
echo "email: $email"."<br>";
echo '<img src="fotos/' . $_FILES['archivo']['name'] . '">';
?>
