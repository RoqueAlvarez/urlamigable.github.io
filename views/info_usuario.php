<?php
if (isset($_SESSION['usuario'])) {
    header("location:inicio");
    exit();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['metodo']) && $_POST['metodo'] == 'actualizar_informacion') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    
    if (empty($nombre) || empty($apellido) || empty($email) || empty($pass)) {
        $_SESSION['mensaje'] = "Todos los campos son obligatorios.";
        $_SESSION['mensaje_tipo'] = 'error';
    } else {
        
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['apellido'] = $apellido;
        $_SESSION['usuario']['email'] = $email;

        $_SESSION['mensaje'] = "Información actualizada con éxito.";
        $_SESSION['mensaje_tipo'] = 'success';
    }

    header("location: informacion_usuario.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=CSS."informacion_usuario.css";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <title>Información de Usuario</title>
</head>
<body>
    <div class="container">
        <div class="row m-4 c-datos">
            <div class="d-flex justify-content-center align-items-center w-100">
                <h1 class="text-white m-0">
                    Tu información personal
                    <i class="bi bi-clipboard-data-fill"></i>
                </h1>
            </div>
        </div>

        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-<?= $_SESSION['mensaje_tipo'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['mensaje']); unset($_SESSION['mensaje_tipo']); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <div class="m-5 p-3 contenedor_usuario">
                    <div class="text-center">
                        <i class="bi bi-person-circle text-white"></i>
                    </div>
                    <div class="text-center">
                        <p class="text-white nombre_usuario">
                            <?= $_SESSION['usuario']['nombre']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <form action="informacion_usuario.php" method="POST" class="m-5 p-4">
                    <div class="form-floating w-100 mb-3">
                        <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>" required>
                        <label for="nombre">Ingrese su nombre</label>
                    </div>                        

                    <div class="form-floating w-100 mb-3">
                        <input class="form-control" type="text" name="apellido" id="apellido" value="<?= $_SESSION['usuario']['apellido']; ?>" required>
                        <label for="apellido">Ingrese su apellido</label>
                    </div> 

                    <div class="form-floating w-100 mb-3">
                        <input class="form-control" type="email" name="email" id="email" value="<?= $_SESSION['usuario']['email']; ?>" required>
                        <label for="email">Ingrese su email</label>
                    </div> 

                    <div class="form-floating w-100 mb-4">
                        <input class="form-control" type="password" name="pass" id="pass" required>
                        <label for="pass">Ingrese su contraseña</label>
                    </div> 

                    <div class="d-flex justify-content-evenly">
                        <button type="submit" class="btn fs-4">Guardar</button>
                        <a href="inicio.php" class="btn btn-outline-primary fs-4 text-white">Regresar</a>
                    </div>
                    <input type="hidden" name="metodo" value="actualizar_informacion">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
