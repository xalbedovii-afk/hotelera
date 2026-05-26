<?php

include("../config/conexion.php");

$sql = "SELECT

m.ID_Minibar,
h.Nombre_H

FROM minibar m

INNER JOIN habitacion h
ON m.FK_Habitacion =
   h.ID_Habitacion";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Minibar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Minibar</h1>

<table class="table table-bordered">

<tr>

<th>Habitación</th>
<th>Acción</th>

</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['Nombre_H']; ?></td>

<td>

<a href="agregar_consumo.php?id=<?php echo $fila['ID_Minibar']; ?>"
   class="btn btn-primary">
   Registrar Consumo
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>