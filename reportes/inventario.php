<?php

include("../config/conexion.php");

$sql = "SELECT *

FROM productos

WHERE Stock_Max <= Stock_Min";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Inventario Bajo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Inventario Bajo</h1>

<table class="table table-bordered">

<tr>

<th>Producto</th>
<th>Stock</th>
<th>Mínimo</th>

</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['Nombre_Producto']; ?></td>

<td><?php echo $fila['Stock_Max']; ?></td>

<td><?php echo $fila['Stock_Min']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>