<?php
session_start();

include_once(__DIR__ . '/../Model/livros.php');

class LivroController {
    public function listarLivros() {
        $livroModel = new LivroModel();
        $livros = $livroModel->listarLivros();
        $_SESSION['livros'] = $livros;
        header("Location: ../View/Listar_livro.php");
        //header("Location: ../View/lista_livros.php");
        exit();
    }

    public function inserirLivro() {
        if (empty($_POST['titulo']) || empty($_POST['anoPublicacao']) || empty($_POST['genero']) || empty($_POST['autor'])) {
            header("Location: ../View/cadastrarlivro.php?error=1");
            exit();
        }

        $livro = [
            'titulo' => $_POST['titulo'],
            'anoPublicacao' => $_POST['anoPublicacao'],
            'genero' => $_POST['genero'],
            'autor' => $_POST['autor']
        ];

        $livroModel = new LivroModel();
        $livroModel->inserirLivro($livro);
        header("Location: ../View/home_funcionario.php");
        exit();
    }

    public function atualizarLivro() {
        if (empty($_POST['titulo']) || empty($_POST['anoPublicacao']) || empty($_POST['genero']) || empty($_POST['autor']) || empty($_POST['livroID'])) {
            header("Location: ../View/editar_livro.php?error=1&livroID=" . $_POST['livroID']);
            exit();
        }

        $livro = [
            'titulo' => $_POST['titulo'],
            'anoPublicacao' => $_POST['anoPublicacao'],
            'genero' => $_POST['genero'],
            'autor' => $_POST['autor'],
            'livroID' => $_POST['livroID']
        ];
        

        $livroModel = new LivroModel();
        $livroModel->atualizarLivro($livro);
        header("Location: ../View/home_funcionario.php");
        exit();
    }

    public function excluirLivro($idlivro) {
        if (empty($idlivro)) {
            header("Location: ../View/lista_livros.php?error=1");
            exit();
        }

        
        $livroModel = new LivroModel();
        $livroModel->excluirLivro($idlivro);
        header("Location: ../View/home_funcionario.php");
        exit();
    }
}

if (isset($_POST['inserirLivro'])){
    $livroController = new LivroController();
    $livroController->inserirLivro();
}

if (isset($_POST['atualizarLivro'])) {
    $livroController = new LivroController();
    $livroController->atualizarLivro();
}

    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $idlivro = $_GET['id'];
        $livroController = new LivroController();
        $livroController->excluirLivro($idlivro);
    }


if (isset($_POST['listarLivro'])) {
    $livroController = new LivroController();
    $livroController->listarLivros();
}


?>
