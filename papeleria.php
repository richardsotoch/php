<?php
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contrasena1 = $_POST['contrasena1'];
    $contrasena2 = $_POST['contrasena2'];

    // Verificar si las contraseñas coinciden
    if ($contrasena1 !== $contrasena2) {
        $mensaje = 'Las contraseñas no coinciden. Por favor, inténtalo de nuevo.';
    } else {
        // Almacenar las credenciales en variables de sesión 
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['nombre_usuario'] = $nombre;

        // Redirigir a la página de subir producto
        header("Location: subir_producto.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelería Online - Identificación</title>
    <!-- Agrega aquí tus estilos CSS -->
</head>

<body>

    <div class="container">
        <h2>Identificación</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="contrasena1">Contraseña:</label>
            <input type="password" id="contrasena1" name="contrasena1" required>

            <label for="contrasena2">Confirmar Contraseña:</label>
            <input type="password" id="contrasena2" name="contrasena2" required>

            <button type="submit">Ingresar</button>
        </form>

        <?php
        if (isset($mensaje)) {
            echo '<p>' . $mensaje . '</p>';
        }
        ?>
    </div>

</body>

</html>

