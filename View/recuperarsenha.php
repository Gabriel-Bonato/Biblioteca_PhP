<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulário de Login</title>
<link rel="stylesheet" href="./styleRecuperarsenha.css">
</head>
<body>
    <main>

        <section>
        <?php
        if(isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p style="color:red;">infore seu login</p>';
        }
        elseif(isset($_GET['error']) && $_GET['error'] == 2) {
            echo '<p style="color:red;">Usuario não encontrado</p>';
        }
        elseif (isset($_SESSION['senha_recuperada'])) {
            $senhaSession = $_SESSION['senha_recuperada'];
            $senha = $senhaSession['Senha'];
            
            echo "<p style='color:green;'>Sua senha é: $senha</p>";
            unset($_SESSION['senha_recuperada']);
        }
        ?>
            <form action="../Controller/usuarioController.php" method="post">
                <label for="login">Login:</label>
                <input type="text" id="login" name="loginrec" placeholder="Digite seu login..." >
                <input type="submit" id="button" value="Enviar" name="Reuperarsenha">
            </form>
            <a href="../View/login.php">Voltar para o login</a>
        </section>
    </main>
</body>
</html>
