<?php

include("../config/conexion.php");

$id = $_GET['id'];

$factura = mysqli_query($conn,
"SELECT * FROM facturas
WHERE ID_Factura = '$id'");

$f = mysqli_fetch_assoc($factura);

$metodos = mysqli_query($conn,
"SELECT * FROM metodos_de_pago");

?>

<!DOCTYPE html>
<html>

<head>

<title>Pagar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Registrar Pago</h1>

<form action="guardar.php"
      method="POST">

<input type="hidden"
       name="factura"
       value="<?php echo $id; ?>">

<div class="mb-3">

<label>Total a pagar</label>

<input type="text"
       class="form-control"
       value="<?php echo $f['Valor_Total']; ?>"
       readonly>

</div>

<div class="mb-3">

<label>Monto</label>

<input type="number"
       step="0.01"
       name="monto"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Método Pago</label>

<select name="metodo"
        class="form-control">

<?php while($m = mysqli_fetch_assoc($metodos)){ ?>

<option value="<?php echo $m['ID_Metodo_P']; ?>">

<?php echo $m['Tipo_Metodo']; ?>

</option>

<?php } ?>

</select>

</div>

<button class="btn btn-primary">
Guardar Pago
</button>

</form>

</div>

</body>
</html>