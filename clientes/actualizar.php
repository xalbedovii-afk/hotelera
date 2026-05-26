<?php

include("../config/conexion.php");

$id = $_POST['id'];

$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$fecha = $_POST['fecha'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];

$sql = "UPDATE cliente

SET

Nombre = '$nombre',
Apellido_P = '$apellido_p',
Apellido_M = '$apellido_m',
F_Nacimiento = '$fecha',
No_Tel = '$telefono',
Correo_E = '$correo',
Descripcion = '$descripcion'

WHERE ID_Cliente = '$id'";

mysqli_query($conn, $sql);

header("Location: index.php");

?>