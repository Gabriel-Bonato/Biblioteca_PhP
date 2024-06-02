<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styleLogin.css">
</head>

<body>
    <main>
        <section>
            <h1>Fazer Login</h1>
            <form action="autenticar.php" method="post">

                <input type="text" name="loginUsu" placeholder="Login/Usuario">
                <br><br>

                <input type="password" name="senhaUSu" placeholder="Senha">
                <br><br>

                <input id="button" type="submit" value="Entrar">
            </form>
        </section>
    </main>
    <?php
    if (isset($_GET['erro'])) {
        echo "<p style='color:red;'>Nome de usuário ou senha incorretos.</p>";
    }
    ?>
</body>

</html>