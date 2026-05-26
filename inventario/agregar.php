<!DOCTYPE html>
<html>

<head>

<title>Nuevo Producto</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Nuevo Producto</h1>

<form action="guardar.php"
      method="POST">

<div class="mb-3">

<label>Producto</label>

<input type="text"
       name="nombre"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Stock</label>

<input type="number"
       name="stock"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Stock Mínimo</label>

<input type="number"
       name="minimo"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Precio</label>

<input type="number"
       step="0.01"
       name="precio"
       class="form-control"
       required>

</div>

<button class="btn btn-primary">
Guardar
</button>

</form>

</div>

</body>
</html>