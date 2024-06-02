<?php
class Usuario{

    private $login;
    private $senha;
    private $NomeUsu;
    private $email;
    private $telefone;
    private $CEP;
    private $CPF;


    public function cadastroUsuario(){
        $pdo = Conexao::conectar();


        // Inserir dados na tabela
            $sql = $pdo-> prepare("INSERT INTO usuario (loginUsu, senha, nivel, NomeUsu, email, telefone, CEP, CPF) VALUES ('login', 'senha', 'nivel','NomeUsu', 'email', 'telefone', 'CEP', 'CPF')");
            
        
            //Está invertendo não sei por que
            if ($pdo->query($sql) === TRUE) {
                redirectWithError("Erro ao realizar o cadastro. Tente novamente.");
                
                exit();
            } else {
                // Redirecionar para a página de login
                header("Location: View/login.php");
            }
        //}

    }

        // Getter e Setter para $login
        public function getLogin() {
            return $this->login;
        }
    
        public function setLogin($login) {
            $this->login = $login;
        }
    
        // Getter e Setter para $senha
        public function getSenha() {
            return $this->senha;
        }
    
        public function setSenha($senha) {
            $this->senha = $senha;
        }
    
        // Getter e Setter para $NomeUsu
        public function getNomeUsu() {
            return $this->NomeUsu;
        }
    
        public function setNomeUsu($NomeUsu) {
            $this->NomeUsu = $NomeUsu;
        }
    
        // Getter e Setter para $email
        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }
    
        // Getter e Setter para $telefone
        public function getTelefone() {
            return $this->telefone;
        }
    
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
    
        // Getter e Setter para $CEP
        public function getCEP() {
            return $this->CEP;
        }
    
        public function setCEP($CEP) {
            $this->CEP = $CEP;
        }
    
        // Getter e Setter para $CPF
        public function getCPF() {
            return $this->CPF;
        }
    
        public function setCPF($CPF) {
            $this->CPF = $CPF;
        }

        //Getter e Setter para $
    

}


?>
