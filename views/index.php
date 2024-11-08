<?php
if (!isset($_SESSION['usuario'])) {
    header("location:login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS . "bootstrap.min.css"; ?>">
    <link rel="stylesheet" href="<?=CSS."table.css";?>">
    <link rel="stylesheet" href="<?= CSS . "inicio.css"; ?>">
    
    <!-- Agregar los enlaces de DataTables (CSS y JS desde CDN) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <title>Inventario</title>
    <script>
        // Toggle para el formulario de edición de producto
        function toggleEdit(index) {
            var form = document.getElementById('edit-form-' + index);
            var btn = document.getElementById('edit-btn-' + index);
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                btn.innerText = 'Cancelar';
            } else {
                form.style.display = 'none';
                btn.innerText = 'Actualizar';
            }
        }

        // Inicializar DataTable cuando la página esté lista
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</head>
<body class="vh-100 d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center">
        <h1 class="text-white mb-5">Bienvenido</h1>
        <h2 class="text-white mb-5">Tienda 2</h2>
        
        <div class="row w-100">
            <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
                <form action="./index.php" method="post">
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" name="nombre_producto" required>
                    </div>
                    <div class="input-group mt-3">
                        <input type="number" class="form-control" placeholder="Ingrese el precio del producto" name="precio_producto" required>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm w-100 text-white">Registrar producto</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row w-100 mt-5">
            <div class="col-lg-12 col-md-8 col-sm-12 mx-auto">
                <table id="myTable" class="table table-dark display">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['productos']) && !empty($_SESSION['productos'])) { ?>
                            <?php foreach ($_SESSION['productos'] as $index => $producto) { ?>
                                <tr>
                                    <td><?= $producto['nombre']; ?></td>
                                    <td>$<?= $producto['precio']; ?></td>
                                    <td>
                                        <form action="./index.php" method="post" style="display:inline-block;">
                                            <input type="hidden" name="delete_index" value="<?= $index; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                        </form>
                                        <button id="edit-btn-<?= $index; ?>" class="btn btn-warning btn-sm" onclick="toggleEdit(<?= $index; ?>)">Actualizar</button>
                                        <form id="edit-form-<?= $index; ?>" action="./index.php" method="post" style="display:none; margin-top: 10px;">
                                            <input type="hidden" name="update_index" value="<?= $index; ?>">
                                            <input type="text" name="update_nombre" value="<?= $producto['nombre']; ?>" required class="mb-2">
                                            <input type="number" name="update_precio" value="<?= $producto['precio']; ?>" required class="mb-2">
                                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="3" class="text-center"> <?= "Inventario vacío"; ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <a href="./cerrar_sesion.php" class="btn btn-danger btn-sm">Cerrar sesión</a>
        </div>
    </div>
</body>
</html>
