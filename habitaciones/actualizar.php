<?php

include("../config/conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$estado = $_POST['estado'];

$sql = "UPDATE habitacion

SET

Nombre_H = '$nombre',
FK_Tipo_Habitacion = '$tipo',
FK_Estado_Habitacion = '$estado'

WHERE ID_Habitacion = '$id'";

mysqli_query($conn, $sql);

header("Location: index.php");

?>