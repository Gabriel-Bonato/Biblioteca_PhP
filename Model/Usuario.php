<?php

use LDAP\Result;

include("conexao.php");
class Usuario {
    private $login;
    private $senha;
    private $nivel;

    // Getter para login
    public function getLogin() {
        return $this->login;
    }

    // Setter para login
    public function setLogin($login) {
        $this->login = $login;
    }

    // Getter para senha
    public function getSenha() {
        return $this->senha;
    }

    // Setter para senha
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    // Getter para nivel
    public function getNivel() {
        return $this->nivel;
    }

    // Setter para nivel
    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function verificarLogin() {
        try {
            $pdo = Conexao::conectar(); 

            if ($pdo) {
                $login=$this->getLogin();
                $senha=$this->getSenha();

                $stmt = $pdo->prepare("SELECT LoginUser FROM usuario WHERE LoginUser = :logini AND Senha = :senha");
                $stmt->bindParam(':logini', $login);
                $stmt->bindParam(':senha', $senha);
                $stmt->execute();
                
                $log = $stmt->fetch(PDO::FETCH_ASSOC);

                
                if ($log) {

                $stmt = $pdo->prepare("SELECT * FROM usuario WHERE LoginUser = :logini AND Senha = :senha");
                $stmt->bindParam(':logini', $login);
                $stmt->bindParam(':senha', $senha);
                $stmt->execute();
                

                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $Senha = $usuario['Senha'];
                $id_user=$usuario['iduser'];
                
                
                

                
                    if ($Senha==$senha) {
                        // Senha correta
                        
                        return $id_user;

                    } else {
                        // Senha incorreta
                        return null;
                    }
                } else {
                    // Usuário não encontrado
                    return null;
                }
            } else {
                // Erro na conexão
                return null;
            }
        } catch (PDOException $erro) {
            // Tratamento de erro
            echo "ERRO => " . $erro->getMessage();
            return null;
        }
    }

    public function verificartipo($idUsuario) {
        try {
            
            // Obter a conexão
            $pdo = Conexao::conectar();
        
            // Consulta SQL para verificar em qual tabela o idUsuario está relacionado
            $sql = "SELECT 
                        CASE 
                            WHEN l.iduser IS NOT NULL THEN 'leitor'
                            WHEN f.iduser IS NOT NULL THEN 'funcionário'
                            ELSE 'nenhum'
                        END AS tipo_usuario
                    FROM 
                        usuario u
                    LEFT JOIN 
                        leitor l ON u.iduser = l.iduser
                    LEFT JOIN 
                        funcionário f ON u.iduser = f.iduser
                    WHERE 
                        u.iduser = :idUsuario";
        
            // Preparar a consulta
            $stmt = $pdo->prepare($sql);
        
            // Vincular parâmetros
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        
            // Executar a consulta
            $stmt->execute();
        
            // Obter o resultado
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($result);
            
            if ($result!=null) {
                $tipo=$result['tipo_usuario'];
                return $tipo;

            } else {
                echo "Usuário não encontrado.";
            }
        } catch(PDOException $e) {
            // Em caso de erro, exibir mensagem de erro
            echo "Erro: " . $e->getMessage();
        } 
    }

    public function buscarUsuariosNoBanco(){
        try {
            $pdo = Conexao::conectar();

            $sql = "SELECT * FROM usuario";
            $stmt = $pdo->query($sql);
    
            
            $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            
        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
        }
    }

    public function DeletarUsuario($idUsuario,$tipo){
        try {
            $pdo = Conexao::conectar();
        
            
            
            
            if($tipo =="funcionário"){
                $stmt = $pdo->prepare("DELETE FROM funcionário WHERE idUser = :idUser");
                $stmt->bindParam(':idUser', $idUsuario);
                $stmt->execute();

                $stmt = $pdo->prepare("DELETE FROM usuario WHERE iduser = ?");
                $stmt->execute([$idUsuario]);

                return true;

            }
            elseif($tipo =="leitor"){
                $stmt = $pdo->prepare("DELETE FROM leitor WHERE idUser = :idUser");
                $stmt->bindParam(':idUser', $idUsuario);
                $stmt->execute();

                $stmt = $pdo->prepare("DELETE FROM usuario WHERE iduser = ?");
                $stmt->execute([$idUsuario]);

                return true;

            }else{
                echo "usuario não encontrado!!";
                return false;
            }
        } catch(PDOException $e) {
            echo "Erro ao deletar usuário: " . $e->getMessage();
            return false;
        }
    }
}
?>