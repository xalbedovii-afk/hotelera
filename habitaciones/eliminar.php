<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM habitacion
WHERE ID_Habitacion = '$id'";

mysqli_query($conn, $sql);

header("Location: index.php");

?>