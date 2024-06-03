<?php
session_start();


// Verifica se o usuário está logado e se o tipo é 'leitor'
if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])) {
    if ($_SESSION['tipo'] !== 'leitor') {
        // Se o tipo não for 'leitor', redireciona para a página de login
        header("Location: ../View/login.php");
        exit();
    }
} elseif (isset($_COOKIE['usuario']) && isset($_COOKIE['tipo_usuario'])) {
    if ($_COOKIE['tipo_usuario'] !== 'leitor') {
        // Se o tipo de cookie não for 'leitor', redireciona para a página de login
        header("Location: ../View/login.php");
        exit();
    } else {
        // Se os cookies são válidos, reestabelece a sessão
        $_SESSION['usuario'] = $_COOKIE['usuario'];
        $_SESSION['tipo'] = $_COOKIE['tipo_usuario'];
    }
} else {
    // Se não houver sessão ou cookie, redireciona para a página de login
    header("Location: ../View/login.php");
    exit();
}

// Função para limpar sessão e cookies e redirecionar para a página de login
function logout() {
    session_unset();
    session_destroy();
    setcookie('usuario', '', time() - 3600, '/');
    setcookie('tipo_usuario', '', time() - 3600, '/');
    header("Location: ../View/index.php");
    exit();
}

// Verifica se o botão de logout foi clicado
if (isset($_GET['logout'])) {
    logout();
}
?>
