<?php

include("../config/conexion.php");

$id = $_POST['id'];

$nombre = $_POST['nombre'];
$stock = $_POST['stock'];
$minimo = $_POST['minimo'];
$precio = $_POST['precio'];

$sql = "UPDATE productos

SET

Nombre_Producto = '$nombre',
Stock_Max = '$stock',
Stock_Min = '$minimo',
Precio = '$precio'

WHERE ID_producto = '$id'";

mysqli_query($conn, $sql);

header("Location: index.php");

?>