<?php
include('../Controller/verifica_leitor.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Leitor</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Você está logado como Leitor. Aproveite sua leitura!</p>

    <button onclick="window.location.href='perfil.php'">Perfil</button>
    <button onclick="window.location.href='livros.php'">Livros</button>
    <button onclick="window.location.href='home_leitor.php?logout=true'">Logout</button>
</body>
</html>