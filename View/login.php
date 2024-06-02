<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="autenticar.php" method="post">
        <input type="text" name="loginUsu">
        <input type="text" name="senhaUSu">
        <input type="submit" value="Entrar">
    </form>
    <?php
    if (isset($_GET['erro'])) {
        echo "<p style='color:red;'>Nome de usuário ou senha incorretos.</p>";
    }
    ?>
</body>
</html>