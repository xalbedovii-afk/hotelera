<!DOCTYPE html>
<html>

<head>

<title>Agregar Cliente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Nuevo Cliente</h1>

<form action="guardar.php" method="POST">

<div class="row">

<div class="col-md-4 mb-3">

<label>Nombre</label>

<input type="text"
       name="nombre"
       class="form-control"
       required>

</div>

<div class="col-md-4 mb-3">

<label>Apellido Paterno</label>

<input type="text"
       name="apellido_p"
       class="form-control"
       required>

</div>

<div class="col-md-4 mb-3">

<label>Apellido Materno</label>

<input type="text"
       name="apellido_m"
       class="form-control">

</div>

</div>

<div class="row">

<div class="col-md-4 mb-3">

<label>Fecha Nacimiento</label>

<input type="date"
       name="fecha"
       class="form-control">

</div>

<div class="col-md-4 mb-3">

<label>Teléfono</label>

<input type="text"
       name="telefono"
       class="form-control">

</div>

<div class="col-md-4 mb-3">

<label>Correo</label>

<input type="email"
       name="correo"
       class="form-control">

</div>

</div>

<div class="mb-3">

<label>Descripción</label>

<textarea name="descripcion"
          class="form-control"></textarea>

</div>

<button class="btn btn-primary">
Guardar Cliente
</button>

</form>

</div>

</body>
</html>