<?php

include("../config/conexion.php");

$factura = $_POST['factura'];
$monto = $_POST['monto'];
$metodo = $_POST['metodo'];

$sql = "INSERT INTO pagos
(
FK_Factura,
FK_Metodo_Pago,
Monto_abonado,
Fecha_Pago
)

VALUES
(
'$factura',
'$metodo',
'$monto',
NOW()
)";

mysqli_query($conn, $sql);

$sql_update = "UPDATE facturas

SET FK_Estado_Factura = 2

WHERE ID_Factura = '$factura'";

mysqli_query($conn, $sql_update);

echo "

<script>

alert('Pago registrado');

window.location =
'../facturacion/index.php';

</script>

";

?>