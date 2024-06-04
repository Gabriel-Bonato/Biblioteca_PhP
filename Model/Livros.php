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
        try{
        $sql = "UPDATE livro SET titulo = ?, anoPublicacao = ?, genero = ?, autor = ? WHERE livroID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$livro['titulo'], $livro['anoPublicacao'], $livro['genero'], $livro['autor'], $livro['livroID']]);
    }
    catch(PDOException $error){
        return false;
    }
    }

    public function excluirLivro($livroID) {
        try{
        $sql = "DELETE FROM livro WHERE livroID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$livroID]);
        return true;
        }
        catch(PDOException $error){
            return false;
        }
    }
}
?>
