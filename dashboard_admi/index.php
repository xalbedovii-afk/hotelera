<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../login/index.php");
}

include("../config/conexion.php");

$habitaciones =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM habitacion")
);

$ocupadas =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM habitacion
WHERE FK_Estado_Habitacion = 2")
);

$disponibles =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM habitacion
WHERE FK_Estado_Habitacion = 1")
);

$clientes =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM cliente")
);

$ingresos =
mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(Valor_Total),0)
total
FROM facturas
WHERE FK_Estado_Factura = 2")
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard Administrativo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="container mt-5">

<h1 class="mb-4">
Dashboard Administrativo
</h1>

<div class="row">

<div class="col-md-3">

<div class="card text-bg-primary mb-3">

<div class="card-body">

<h5>Total Habitaciones</h5>

<h2>

<?php
echo $habitaciones['total'];
?>

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-danger mb-3">

<div class="card-body">

<h5>Ocupadas</h5>

<h2>

<?php
echo $ocupadas['total'];
?>

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-success mb-3">

<div class="card-body">

<h5>Disponibles</h5>

<h2>

<?php
echo $disponibles['total'];
?>

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-bg-dark mb-3">

<div class="card-body">

<h5>Clientes</h5>

<h2>

<?php
echo $clientes['total'];
?>

</h2>

</div>

</div>

</div>

</div>

<div class="card mb-4">

<div class="card-body">

<h3>

Ingresos Totales:
$<?php echo $ingresos['total']; ?>

</h3>

</div>

</div>

<div class="card">

<div class="card-body">

<canvas id="grafica"></canvas>

</div>

</div>

</div>

<script>

const ctx =
document.getElementById('grafica');

new Chart(ctx, {

type: 'bar',

data: {

labels: [

'Ocupadas',
'Disponibles'

],

datasets: [{

label:
'Habitaciones',

data: [

<?php echo $ocupadas['total']; ?>,

<?php echo $disponibles['total']; ?>

],

borderWidth: 1

}]

},

options: {

responsive: true

}

});

</script>

</body>
</html>