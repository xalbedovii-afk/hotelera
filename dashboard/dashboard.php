<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: ../login/index.php");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

    <div class="container-fluid">

        <span class="navbar-brand">
            Sistema Hotelero
        </span>

        <div>

            <span class="text-white me-3">

                Usuario:
                <?php echo $_SESSION['usuario']; ?>

                |

                Rol:
                <?php echo $_SESSION['rol']; ?>

            </span>

            <a href="../login/logout.php"
               class="btn btn-danger">
                Cerrar Sesión
            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <h1>
        Bienvenido
        <?php echo $_SESSION['usuario']; ?>
    </h1>

    <hr>

    <div class="row g-4">

<!-- HABITACIONES -->

<?php

if(

$_SESSION['rol'] == 'Administrador'

||

$_SESSION['rol'] == 'Limpieza'

||

$_SESSION['rol'] == 'Recepcionista'

){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Habitaciones</h5>

            <a href="../habitaciones/index.php"
               class="btn btn-primary">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- RESERVACIONES -->

<?php

if(

$_SESSION['rol'] == 'Administrador'

||

$_SESSION['rol'] == 'Recepcionista'

){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Reservaciones</h5>

            <a href="../reservaciones/index.php"
               class="btn btn-success">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- CLIENTES -->

<?php

if(

$_SESSION['rol'] == 'Administrador'

||

$_SESSION['rol'] == 'Recepcionista'

){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Clientes</h5>

            <a href="../clientes/index.php"
               class="btn btn-info">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- CHECK-IN -->

<?php

if(

$_SESSION['rol'] == 'Administrador'

||

$_SESSION['rol'] == 'Recepcionista'

){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Check-In</h5>

            <a href="../checkin/index.php"
               class="btn btn-success">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- CHECK-OUT -->

<?php

if(

$_SESSION['rol'] == 'Administrador'

||

$_SESSION['rol'] == 'Recepcionista'

){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Check-Out</h5>

            <a href="../checkout/index.php"
               class="btn btn-danger">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- FACTURACION -->

<?php

if(

$_SESSION['rol'] == 'Administrador'

||

$_SESSION['rol'] == 'Caja'

){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Facturación</h5>

            <a href="../facturacion/index.php"
               class="btn btn-primary">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- INVENTARIO -->

<?php

if($_SESSION['rol'] == 'Administrador'){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Inventario</h5>

            <a href="../inventario/index.php"
               class="btn btn-dark">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- DASHBOARD ADMIN -->

<?php

if($_SESSION['rol'] == 'Administrador'){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Dashboard Pro</h5>

            <a href="../dashboard_admin/index.php"
               class="btn btn-dark">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- REPORTES -->

<?php

if(

$_SESSION['rol'] == 'Administrador'

||

$_SESSION['rol'] == 'Caja'

){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Reportes</h5>

            <a href="../reportes/reservaciones.php"
               class="btn btn-secondary mb-2">

               Reservaciones

            </a>

            <br>

            <a href="../reportes/facturas.php"
               class="btn btn-secondary mb-2">

               Facturas

            </a>

            <br>

            <a href="../reportes/pagos.php"
               class="btn btn-secondary mb-2">

               Pagos

            </a>

            <br>

            <a href="../reportes/inventario.php"
               class="btn btn-secondary">

               Inventario

            </a>

        </div>

    </div>

</div>

<?php } ?>

<!-- LIMPIEZA -->

<?php

if(

$_SESSION['rol'] == 'Administrador'

||

$_SESSION['rol'] == 'Limpieza'

){

?>

<div class="col-md-3">

    <div class="card shadow">

        <div class="card-body text-center">

            <h5>Limpieza</h5>

            <a href="../limpieza/index.php"
               class="btn btn-warning">

               Entrar

            </a>

        </div>

    </div>

</div>

<?php } ?>

    </div>

</div>

</body>
</html>