<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../login/index.php");
}

include("../config/conexion.php");

$sql = "SELECT * FROM cliente";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Clientes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Clientes</h1>

<a href="agregar.php"
   class="btn btn-success mb-3">
   Nuevo Cliente
</a>

<a href="../dashboard/dashboard.php"
   class="btn btn-secondary mb-3">
   Regresar
</a>

<table class="table table-bordered table-hover">

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Teléfono</th>
<th>Correo</th>
<th>Acciones</th>

</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['ID_Cliente']; ?></td>

<td>

<?php
echo $fila['Nombre']." ".
     $fila['Apellido_P']." ".
     $fila['Apellido_M'];
?>

</td>

<td><?php echo $fila['No_Tel']; ?></td>

<td><?php echo $fila['Correo_E']; ?></td>

<td>

<a href="editar.php?id=<?php echo $fila['ID_Cliente']; ?>"
   class="btn btn-warning btn-sm">
   Editar
</a>

<a href="eliminar.php?id=<?php echo $fila['ID_Cliente']; ?>"
   class="btn btn-danger btn-sm">
   Eliminar
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>