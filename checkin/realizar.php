<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "UPDATE reservacion

SET

FK_Estado_Reservacion = 2,
Hora_Entrada = NOW()

WHERE ID_Reservacion = '$id'";

mysqli_query($conn, $sql);

$sql_habitacion = "UPDATE habitacion h

INNER JOIN reservacion_detalle rd
ON h.ID_Habitacion = rd.FK_Habitacion

SET h.FK_Estado_Habitacion = 2

WHERE rd.FK_Reservacion = '$id'";

mysqli_query($conn, $sql_habitacion);

header("Location: index.php");

?>