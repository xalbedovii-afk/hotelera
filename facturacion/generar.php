<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "SELECT

r.ID_Reservacion,
r.Fecha_Entrada,
r.Fecha_Salida,

rd.ID_R_Detalle,
rd.Tarifa_Noche,

c.Nombre,
c.Apellido_P,

DATEDIFF(r.Fecha_Salida,
         r.Fecha_Entrada) AS Noches

FROM reservacion r

INNER JOIN reservacion_detalle rd
ON rd.FK_Reservacion = r.ID_Reservacion

INNER JOIN cliente c
ON r.FK_Cliente = c.ID_Cliente

WHERE r.ID_Reservacion = '$id'";

$resultado = mysqli_query($conn, $sql);

$datos = mysqli_fetch_assoc($resultado);

$subtotal =
$datos['Noches'] *
$datos['Tarifa_Noche'];

$iva = $subtotal * 0.16;

$ish = $subtotal * 0.05;

$total = $subtotal + $iva + $ish;

$sql_factura = "INSERT INTO facturas
(
Fk_Reservacion_Detalle,
Valor_Total,
Subtotal,
Fecha_Emision,
FK_Estado_Factura,
Monto_Descuento,
Monto_IVA,
Monto_ISH
)

VALUES
(
'".$datos['ID_R_Detalle']."',
'$total',
'$subtotal',
NOW(),
1,
0,
'$iva',
'$ish'
)";

mysqli_query($conn, $sql_factura);

$id_factura = mysqli_insert_id($conn);

header("Location: detalle.php?id=".$id_factura);

?>