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
    <title>Iniciar Sesión</title>
</head>
<body class="vh-100 d-flex justify-content-center align-items-center">
    <form action="./login.php" method="post" class="w-25 p-4">
        <div class="row">
            <div class="col">
                <h2 class="text-white">Iniciar Sesión</h2>
                <div class="form-group mt-4">
                    <label class="text-white">Correo electrónico</label>
                    <input type="email" name="correo" class="form-control" placeholder="Ingresar correo" required>
                </div>
                <div class="form-group mt-4">
                    <label class="text-white">Contraseña</label>
                    <input type="password" name="contrasena" class="form-control" placeholder="Ingresar contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4">Iniciar sesión</button>
                <p class="text-white mt-3"><a href="./registro_vista.php" class="text-info">Registrate</a></p>
            </div>
        </div>
    </form>
</body>
</html>