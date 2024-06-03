<?php
session_start();

include_once '../Model/Funcionario.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Funcionário</title>
</head>
<body>
    <h1>Cadastrar Novo Funcionário</h1><?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p style="color:red;">Cadastro falhou!!</p>';
        }
    ?>
    <form method="POST" action="../Controller/FuncionariosController.php">
        <label for="NomeFuncionario">Nome:</label>
        <input type="text" id="NomeFuncionario" name="NomeFuncionario" required><br><br>
        <label for="CPF_FUNCIONARIO">CPF:</label>
        <input type="text" id="CPF_FUNCIONARIO" name="CPF_FUNCIONARIO" required><br><br>
        <label for="LoginUser">Login:</label>
        <input type="text" id="LoginUser" name="LoginUser" required><br><br>
        <label for="Senha">Senha:</label>
        <input type="password" id="Senha" name="Senha" required><br><br>
        <button type="submit" name="cadastrFun">Cadastrar</button>
    </form>
    <br>
    <button onclick="window.location.href='listfuncionarios.php'">Voltar</button>
</body>
</html>