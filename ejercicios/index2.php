<?php
//importamos las funciones
include 'index2.inc.php';
//array de usuarios 
$Users = [];
// funcion principal
function main ()
{
    //mediante el retoorno de ` crearUsuario` se rellena el array de usuarios
    $Users[] = crearUsuario("luke skywalwer","lukesk@gmail.gax","11/04/2003");
    $Users[] = crearUsuario("yoda", "yoda@jedi.com", "11/04/1975");
    $Users[] = crearUsuario("obiwan", "obiwan@jedi.com", "11/04/1977");
    $Users[] = crearUsuario("Anakin","anakin@sith.com","06/12/1500");
    //estilos css
    echo '<style>
        body {
            font-family: Arial, sans-serif;
        }
        .user {
            border: 1px solid #ccc;
            width: 500px;
            padding: 10px;
            margin: 10px 0;
        }
        .user h2 {
            margin: 0;
            color: #333;
        }
        .user p {
            margin: 5px 0;
        }
    </style>';
    //recorremos el array de usuarios para mostrarlos y paa poder localizar usuarios del lado oscuro
    foreach($Users as $us){
        if (strpos($us['Email'], '@sith.com') !== false) {
            echo '<script>alert("Usuario usuario del lado oscuro detectado: '.$us['Nombre'].'");</script>';
        }
        echo '<div class="user">';
        echo '<h2>Usuario: '.$us['Nombre'].'</h2>';
        echo '<p>Email: '.$us['Email'].'</p>';
        echo '<p>Edad: '.$us['Edad'].'</p>';
        echo '</div>';
    }
}
main();
?>