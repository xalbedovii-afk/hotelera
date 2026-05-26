<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM cliente
WHERE ID_Cliente = '$id'";

mysqli_query($conn, $sql);

header("Location: index.php");

?>