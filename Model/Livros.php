<?php
include("conexao.php");

class LivroModel {
    private $conn;

    public function __construct() {
        $this->conn = Conexao::conectar();
    }

    public function listarLivros() {
        $sql = "SELECT * FROM livro";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserirLivro($livro) {
        $sql = "INSERT INTO livro (titulo, anoPublicacao, genero, autor) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$livro['titulo'], $livro['anoPublicacao'], $livro['genero'], $livro['autor']]);
    }

    public function atualizarLivro($livro) {
        $sql = "UPDATE livro SET titulo = ?, anoPublicacao = ?, genero = ?, autor = ? WHERE livroID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$livro['titulo'], $livro['anoPublicacao'], $livro['genero'], $livro['autor'], $livro['livroID']]);
    }

    public function excluirLivro($livroID) {
        $sql = "DELETE FROM livro WHERE livroID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$livroID]);
    }
}
?>
