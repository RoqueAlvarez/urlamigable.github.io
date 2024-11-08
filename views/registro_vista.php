<?php
if (isset($_SESSION['usuario'])) {
    header("location:inicio");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS . "bootstrap.min.css"; ?>">
    <link rel="stylesheet" href="<?= CSS . "main.css"; ?>">
    <title>Registro</title>
</head>
<body class="vh-100 d-flex justify-content-center align-items-center">
    <form action="./registro_vista.php" method="post" class="w-25 p-4">
        <div class="row">
            <div class="col">
                <h2 class="text-white">Registro</h2>
                <div class="form-group mt-3">
                    <label class="text-white">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" required>
                </div>
                <div class="form-group mt-3">
                    <label class="text-white">Apellido</label>
                    <input type="text" name="apellido" class="form-control" placeholder="Ingrese su apellido" required>
                </div>
                <div class="form-group mt-3">
                    <label class="text-white">Correo electrónico</label>
                    <input type="email" name="correo" class="form-control" placeholder="Ingrese su correo" required>
                </div>
                <div class="form-group mt-3">
                    <label class="text-white">Contraseña</label>
                    <input type="password" name="contrasena" class="form-control" placeholder="Ingrese su contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4">Registrarse</button>
                <p class="text-white mt-3"><a href="./login.php" class="text-info">Iniciar sesión</a></p>
            </div>
        </div>
    </form>
</body>
</html>