<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streaming COV</title>
    <link rel="stylesheet" href="./css/master.css">
</head>
<body>

    <div class="login-box">
        <img src="img/logo.png" class="avatar" alt="Avatar Image">

        <h1>Login COV</h1>
        <form method="post" action="control2/control_login.php">
            <!-- USERNAME INPUT -->
            <label for="usuario">Username</label>
            <input type="text" id="usuario" class="input" placeholder="Ingrese Usuario" name="usuarioIn" required>

            <!-- PASSWORD INPUT -->
            <label for="password">Password</label>
            <input type="password" id="password" class="input" placeholder="Ingrese Contraseña" name="passIn" required>

            <input type="submit" value="Log In" name="btnLog" class="btn">
        </form>

       
    </div>

</body>
</html>
