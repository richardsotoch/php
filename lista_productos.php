<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_autenticado'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelería Online - Lista de Productos</title>
    <!-- Agrega aquí tus estilos CSS -->
</head>

<body>

    <div class="container">
        <h2>Lista de Productos</h2>

        <?php
        if (isset($_SESSION['productos']) && !empty($_SESSION['productos'])) {
            echo '<ul>';
            foreach ($_SESSION['productos'] as $producto) {
                echo '<li>';
                echo 'Número de Serie: ' . $producto['numeroSerie'] . '<br>';
                echo 'Nombre del Producto: ' . $producto['nombreProducto'] . '<br>';
                echo 'Precio: ' . $producto['precio'] . '<br>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No hay productos disponibles.</p>';
        }
        ?>

        <a href="subir_producto.php">Volver a Subir Producto</a>

    </div>

</body>

</html>
