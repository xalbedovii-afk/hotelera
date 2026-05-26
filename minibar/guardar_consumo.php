<?php

include("../config/conexion.php");

$minibar = $_POST['minibar'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO productos_minibar
(
FK_Minibar,
FK_Producto,
Cantidad
)

VALUES
(
'$minibar',
'$producto',
'$cantidad'
)";

mysqli_query($conn, $sql);

$sql_stock = "UPDATE productos

SET Stock_Max = Stock_Max - '$cantidad'

WHERE ID_producto = '$producto'";

mysqli_query($conn, $sql_stock);

echo "

<script>

alert('Consumo registrado');

window.location='index.php';

</script>

";

?>