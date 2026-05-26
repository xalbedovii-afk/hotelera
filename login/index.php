<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">

                <div class="card-header text-center">
                    <h3>Hotel System</h3>
                </div>

                <div class="card-body">

                    <form action="validar.php" method="POST">

                        <div class="mb-3">
                            <label>Usuario</label>
                            <input type="text" 
                                   name="usuario" 
                                   class="form-control" 
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Contraseña</label>
                            <input type="password" 
                                   name="contraseña" 
                                   class="form-control" 
                                   required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Iniciar Sesión
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>