<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../login/index.php");
}

include("../config/conexion.php");

$sql = "SELECT

r.ID_Reservacion,
c.Nombre,
c.Apellido_P,
r.Fecha_Entrada,
r.Fecha_Salida

FROM reservacion r

INNER JOIN cliente c
ON r.FK_Cliente = c.ID_Cliente

WHERE r.FK_Estado_Reservacion = 1";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Check-In</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Check-In</h1>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Cliente</th>
<th>Entrada</th>
<th>Salida</th>
<th>Acción</th>

</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['ID_Reservacion']; ?></td>

<td>

<?php
echo $fila['Nombre']." ".
     $fila['Apellido_P'];
?>

</td>

<td><?php echo $fila['Fecha_Entrada']; ?></td>

<td><?php echo $fila['Fecha_Salida']; ?></td>

<td>

<a href="realizar.php?id=<?php echo $fila['ID_Reservacion']; ?>"
   class="btn btn-success">
   Realizar Check-In
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>