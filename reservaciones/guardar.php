<?php

include("../config/conexion.php");

$cliente = $_POST['cliente'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];
$habitacion = $_POST['habitacion'];

$sql = "INSERT INTO reservacion
(
FK_Cliente,
Fecha_Entrada,
Fecha_Salida,
FK_Estado_Reservacion
)

VALUES
(
'$cliente',
'$entrada',
'$salida',
1
)";

mysqli_query($conn, $sql);

$id_reservacion = mysqli_insert_id($conn);

$sql_detalle = "INSERT INTO reservacion_detalle
(
FK_Reservacion,
FK_Habitacion,
Tarifa_Noche
)

VALUES
(
'$id_reservacion',
'$habitacion',
1000
)";

mysqli_query($conn, $sql_detalle);

header("Location: index.php");

?>