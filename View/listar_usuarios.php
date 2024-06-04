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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
    <a href="../View/home_funcionario.php">Voltar para a página inicial</a>
</body>
</html>
