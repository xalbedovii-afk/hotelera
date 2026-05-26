<?php

include("../config/conexion.php");

$clientes = mysqli_query($conn,
"SELECT * FROM cliente");

?>

<!DOCTYPE html>
<html>

<head>

<title>Nueva Reservación</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Nueva Reservación</h1>

<form action="buscar_habitaciones.php"
      method="POST">

<div class="mb-3">

<label>Cliente</label>

<select name="cliente"
        class="form-control"
        required>

<?php while($cliente = mysqli_fetch_assoc($clientes)){ ?>

<option value="<?php echo $cliente['ID_Cliente']; ?>">

<?php
echo $cliente['Nombre']." ".
     $cliente['Apellido_P'];
?>

</option>

<?php } ?>

</select>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Fecha Entrada</label>

<input type="date"
       name="entrada"
       class="form-control"
       required>

</div>

<div class="col-md-6 mb-3">

<label>Fecha Salida</label>

<input type="date"
       name="salida"
       class="form-control"
       required>

</div>

</div>

<button class="btn btn-primary">
Buscar Habitaciones
</button>

</form>

</div>

</body>
</html>