<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje correo electronico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            padding: 20px;
        }
        .email-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
        }
        .email-body p {
            font-size: 16px;
            color: #333333;
            line-height: 1.5;
        }
        .email-body p strong {
            color: #007bff;
        }
        .email-footer {
            text-align: center;
            font-size: 14px;
            color: #888888;
            padding: 10px 0;
        }
        .email-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .email-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Cabecera del correo -->
        <div class="email-header">
            <h1>Nuevo Mensaje de Contacto</h1>
        </div>

        <!-- Cuerpo del correo -->
        <div class="email-body">
            <p><strong>Nombre:</strong> {{ $name }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $email }}</p>
            <p><strong>Mensaje:</strong></p>
            <p>{{ $messageContent }}</p>
        </div>

        <!-- Pie de página -->
        <div class="email-footer">
            <p>Responder el mensaje lo antes posible.</p>
            <p><a href="https://www.miempresa.com">Visita nuestro sitio web</a></p>
        </div>
    </div>

</body>
</html>