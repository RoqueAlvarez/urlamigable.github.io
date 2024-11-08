<?php
require_once '../config/conexion.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if ($_POST) {
    if (!empty($_POST['nombre_producto']) && !empty($_POST['precio_producto'])) {
        $nombreProducto = $_POST['nombre_producto'];
        $precioProducto = $_POST['precio_producto'];
        
        if (!isset($_SESSION['productos'])) $_SESSION['productos'] = [];
        $_SESSION['productos'][] = ['nombre' => $nombreProducto, 'precio' => $precioProducto];

    } elseif (isset($_POST['delete_index'])) {
        $index = $_POST['delete_index'];
        if (isset($_SESSION['productos'][$index])) {
            unset($_SESSION['productos'][$index]);
            $_SESSION['productos'] = array_values($_SESSION['productos']);
        }

    } elseif (isset($_POST['update_index'], $_POST['update_nombre'], $_POST['update_precio'])) {
        $index = $_POST['update_index'];
        $nuevoNombre = $_POST['update_nombre'];
        $nuevoPrecio = $_POST['update_precio'];
        if (isset($_SESSION['productos'][$index])) {
            $_SESSION['productos'][$index] = ['nombre' => $nuevoNombre, 'precio' => $nuevoPrecio];
        }
    } else {
        echo "<script>alert('Por favor ingresa datos en cada cuadro');</script>";
    }
}
?>