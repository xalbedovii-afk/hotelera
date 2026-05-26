<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM productos
WHERE ID_producto = '$id'";

$resultado = mysqli_query($conn, $sql);

$producto = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>

<head>

<title>Editar Producto</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Editar Producto</h1>

<form action="actualizar.php"
      method="POST">

<input type="hidden"
       name="id"
       value="<?php echo $producto['ID_producto']; ?>">

<div class="mb-3">

<label>Producto</label>

<input type="text"
       name="nombre"
       class="form-control"
       value="<?php echo $producto['Nombre_Producto']; ?>">

</div>

<div class="mb-3">

<label>Stock</label>

<input type="number"
       name="stock"
       class="form-control"
       value="<?php echo $producto['Stock_Max']; ?>">

</div>

<div class="mb-3">

<label>Stock Mínimo</label>

<input type="number"
       name="minimo"
       class="form-control"
       value="<?php echo $producto['Stock_Min']; ?>">

</div>

<div class="mb-3">

<label>Precio</label>

<input type="number"
       step="0.01"
       name="precio"
       class="form-control"
       value="<?php echo $producto['Precio']; ?>">

</div>

<button class="btn btn-primary">
Actualizar
</button>

</form>

</div>

</body>
</html>