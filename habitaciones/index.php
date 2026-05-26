<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../login/index.php");
}

include("../config/conexion.php");

$sql = "SELECT h.ID_Habitacion,
               h.Nombre_H,
               th.Tipo_Habitacion,
               eh.Estado_H

        FROM habitacion h

        INNER JOIN tipo_habitacion th
        ON h.FK_Tipo_Habitacion = th.ID_T_Habitacion

        INNER JOIN estado_habitacion eh
        ON h.FK_Estado_Habitacion =
           eh.ID_Estado_Habitacion";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Habitaciones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1>Habitaciones</h1>

    <a href="agregar.php"
       class="btn btn-success mb-3">
       Nueva Habitación
    </a>

    <a href="../dashboard/dashboard.php"
       class="btn btn-secondary mb-3">
       Regresar
    </a>

    <table class="table table-bordered">

        <tr>

            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>

        <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

        <tr>

            <td><?php echo $fila['ID_Habitacion']; ?></td>

            <td><?php echo $fila['Nombre_H']; ?></td>

            <td><?php echo $fila['Tipo_Habitacion']; ?></td>

            <td><?php echo $fila['Estado_H']; ?></td>

            <td>

                <a href="editar.php?id=<?php echo $fila['ID_Habitacion']; ?>"
                   class="btn btn-warning btn-sm">
                   Editar
                </a>

                <a href="eliminar.php?id=<?php echo $fila['ID_Habitacion']; ?>"
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