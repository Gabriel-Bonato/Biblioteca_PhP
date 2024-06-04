<?php
include('../Controller/verifica_leitor.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Leitor</title>
    <link rel="stylesheet" href="./styleHome.css">
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Você está logado como Leitor. Aproveite sua leitura!</p>

    <!-- Formulário para acionar a função buscarDadosUsuario -->
    <form method="post" action="../Controller/LeitoresController.php">
    <button type="submit" name="perfil">Perfil</button>
    </form>

    <form method="post" action="livros.php">
        <button type="submit">Livros</button>
    </form>

    <form method="post" action="home_leitor.php?logout=true">
        <button type="submit">Logout</button>
    </form>
</body>
</html>