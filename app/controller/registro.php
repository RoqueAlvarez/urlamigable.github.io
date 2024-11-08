<?php session_start();
$expresion = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
if (isset($_SESSION['usuario'])) header("location: ./index.php");
if ($_POST) {
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['contrasena'])) {
        if (is_numeric($_POST['nombre'])) {
            echo "<script>alert('El nombre no puede contener números');</script>";
        } elseif (is_numeric($_POST['apellido'])) {
            echo "<script>alert('El apellido no puede contener números');</script>";
        } else {
            echo "<script>alert('Correo " . (preg_match($expresion, $_POST['correo']) ? "válido" : "no válido") . "');</script>";
        }
        $_SESSION['registro'] = [
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "correo" => $_POST['correo'],
            "contrasena" => $_POST['contrasena']
        ];
        header('location:./login.php');
    } else {
        echo "<script>alert('No dejes cuadros vacíos');</script>";
    }
}
?>