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
r.Fecha_Salida,
er.Descripcion_Estado

FROM reservacion r

INNER JOIN cliente c
ON r.FK_Cliente = c.ID_Cliente

INNER JOIN estado_reservacion er
ON r.FK_Estado_Reservacion =
   er.ID_E_Reservacion

ORDER BY r.ID_Reservacion DESC";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Reservaciones</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Reservaciones</h1>

<a href="agregar.php"
   class="btn btn-success mb-3">
   Nueva Reservación
</a>

<a href="../dashboard/dashboard.php"
   class="btn btn-secondary mb-3">
   Regresar
</a>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Cliente</th>
<th>Entrada</th>
<th>Salida</th>
<th>Estado</th>
<th>Acciones</th>

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

<td><?php echo $fila['Descripcion_Estado']; ?></td>

<td>

<a href="detalle.php?id=<?php echo $fila['ID_Reservacion']; ?>"
   class="btn btn-primary btn-sm">
   Ver
</a>

<a href="cancelar.php?id=<?php echo $fila['ID_Reservacion']; ?>"
   class="btn btn-danger btn-sm">
   Cancelar
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>