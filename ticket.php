<?php
$ticketResult = ''; // Inicializamos la variable que mostrará el resultado del ticket

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["generarTicket"])) {
    $nombre = isset($_POST["nombre"]) ? htmlspecialchars($_POST["nombre"]) : "";
    $altura = isset($_POST["altura"]) ? intval($_POST["altura"]) : 0;
    $edad = isset($_POST["edad"]) ? intval($_POST["edad"]) : 0;
    $juicio = isset($_POST["juicio"]) ? htmlspecialchars($_POST["juicio"]) : "";

    if ($altura >= 120 && $edad > 16 && $juicio === "si") {
        $numeroTicket = rand(1000, 9999);
        $ticketHTML = "
            <div class=\"ticket\">
                <p><strong>{$nombre}, ticket {$numeroTicket}</strong></p>
            </div>";
        $ticketResult = $ticketHTML;
    } else {
        $ticketResult = '<p>No cumple con los requisitos para obtener un ticket.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Ticket - Parque de Diversiones</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #db2424;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #container {
            background-color: #e7dede;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: auto;
            text-align: left;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        button {
            background-color: #ce9a0d;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
        }

        button:hover {
            background-color: #612904;
        }

        #ticketResult {
            margin-top: 20px;
        }

        .ticket {
            padding: 20px;
            background-color: #7d7985;
            border-radius: 4px;
            display: inline-block;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div id="container">
        <h2>Generador de Ticket - Parque de Diversiones</h2>

        <form id="ticketForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="altura">Altura (en cm):</label>
            <input type="number" id="altura" name="altura" required>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>

            <label for="juicio">¿Acepta no llevarnos a juicio por daños y perjuicios?</label>
            <select id="juicio" name="juicio" required>
                <option value="si">Sí</option>
                <option value="no">No</option>
            </select>

            <button type="submit" name="generarTicket">Generar Ticket</button>
        </form>

        <div id="ticketResult">
            <?php echo $ticketResult; ?>
        </div>
    </div>

    <script>
        // Tu código JavaScript existente aquí
    </script>

</body>

</html>


