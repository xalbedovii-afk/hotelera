<?php

include("../config/conexion.php");

$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$fecha = $_POST['fecha'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];

$sql = "INSERT INTO cliente
(
Nombre,
Apellido_P,
Apellido_M,
F_Nacimiento,
No_Tel,
Correo_E,
Descripcion
)

VALUES
(
'$nombre',
'$apellido_p',
'$apellido_m',
'$fecha',
'$telefono',
'$correo',
'$descripcion'
)";

mysqli_query($conn, $sql);

header("Location: index.php");

?>