<?php
session_start();

// Verificar se há dados de usuários na sessão
$usuarios = isset($_SESSION['usuarios']) ? $_SESSION['usuarios'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="./styleListF.css">
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['iduser'] ?></td>
                <td><?= $usuario['LoginUser'] ?></td>
                <td><a href="../Controller/usuarioController.php?acao=delete&id=<?= $usuario['iduser'] ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <button onclick="window.location.href='./home_funcionario.php'">Voltar Home</button>
</body>
</html>
