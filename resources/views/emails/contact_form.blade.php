<!DOCTYPE html>
<html>
<head>
    <title>Nuevo mensaje de contacto</title>
</head>
<body>
    <h1>Nuevo mensaje de contacto</h1>
    <p><strong>Nombre:</strong> {{ $full_name }}</p>
    <p><strong>Correo electrónico:</strong> {{ $email }}</p>
    <p><strong>Asunto:</strong> {{ $subject }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $user_message }}</p>
</body>
</html>
