<?php
//include('../Controller/verifica_funcionario.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Funcionário</title>
</head>
<body>
    <h1>Bem-vindo, <?php //echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Você está logado como Funcionário. Aqui você pode gerenciar o sistema.</p>

    <button onclick="window.location.href='perfil.php'">Perfil</button>
    <button onclick="window.location.href='listarusuario.php'">Listar Usuários</button>
    <button onclick="window.location.href='funcionarios.php'">Funcionários</button>
    <button onclick="window.location.href='livros.php'">Livros</button>
    <button onclick="window.location.href='edicaolivros.php'">LivrosEXPC</button>
    <button onclick="window.location.href='home_funcionario.php?logout=true'">Logout</button>
</body>
</html>