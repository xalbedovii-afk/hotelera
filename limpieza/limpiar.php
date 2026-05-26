<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "UPDATE habitacion

SET FK_Estado_Habitacion = 1

WHERE ID_Habitacion = '$id'";

mysqli_query($conn, $sql);

header("Location: index.php");

?>