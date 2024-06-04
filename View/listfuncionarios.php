<?php
session_start();


$resultados = $_SESSION['resultados'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link rel="stylesheet" href="./styleListF.css">
    <style>
    
    </style>
</head>
<body>
    
    <h1>Lista de Funcionários</h1>
    <button onclick="window.location.href='cadastro_funcionario.php'">Criar Novo Funcionário</button>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Login</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($resultados) > 0): ?>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['NomeFuncionario']); ?></td>
                        <td><?php echo htmlspecialchars($row['CPF_FUNCIONARIO']); ?></td>
                        <td><?php echo htmlspecialchars($row['LoginUser']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Nenhum resultado encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <button onclick="window.location.href='./home_funcionario.php'">Voltar Home</button>
</body>
</html>