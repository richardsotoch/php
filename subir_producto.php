<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_autenticado'])) {
    header("Location: login.php");
    exit();
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroSerie = $_POST['numeroSerie'];
    $nombreProducto = $_POST['nombreProducto'];
    $precio = $_POST['precio'];

    // Almacenar el producto en una variable de sesión 
    $producto = [
        'numeroSerie' => $numeroSerie,
        'nombreProducto' => $nombreProducto,
        'precio' => $precio
    ];

    // Almacenar el producto en un array de productos 
    if (!isset($_SESSION['productos'])) {
        $_SESSION['productos'] = [];
    }
    $_SESSION['productos'][] = $producto;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelería Online - Subir Producto</title>
    <style>
        /* Estilos Generales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }

        h2 {
            color: #333;
        }

        /* Estilos Formulario */
        form {
            max-width: 300px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .enlace {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .enlace:hover {
            color: #4CAF50;
        }

        /* Otros Estilos */
        a {
            text-decoration: none;
            color: #4CAF50;
        }

        a:hover {
            color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Subir Producto</h2>

        <form id="productoForm" method="post" action="subir_producto.php">
            <label for="numeroSerie">Número de Serie:</label>
            <input type="text" id="numeroSerie" name="numeroSerie" required>

            <label for="nombreProducto">Nombre del Producto:</label>
            <input type="text" id="nombreProducto" name="nombreProducto" required>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required>

            <button type="submit">Subir Producto</button>
        </form>

        <a href="lista_productos.php" class="enlace">Ver Lista de Productos</a>

    </div>

</body>

</html>


