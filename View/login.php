<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styleLogin.css">
</head>

<body>
    <main>
        <section>
        <a href="../View/index.php">HOME</a>
            <h1>Fazer Login</h1><?php
            // Exibe a mensagem de erro, se existir

                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<p style="color:red;">Por favor, preencha todos os campos corretamente!</p>';
                    }
                    elseif(isset($_GET['error']) && $_GET['error'] == 2) {
                        echo '<p style="color:red;">Erro: ao cadastra, solicite suporte</p>';
                    }
                    elseif(isset($_GET['error']) && $_GET['error'] == 3){
                        echo '<p style="color:red;">login e senha incorretos!</p>';
                    }
                    ?>
            <form action="../Controller/usuarioController.php" method="post">

                <input type="text" name="loginUsu" placeholder="Login/Usuario">
                <br><br>

                <input type="password" name="senhaUSu" placeholder="Senha">
                <br><br>

                <input id="button" type="submit" value="Entrar" name="login">
            </form>
            <a href="../View/recuperarsenha.php">Esquici minha senha</a>
        </section>
    </main>

</body>

</html>