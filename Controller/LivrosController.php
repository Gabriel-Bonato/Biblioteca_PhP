<?php
session_start();

include_once(__DIR__ . '/../Model/LivroModel.php');

class LivroController {
    
    public function listarLivros() {
        $livroModel = new LivroModel();
        $livros = $livroModel->listarLivros();
        
        if (empty($livros)) {
            // Redireciona para uma página de lista vazia ou trata conforme necessário
            header("Location: ../View/lista_vazia.php");
            exit();
        } else {
            $_SESSION['livros'] = $livros;
            header("Location: ../View/lista_livros.php");
            exit();
        }
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

        header("Location: ../View/lista_livros.php");
        exit();
    }

    public function atualizarLivro() {
        if (empty($_POST['livroID']) || empty($_POST['titulo']) || empty($_POST['anoPublicacao']) || empty($_POST['genero']) || empty($_POST['autor'])) {
            header("Location: ../View/editar_livro.php?error=1");
            exit();
        }

        $livro = [
            'livroID' => $_POST['livroID'],
            'titulo' => $_POST['titulo'],
            'anoPublicacao' => $_POST['anoPublicacao'],
            'genero' => $_POST['genero'],
            'autor' => $_POST['autor']
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

// Tratamento dos diferentes envios de formulário
if (isset($_POST['listarLivros'])) {
    $livroController = new LivroController();
    $livroController->listarLivros();
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
