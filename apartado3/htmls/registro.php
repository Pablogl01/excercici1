<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../register.php" method="post">
        <p>Nombre: <?php echo $_COOKIE['userR'] ?></p>
        <p>Contraseña: <input type="password" name="pass"></p>
        <p>Repetir Contraseña: <input type="password" name="pass2"></p>
        <p>
          <input type="submit" value="Enviar">
        </p>
</body>
</html>