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
        try {
            $pdo = Conexao::conectar();
            
            // Select para obter o usuário pelo LoginUser
        
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE LoginUser = :loginm");
            $stmt->bindParam("loginm", $user);
            $stmt->execute(); // Passando o parâmetro como array associativo
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Se o usuário existir, vamos obter o funcionário correspondente
            if ($usuario) {
                $iduser = $usuario['iduser'];
                
                // Select para obter o funcionário pelo iduser
                $sqlFuncionario = "SELECT * FROM funcionário WHERE iduser = ?";
                $stmtFuncionario = $pdo->prepare($sqlFuncionario);
                $stmtFuncionario->execute([$iduser]);
                $funcionario = $stmtFuncionario->fetch(PDO::FETCH_ASSOC);
                
                // Retornar um array com os resultados dos dois selects
                return ['usuario' => $usuario, 'funcionário' => $funcionario];
            }
            
            // Se o usuário não existir, retornamos null para indicar que não há resultados
            return null;
        } catch (PDOException $erro) {
            echo "Erro ao buscar usuário e funcionário: " . $erro->getMessage();
            return null;
        }
    }


    public function buscarLista() {
        try {
            // Obtenha a conexão com o banco de dados
            $pdo = Conexao::conectar();
            
            // SQL para buscar todos os dados das tabelas funcionario e usuario
            $sql = "SELECT funcionário.*, usuario.LoginUser 
                    FROM funcionário 
                    INNER JOIN usuario ON funcionário.iduser = usuario.iduser";
            
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

    public function cadastrarFuncionario(){
        try {
            $pdo = Conexao::conectar();
    
            $senha = $this->getSenha();
            $login = $this->getLogin();
            $nome = $this->getNomeFuncionario();
            $cpf = $this->getCPF_FUNCIONARIO();
            
            // Inserir na tabela usuario primeiro
            $sqlUsuario = "INSERT INTO usuario (LoginUser, Senha) VALUES (?, ?)";
            $stmtUsuario = $pdo->prepare($sqlUsuario);
            $stmtUsuario->execute([$login, $senha]);
            
            // Obter o último ID inserido para a tabela usuario
            $iduser = $pdo->lastInsertId();
            
            // Inserir na tabela funcionario
            $sqlFuncionario = "INSERT INTO funcionário (NomeFuncionario, CPF_FUNCIONARIO, iduser) VALUES (?, ?, ?)";
            $stmtFuncionario = $pdo->prepare($sqlFuncionario);
            $stmtFuncionario->execute([$nome, $cpf, $iduser]);
    
            return true;
        } catch (PDOException $erro) {
            echo "Erro ao cadastrar funcionário: " . $erro->getMessage();
            return false; // Retorna false em caso de erro
        }
    }
}
?>