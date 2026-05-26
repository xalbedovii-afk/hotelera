session_start();

if(!isset($_SESSION['usuario'])){

    header("Location:
    ../login/index.php");

}

if(

$_SESSION['rol'] != 'Administrador'

&&

$_SESSION['rol'] != 'Recepcionista'

){

    echo "

    <h1>
    Acceso denegado
    </h1>

    ";

    exit();

} 
<?php

header("Location: login/index.php");

?>