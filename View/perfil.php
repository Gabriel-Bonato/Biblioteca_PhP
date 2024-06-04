<?php
session_start();

include("../Model/conexao.php");

// Verifica se os dados do usuário estão na sessão
if (isset($_SESSION['dadosUsuario'])) {
    $dadosUsuario = $_SESSION['dadosUsuario'];
   

    // Agora você pode usar os dados do usuário conforme necessário

    
    $login = $dadosUsuario[0]['LoginUser'];
    $nomeLeitor = $dadosUsuario[0]['nomeLeitor'];
    $endereco = $dadosUsuario[0]['endereco'];
    $phone = $dadosUsuario[0]['phone'];
    $codigoCEP = $dadosUsuario[0]['codigoCEP'];
    $cidade = $dadosUsuario[0]['cidade'];
    $estado = $dadosUsuario[0]['estado'];
    $uf = $dadosUsuario[0]['uf'];

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
    <style>
        .perfil-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .perfil-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .perfil-item {
            margin-bottom: 15px;
        }
        .perfil-item label {
            font-weight: bold;
            display: block;
        }
    </style>
</head>
<body>
    <div class="perfil-container">
        <h1>Perfil do Usuário</h1>
        <?php if ($dadosUsuario): ?>
            <div class="perfil-item">
                <label>ID do Usuário:</label>
                <div><?php echo htmlspecialchars($dadosUsuario[0]["iduser"]); ?></div>
            </div>
            <div class="perfil-item">
                <label>Login:</label>
                <div><?php echo htmlspecialchars($login); ?></div>
            </div>
            <div class="perfil-item">
                <label>Nome do Leitor:</label>
                <div><?php echo htmlspecialchars($nomeLeitor); ?></div>
            </div>
            <div class="perfil-item">
                <label>Endereço:</label>
                <div><?php echo htmlspecialchars($endereco); ?></div>
            </div>
            <div class="perfil-item">
                <label>Telefone:</label>
                <div><?php echo htmlspecialchars($phone); ?></div>
            </div>
            <div class="perfil-item">
                <label>Código CEP:</label>
                <div><?php echo htmlspecialchars($codigoCEP); ?></div>
            </div>
            <div class="perfil-item">
                <label>Cidade:</label>
                <div><?php echo htmlspecialchars($cidade); ?></div>
            </div>
            <div class="perfil-item">
                <label>Estado:</label>
                <div><?php echo htmlspecialchars($estado); ?></div>
            </div>
            <div class="perfil-item">
                <label>UF:</label>
                <div><?php echo htmlspecialchars($uf); ?></div>
            </div>
        <?php else: ?>
            <p>Não foi possível carregar os dados do usuário.</p>
        <?php endif; ?>
    </div>
</body>
</html>