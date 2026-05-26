<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM cliente
WHERE ID_Cliente = '$id'";

$resultado = mysqli_query($conn, $sql);

$cliente = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>

<head>

<title>Editar Cliente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Editar Cliente</h1>

<form action="actualizar.php" method="POST">

<input type="hidden"
       name="id"
       value="<?php echo $cliente['ID_Cliente']; ?>">

<div class="row">

<div class="col-md-4 mb-3">

<label>Nombre</label>

<input type="text"
       name="nombre"
       class="form-control"
       value="<?php echo $cliente['Nombre']; ?>">

</div>

<div class="col-md-4 mb-3">

<label>Apellido Paterno</label>

<input type="text"
       name="apellido_p"
       class="form-control"
       value="<?php echo $cliente['Apellido_P']; ?>">

</div>

<div class="col-md-4 mb-3">

<label>Apellido Materno</label>

<input type="text"
       name="apellido_m"
       class="form-control"
       value="<?php echo $cliente['Apellido_M']; ?>">

</div>

</div>

<div class="row">

<div class="col-md-4 mb-3">

<label>Fecha Nacimiento</label>

<input type="date"
       name="fecha"
       class="form-control"
       value="<?php echo $cliente['F_Nacimiento']; ?>">

</div>

<div class="col-md-4 mb-3">

<label>Teléfono</label>

<input type="text"
       name="telefono"
       class="form-control"
       value="<?php echo $cliente['No_Tel']; ?>">

</div>

<div class="col-md-4 mb-3">

<label>Correo</label>

<input type="email"
       name="correo"
       class="form-control"
       value="<?php echo $cliente['Correo_E']; ?>">

</div>

</div>

<div class="mb-3">

<label>Descripción</label>

<textarea name="descripcion"
          class="form-control"><?php echo $cliente['Descripcion']; ?></textarea>

</div>

<button class="btn btn-primary">
Actualizar
</button>

</form>

</div>

</body>
</html>