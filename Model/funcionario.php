<?php
include("conexao.php");


class Funcionario{

    private $login;
    private $senha;
    private $NomeFuncionario;
    private $CPF_FUNCIONARIO;

    // Getter and Setter for $login
    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    // Getter and Setter for $senha
    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    // Getter and Setter for $NomeFuncionario
    public function getNomeFuncionario() {
        return $this->NomeFuncionario;
    }

    public function setNomeFuncionario($NomeFuncionario) {
        $this->NomeFuncionario = $NomeFuncionario;
    }

    // Getter and Setter for $CPF_FUNCIONARIO
    public function getCPF_FUNCIONARIO() {
        return $this->CPF_FUNCIONARIO;
    }

    public function setCPF_FUNCIONARIO($CPF_FUNCIONARIO) {
        $this->CPF_FUNCIONARIO = $CPF_FUNCIONARIO;
    }

    public function buscarUsuario($user)
    {
        try{
             
                $pdo = Conexao::conectar();

           
                // SQL para buscar os dados das tabelas funcionario e usuario
                $stmt = $pdo->prepare("SELECT funcionario.*, usuario.LoginUser 
                FROM funcionario 
                INNER JOIN usuario ON funcionario.iduser = usuario.iduser
                WHERE funcionario.iduser = :iduser");
                $stmt->execute();
                
                // Obtenha todos os resultados
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


                if ($resultados ==  null) {
                    return null;
                } else {
                    return $resultados;
                }
            
        } catch (PDOException $erro) {
            echo "Erro ao buscar dados: " . $erro->getMessage();
        }
    }


    public function buscarLista() {
        try {
            // Obtenha a conexão com o banco de dados
            $pdo = Conexao::conectar();
            
            // SQL para buscar todos os dados das tabelas funcionario e usuario
            $sql = "SELECT funcionario.*, usuario.LoginUser 
                    FROM funcionario 
                    INNER JOIN usuario ON funcionario.iduser = usuario.iduser";
            
            // Prepare a declaração SQL
            $stmt = $pdo->prepare($sql);
            
            // Execute a declaração
            $stmt->execute();
            
            // Obtenha todos os resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultados;
        } catch (PDOException $erro) {
            echo "Erro ao buscar dados: " . $erro->getMessage();
            return [];
        }
    }

    public function cadasrarFuncionario(){
        try {
            $pdo = Conexao::conectar();

            $senha=$this->getSenha();
            $login=$this->getLogin();
            $nome=$this->getNomeFuncionario();
            $cpf=$this->getCPF_FUNCIONARIO();
            
            // Inserir na tabela usuario primeiro
            $sqlUsuario = "INSERT INTO usuario (LoginUser, Senha) VALUES (?, ?)";
            $stmtUsuario = $pdo->prepare($sqlUsuario);
            $stmtUsuario->execute([$login, password_hash($senha, PASSWORD_BCRYPT)]);
            
            // Obter o último ID inserido para a tabela usuario
            $iduser = $pdo->lastInsertId();
            
            // Inserir na tabela funcionario
            $sqlFuncionario = "INSERT INTO funcionario (NomeFuncionario, CPF_FUNCIONARIO, iduser) VALUES (?, ?, ?)";
            $stmtFuncionario = $pdo->prepare($sqlFuncionario);
            $stmtFuncionario->execute([$nome, $cpf, $iduser]);
    
            return true;
        } catch (PDOException $erro) {
            echo "Erro ao cadastrar funcionário: " . $erro->getMessage();
        }
    }
}
?>