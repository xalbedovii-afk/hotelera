<?php

include("../config/conexion.php");

$sql = "SELECT

p.ID_Pago,
p.Monto_abonado,
p.Fecha_Pago,
m.Tipo_Metodo

FROM pagos p

INNER JOIN metodos_de_pago m
ON p.FK_Metodo_Pago =
   m.ID_Metodo_P";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Reporte Pagos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Reporte Pagos</h1>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Monto</th>
<th>Fecha</th>
<th>Método</th>

</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['ID_Pago']; ?></td>

<td>$<?php echo $fila['Monto_abonado']; ?></td>

<td><?php echo $fila['Fecha_Pago']; ?></td>

<td><?php echo $fila['Tipo_Metodo']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>