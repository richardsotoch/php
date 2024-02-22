<?php
$precioTotal = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["calcularPrecio"])) {
    $numEmails = isset($_POST["numEmails"]) ? intval($_POST["numEmails"]) : 0;
    $seguro = isset($_POST["seguro"]) ? floatval($_POST["seguro"]) : 0;

    if (is_nan($numEmails) || $numEmails < 0) {
        echo "<script>alert('Por favor, ingresa un número válido de emails.');</script>";
    } else {
        $precioUnitario = calcularPrecioUnitario($numEmails);
        $precioTotal = calcularPrecioTotal($precioUnitario, $seguro, $numEmails);
    }
}

function calcularPrecioUnitario($numEmails) {
    if ($numEmails >= 0 && $numEmails <= 2000) {
        return 0;
    } elseif ($numEmails <= 10000) {
        return 0.7;
    } else {
        return 0.2;
    }
}

function calcularPrecioTotal($precioUnitario, $seguro, $numEmails) {
    return "Precio Total: S/ " . number_format(($precioUnitario + $seguro) * $numEmails, 2);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Precio de Newsletter</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #40533e;
            text-align: center;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input {
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
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Calculadora de Precio de Newsletter</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="numEmails">Número de Emails a Enviar:</label>
            <input type="number" id="numEmails" name="numEmails" required>

            <label for="seguro">¿Quieres un seguro por cada mensaje?</label>
            <select id="seguro" name="seguro">
                <option value="0">No</option>
                <option value="0.1">Sí (S/ 0.1 por mensaje)</option>
            </select>

            <button type="submit" name="calcularPrecio">Calcular Precio</button>
        </form>

        <p id="precioTotal"><?php echo $precioTotal; ?></p>
    </div>

    <script>
      
    </script>

</body>

</html>



