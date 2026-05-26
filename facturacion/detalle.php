<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "SELECT

f.ID_Factura,
f.Valor_Total,
f.Subtotal,
f.Monto_IVA,
f.Monto_ISH,
f.Fecha_Emision,

c.Nombre,
c.Apellido_P,

h.Nombre_H

FROM facturas f

INNER JOIN reservacion_detalle rd
ON f.Fk_Reservacion_Detalle =
   rd.ID_R_Detalle

INNER JOIN reservacion r
ON rd.FK_Reservacion =
   r.ID_Reservacion

INNER JOIN cliente c
ON r.FK_Cliente = c.ID_Cliente

INNER JOIN habitacion h
ON rd.FK_Habitacion = h.ID_Habitacion

WHERE f.ID_Factura = '$id'";

$resultado = mysqli_query($conn, $sql);

$factura = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>

<head>

<title>Factura</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card">

<div class="card-header">

<h2>Factura #<?php echo $factura['ID_Factura']; ?></h2>

</div>

<div class="card-body">

<h4>Cliente</h4>

<p>

<?php
echo $factura['Nombre']." ".
     $factura['Apellido_P'];
?>

</p>

<h4>Habitación</h4>

<p><?php echo $factura['Nombre_H']; ?></p>

<hr>

<h5>Subtotal:
$<?php echo $factura['Subtotal']; ?></h5>

<h5>IVA:
$<?php echo $factura['Monto_IVA']; ?></h5>

<h5>ISH:
$<?php echo $factura['Monto_ISH']; ?></h5>

<hr>

<h3>Total:
$<?php echo $factura['Valor_Total']; ?></h3>

<a href="../pagos/pagar.php?id=<?php echo $factura['ID_Factura']; ?>"
   class="btn btn-success">
   Registrar Pago
</a>

</div>

</div>

</div>

</body>
</html>