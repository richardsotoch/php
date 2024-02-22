<?php
$mensajeResultado = ''; // Inicializamos la variable que mostrará el resultado del mensaje

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["mostrarMensaje"])) {
    // Obtenemos los datos del formulario
    $nombre = isset($_POST["nombre"]) ? htmlspecialchars($_POST["nombre"]) : "";
    $sexo = isset($_POST["sexo"]) ? htmlspecialchars($_POST["sexo"]) : "";
    $numHijos = isset($_POST["numHijos"]) ? intval($_POST["numHijos"]) : 0;

    // Creamos el mensaje de resultado
    if ($sexo === 'hombre') {
        $mensaje = "El señor {$nombre} ";
    } elseif ($sexo === 'mujer') {
        $mensaje = "La señora {$nombre} ";
    }

    if ($numHijos === 0) {
        $mensaje .= "no tiene hijos.";
    } else {
        $mensaje .= "tiene {$numHijos} " . ($numHijos === 1 ? 'hijo' : 'hijos') . ".";
    }

    // Asignamos el mensaje al resultado
    $mensajeResultado = "<p>{$mensaje}</p>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos Personales</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #4d3434;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
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
            background-color: #5a705b;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #465a47;
        }

        #mensajeResultado {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Formulario de Datos Personales</h2>

        <form id="datosForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
            </select>

            <label for="numHijos">Número de Hijos:</label>
            <input type="number" id="numHijos" name="numHijos" required>

            <button type="submit" name="mostrarMensaje">Mostrar Mensaje</button>
        </form>

        <div id="mensajeResultado">
            <?php echo $mensajeResultado; ?>
        </div>
    </div>

    <script>
        // Tu código JavaScript existente aquí
    </script>

</body>

</html>

