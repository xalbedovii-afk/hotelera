<?php

include("../config/conexion.php");

$id = $_GET['id'];

$productos = mysqli_query($conn,
"SELECT * FROM productos");

?>

<!DOCTYPE html>
<html>

<head>

<title>Consumo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Registrar Consumo</h1>

<form action="guardar_consumo.php"
      method="POST">

<input type="hidden"
       name="minibar"
       value="<?php echo $id; ?>">

<div class="mb-3">

<label>Producto</label>

<select name="producto"
        class="form-control">

<?php while($p = mysqli_fetch_assoc($productos)){ ?>

<option value="<?php echo $p['ID_producto']; ?>">

<?php echo $p['Nombre_Producto']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Cantidad</label>

<input type="number"
       name="cantidad"
       class="form-control"
       required>

</div>

<button class="btn btn-success">
Guardar
</button>

</form>

</div>

</body>
</html>