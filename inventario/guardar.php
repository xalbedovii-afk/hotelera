<?php

include("../config/conexion.php");

$nombre = $_POST['nombre'];
$stock = $_POST['stock'];
$minimo = $_POST['minimo'];
$precio = $_POST['precio'];

$sql = "INSERT INTO productos
(
Nombre_Producto,
Stock_Max,
Stock_Min,
Precio
)

VALUES
(
'$nombre',
'$stock',
'$minimo',
'$precio'
)";

mysqli_query($conn, $sql);

header("Location: index.php");

?>