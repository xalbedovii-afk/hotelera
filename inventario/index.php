session_start();

if(!isset($_SESSION['usuario'])){

    header("Location:
    ../login/index.php");

}

if($_SESSION['rol'] !=
   'Administrador'){

    echo "

    <h1>
    Acceso denegado
    </h1>

    ";

    exit();

} 
<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../login/index.php");
}

include("../config/conexion.php");

$sql = "SELECT * FROM productos";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Inventario</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Inventario</h1>

<a href="agregar.php"
   class="btn btn-success mb-3">
   Nuevo Producto
</a>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Producto</th>
<th>Stock</th>
<th>Mínimo</th>
<th>Precio</th>
<th>Estado</th>
<th>Acciones</th>

</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?php echo $fila['ID_producto']; ?></td>

<td><?php echo $fila['Nombre_Producto']; ?></td>

<td><?php echo $fila['Stock_Max']; ?></td>

<td><?php echo $fila['Stock_Min']; ?></td>

<td>$<?php echo $fila['Precio']; ?></td>

<td>

<?php

if($fila['Stock_Max'] <= $fila['Stock_Min']){

    echo "<span class='badge bg-danger'>
          Stock Bajo
          </span>";

}else{

    echo "<span class='badge bg-success'>
          Disponible
          </span>";

}

?>

</td>

<td>

<a href="editar.php?id=<?php echo $fila['ID_producto']; ?>"
   class="btn btn-warning btn-sm">
   Editar
</a>

<a href="eliminar.php?id=<?php echo $fila['ID_producto']; ?>"
   class="btn btn-danger btn-sm">
   Eliminar
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>