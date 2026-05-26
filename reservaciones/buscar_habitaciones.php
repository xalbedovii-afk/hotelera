<?php

include("../config/conexion.php");

$cliente = $_POST['cliente'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];

$sql = "SELECT *
FROM habitacion

WHERE ID_Habitacion NOT IN (

SELECT rd.FK_Habitacion

FROM reservacion_detalle rd

INNER JOIN reservacion r
ON rd.FK_Reservacion =
   r.ID_Reservacion

WHERE (

('$entrada' BETWEEN r.Fecha_Entrada
AND r.Fecha_Salida)

OR

('$salida' BETWEEN r.Fecha_Entrada
AND r.Fecha_Salida)

)

AND r.FK_Estado_Reservacion != 3

)";

$habitaciones = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Habitaciones Disponibles</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Habitaciones Disponibles</h1>

<form action="guardar.php"
      method="POST">

<input type="hidden"
       name="cliente"
       value="<?php echo $cliente; ?>">

<input type="hidden"
       name="entrada"
       value="<?php echo $entrada; ?>">

<input type="hidden"
       name="salida"
       value="<?php echo $salida; ?>">

<div class="mb-3">

<label>Habitación</label>

<select name="habitacion"
        class="form-control">

<?php while($habitacion = mysqli_fetch_assoc($habitaciones)){ ?>

<option value="<?php echo $habitacion['ID_Habitacion']; ?>">

<?php echo $habitacion['Nombre_H']; ?>

</option>

<?php } ?>

</select>

</div>

<button class="btn btn-success">
Confirmar Reservación
</button>

</form>

</div>

</body>
</html>