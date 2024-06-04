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
    <link rel="stylesheet" href="./styleCadastroF.css">
</head>
<body>
    <h1>Cadastrar Novo Funcionário</h1>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo '<p style="color:red;">Cadastro falhou!!</p>';
    }
    ?>
    <form method="POST" action="../Controller/FuncionariosController.php">
        <label for="NomeFuncionario">Nome:</label>
        <input type="text" id="NomeFuncionario" name="NomeFuncionario"><br><br>
        <label for="CPF_FUNCIONARIO">CPF:</label>
        <input type="text" id="CPF_FUNCIONARIO" name="CPF_FUNCIONARIO" oninput="mascaraCPF(this)" maxlength="14"><br><br> <!-- maxlength atualizado para 14 para acomodar a máscara -->
        <label for="LoginUser">Login:</label>
        <input type="text" id="LoginUser" name="LoginUser"><br><br>
        <label for="Senha">Senha:</label>
        <input type="password" id="Senha" name="Senha"><br><br>
        <button type="submit" name="cadastrFun">Cadastrar</button>
    </form>
    <br>
    <button onclick="window.location.href='listfuncionarios.php'">Voltar</button>

    <script>
        function mascaraCPF(input) {
            let value = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            if (value.length > 11) {
                value = value.substring(0, 11); // Limita o valor a 11 dígitos
            }
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona um ponto após os primeiros 3 dígitos
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona um ponto após os próximos 3 dígitos
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona um traço antes dos últimos 2 dígitos
            input.value = value;
        }
    </script>
</body>
</html>