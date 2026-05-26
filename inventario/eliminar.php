<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM productos
WHERE ID_producto = '$id'";

mysqli_query($conn, $sql);

header("Location: index.php");

?>