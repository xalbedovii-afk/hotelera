<?php

session_start();

include("../config/conexion.php");

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$sql = "SELECT
u.*,
r.Nombre_Rol
FROM usuario u

INNER JOIN permiso_roles pr
ON u.FK_permiso_rol = pr.ID_Permiso_Rol

INNER JOIN rol r
ON pr.FK_Rol = r.ID_Rol

WHERE u.Usuario = '$usuario'";

$resultado = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($resultado);

if (
    $user &&
    password_verify($contraseña, $user['Contraseña'])
) {

    $_SESSION['usuario'] = $user['Usuario'];
    $_SESSION['rol'] = $user['Nombre_Rol'];

    header("Location: ../dashboard/dashboard.php");

} else {

    echo "
    <script>
    alert('Datos incorrectos');
    window.location='index.php';
    </script>
    ";

}

?>