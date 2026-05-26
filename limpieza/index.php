<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location:
    ../login/index.php");

}

if(

$_SESSION['rol'] != 'Administrador'

&&

$_SESSION['rol'] != 'Limpieza'

){

    echo "Acceso denegado";
    exit();

}

include("../config/conexion.php");

$sql = "SELECT

h.ID_Habitacion,
h.Nombre_H,
eh.Estado_H

FROM habitacion h

INNER JOIN estado_habitacion eh
ON h.FK_Estado_Habitacion =
   eh.ID_Estado_Habitacion";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Limpieza</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Área Limpieza</h1>

<table class="table table-bordered">

<tr>

<th>Habitación</th>
<th>Estado</th>
<th>Acción</th>

</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['Nombre_H']; ?></td>

<td><?php echo $fila['Estado_H']; ?></td>

<td>

<?php

if($fila['Estado_H'] == 'Sucia'){

?>

<a href="limpiar.php?id=<?php
echo $fila['ID_Habitacion'];
?>"

class="btn btn-success">

Marcar Limpia

</a>

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>