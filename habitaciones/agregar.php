<?php

include("../config/conexion.php");

$tipos = mysqli_query($conn,
"SELECT * FROM tipo_habitacion");

$estados = mysqli_query($conn,
"SELECT * FROM estado_habitacion");

?>

<!DOCTYPE html>
<html>

<head>

<title>Agregar Habitación</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Nueva Habitación</h1>

<form action="guardar.php" method="POST">

<div class="mb-3">

<label>Nombre</label>

<input type="text"
       name="nombre"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Tipo</label>

<select name="tipo"
        class="form-control">

<?php while($tipo = mysqli_fetch_assoc($tipos)){ ?>

<option value="<?php echo $tipo['ID_T_Habitacion']; ?>">

<?php echo $tipo['Tipo_Habitacion']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Estado</label>

<select name="estado"
        class="form-control">

<?php while($estado = mysqli_fetch_assoc($estados)){ ?>

<option value="<?php echo $estado['ID_Estado_Habitacion']; ?>">

<?php echo $estado['Estado_H']; ?>

</option>

<?php } ?>

</select>

</div>

<button class="btn btn-primary">
Guardar
</button>

</form>

</div>

</body>
</html>