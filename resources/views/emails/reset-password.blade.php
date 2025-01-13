<!DOCTYPE html>
<html>

<head>
    <title>Restablecimiento de contraseña</title>
</head>

<body>
    <h1>Hola, {{ $user->name }}</h1>
    <p>Se ha generado una nueva contraseña para tu cuenta:</p>
    <p><strong>Contraseña:</strong> {{ $password }}</p>
    <p>Te recomendamos iniciar sesión con esta contraseña y cambiarla de inmediato.</p>
    <p>Gracias,</p>
    <p>El equipo de soporte.</p>
</body>

</html>
