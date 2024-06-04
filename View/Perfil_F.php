<?php
session_start();

include("../Model/conexao.php");

// Verifica se os dados do usuário estão na sessão
if (isset($_SESSION['dadosUsuario'])) {
    $dadosUsuario = $_SESSION['dadosUsuario'];
   

    // Agora você pode usar os dados do usuário conforme necessário

    
    $login = $dadosUsuario['usuario']['LoginUser'];
    $nomeFuncionario = $dadosUsuario['funcionário']['NomeFuncionario'];
    $CPF = $dadosUsuario['funcionário']['CPF_FUNCIONARIO'];

    // Limpa os dados da sessão após o uso
    unset($_SESSION['dadosUsuario']);
} else {
    // Redireciona para a página de login se os dados do usuário não estiverem na sessão
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="./stylePerfil.css">
    
</head>
<body>
    <section>
        <h1>Perfil do Usuário</h1>
        <?php if ($dadosUsuario): ?>
            <div class="perfil-item">
                <label>ID do Funcionario:</label>
                <div><?php echo htmlspecialchars($dadosUsuario['funcionário']["idfuncionario"]); ?></div>
            </div>
            <div class="perfil-item">
                <label>Login:</label>
                <div><?php echo htmlspecialchars($login); ?></div>
            </div>
            <div class="perfil-item">
                <label>Nome do Funcionário:</label>
                <div><?php echo htmlspecialchars($nomeFuncionario); ?></div>
            </div>
            
            <div class="perfil-item">
                <label>CPF:</label>
                <div><?php echo htmlspecialchars($CPF); ?></div>
            </div>

            
            
        <?php else: ?>
            <p>Não foi possível carregar os dados do usuário.</p>
        <?php endif; ?>
        <button onclick="window.location.href='./home_funcionario.php'">Voltar Home</button>
    </section>
    
</body>
</html>