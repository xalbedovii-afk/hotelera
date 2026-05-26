<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "SELECT

r.ID_Reservacion,
r.Fecha_Entrada,
r.Fecha_Salida,

c.Nombre,
c.Apellido_P,

h.Nombre_H

FROM reservacion r

INNER JOIN cliente c
ON r.FK_Cliente = c.ID_Cliente

INNER JOIN reservacion_detalle rd
ON rd.FK_Reservacion = r.ID_Reservacion

INNER JOIN habitacion h
ON rd.FK_Habitacion = h.ID_Habitacion

WHERE r.ID_Reservacion = '$id'";

$resultado = mysqli_query($conn, $sql);

$reserva = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>

<head>

<title>Detalle</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Detalle Reservación</h1>

<div class="card">

<div class="card-body">

<h4>Cliente:</h4>

<p>

<?php
echo $reserva['Nombre']." ".
     $reserva['Apellido_P'];
?>

</p>

<h4>Habitación:</h4>

<p><?php echo $reserva['Nombre_H']; ?></p>

<h4>Entrada:</h4>

<p><?php echo $reserva['Fecha_Entrada']; ?></p>

<h4>Salida:</h4>

<p><?php echo $reserva['Fecha_Salida']; ?></p>

</div>

</div>

</div>

</body>
</html>