<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "UPDATE reservacion

SET FK_Estado_Reservacion = 3

WHERE ID_Reservacion = '$id'";

mysqli_query($conn, $sql);

header("Location: index.php");

?>