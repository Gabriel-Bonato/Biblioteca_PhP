<?php
session_start();


// Verificar se a sessão ou os cookies estão definidos
if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])) {
    $usuario = $_SESSION['usuario'];
    $tipo = $_SESSION['tipo'];
} elseif (isset($_COOKIE['usuario']) && isset($_COOKIE['tipo_usuario'])) {
    $usuario = $_COOKIE['usuario'];
    $tipo = $_COOKIE['tipo_usuario'];
} else {
    // Se não houver sessão ou cookie, redirecionar para a página de login
    header("Location: ../View/login.php");
    exit();
}

// Redirecionar com base no tipo de usuário
if ($tipo === 'leitor') {
    header("Location: ../View/home_leitor.php");
    exit();
} elseif ($tipo === 'funcionário') {
    header("Location: ../View/home_funcionário.php ");
    exit();
} else {
    header("Location: ../View/login.php");
    exit();
}
?>