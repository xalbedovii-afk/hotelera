<?php

include("../config/conexion.php");

$sql = "SELECT
*
FROM facturas";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Reporte Facturas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Reporte Facturas</h1>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Total</th>
<th>Fecha</th>

</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['ID_Factura']; ?></td>

<td>$<?php echo $fila['Valor_Total']; ?></td>

<td><?php echo $fila['Fecha_Emision']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>