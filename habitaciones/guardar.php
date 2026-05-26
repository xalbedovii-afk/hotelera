<?php

include("../config/conexion.php");

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$estado = $_POST['estado'];

$sql = "INSERT INTO habitacion
(
Nombre_H,
FK_Tipo_Habitacion,
FK_Estado_Habitacion
)

VALUES
(
'$nombre',
'$tipo',
'$estado'
)";

mysqli_query($conn, $sql);

header("Location: index.php");

?>