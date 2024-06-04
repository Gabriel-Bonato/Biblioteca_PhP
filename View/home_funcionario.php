<?php
include('../Controller/verifica_funcionario.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Funcionário</title>
    <link rel="stylesheet" href="./styleHome.css">
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Você está logado como Funcionário. Aqui você pode gerenciar o sistema.</p>

    <form method="post" action="../Controller/FuncionariosController.php">
        <button type="submit" name="perfil">Perfil</button>
    </form>
    <form method="post" action="../Controller/usuarioController.php">
        <button type="submit" name="listarusuario">Listar Usuários</button>
    </form>
    <form method="post" action="../Controller/FuncionariosController.php">
        <button type="submit" name="funcionario">Funcionários</button>
    </form>
    <form method="post" action="../Controller/LivrosController.php">
        <button type="submit" name="listarLivro">Livros</button>
    </form>
    <form method="post" action="home_funcionario.php?logout=true">
        <input type="hidden" name="logout" value="true">
        <button type="submit">Logout</button>
    </form>
</body>
</html>