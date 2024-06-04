<?php
session_start();
include_once(__DIR__ . '/../Model/LivroModel.php');

class LivroController {
    public function listarLivros() {
        $livroModel = new LivroModel();
        $livros = $livroModel->listarLivros();
        $_SESSION['livros'] = $livros;
        header("Location: ../View/lista_livros.php");
        exit();
    }

    public function inserirLivro() {
        if (empty($_POST['titulo']) || empty($_POST['anoPublicacao']) || empty($_POST['genero']) || empty($_POST['autor'])) {
            header("Location: ../View/cadastro_livro.php?error=1");
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
        header("Location: ../View/cadastro_livro.php?success=1");
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
        header("Location: ../View/lista_livros.php");
        exit();
    }

    public function excluirLivro() {
        if (empty($_POST['livroID'])) {
            header("Location: ../View/lista_livros.php?error=1");
            exit();
        }

        $livroID = $_POST['livroID'];
        $livroModel = new LivroModel();
        $livroModel->excluirLivro($livroID);
        header("Location: ../View/lista_livros.php");
        exit();
    }
}

if (isset($_POST['inserirLivro'])) {
    $livroController = new LivroController();
    $livroController->inserirLivro();
}

if (isset($_POST['atualizarLivro'])) {
    $livroController = new LivroController();
    $livroController->atualizarLivro();
}

if (isset($_POST['excluirLivro'])) {
    $livroController = new LivroController();
    $livroController->excluirLivro();
}
?>
