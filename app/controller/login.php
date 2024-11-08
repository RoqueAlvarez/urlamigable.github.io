<?php session_start();
if (isset($_SESSION['usuario'])) {    header("location: ./index.php");    exit();
}
if ($_POST) {    if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
        $correo = $_POST['correo'];        
        $contrasena = $_POST['contrasena'];
        if (empty($_SESSION['registro'])) {
            echo "<script>alert('Correo o contraseña incorrectos');</script>";
        } elseif ($correo === $_SESSION['registro']['correo'] && $contrasena === $_SESSION['registro']['contrasena']) {
            $_SESSION['usuario'] = $_SESSION['registro'];
            header("location: ./index.php");
            exit();
        } else {
            echo "<script>alert('Verifica tus datos');</script>";
        }
    } else {
        echo "<script>alert('No dejes ningún recuadro vacío.');</script>";
    }
}
?>