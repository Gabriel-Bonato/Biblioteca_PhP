<?php
include("conexao.php");
include_once(__DIR__ . '/../Model/CEP.php');
    class leitores{
        

    // Propriedades privadas
    private $nomeLeitor;
    private $endereco;
    private $phone;

    private $CEPID;

    private $login;
    private $senha;
    private $selecao;

    // Getters e setters para cada propriedade
    public function getNomeLeitor() {
        return $this->nomeLeitor;
    }

    public function setNomeLeitor($nomeLeitor) {
        $this->nomeLeitor = $nomeLeitor;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getCEPID() {
        return $this->CEPID;
    }

    public function setCEPID($CEPID) {
        $this->CEPID = $CEPID;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSelecao() {
        return $this->selecao;
    }

    public function setSelecao($selecao) {
        $this->selecao = $selecao;
    }
    //Funções

    public function salvarNoBancoDeDados() {
        try{
        // Conectar ao banco de dados
        $conn = Conexao::conectar();
        $cep = new Cep();

        $cepid = $this->getCEPID();
        

        $cep->CEP($cepid);
        $CodeCEP = $cep->getCodigoCep();
        $cidade = $cep->getCidade();
        $estado = $cep->getEstado();
        $uf = $cep->getUf();
        $logradouro= $cep->getlogradouro();


        // Preparar a instrução SQL para inserir os dados da tabela cep
        $stmt = $conn->prepare("INSERT INTO cep (codigoCEP, cidade, estado,uf) VALUES (:CodeCEP,:cidade ,:estado ,:uf)");
        $stmt->bindParam("CodeCEP", $CodeCEP);
        $stmt->bindParam("cidade", $cidade);
        $stmt->bindParam("estado", $estado);
        $stmt->bindParam("uf", $uf);
        $stmt->execute();
        //recupera o ultimo id inserido do cep
        $id_cep = $conn->lastInsertId();

        $login = $this->getLogin();
        $senha = $this->getSenha();

        // Preparar a instrução SQL para inserir os dados da tabela usuario
        $stmt = $conn->prepare("INSERT INTO usuario (LoginUser, Senha) VALUES (:logini,:senha )");
        $stmt->bindParam("logini", $login);
        $stmt->bindParam("senha", $senha);
        $stmt->execute();

        //recupera o ultimo id inserido do user
        $id_user = $conn->lastInsertId();

        // Obter os valores das variáveis usando getters
        $nomeLeitor = $this->getNomeLeitor();
        $phone = $this->getPhone();
        

        // Preparar a instrução SQL para inserir os dados da tabela leitores
        $stmt = $conn->prepare("INSERT INTO leitor (nomeLeitor, endereco, CEPID,phone,idUser) VALUES (:nomeLeitor,:endereco ,:id_cep,:phone,:id_user )");
        $stmt->bindParam("nomeLeitor", $nomeLeitor);
        $stmt->bindParam("endereco", $logradouro);
        $stmt->bindParam("phone", $phone);
        $stmt->bindParam("id_cep", $id_cep);
        $stmt->bindParam("id_user", $id_user);

        $stmt->execute();
        return true;
    }
    catch(PDOException $error){
        echo "ERRO => " . $error->getMessage();
            return null;
    }

    }

    public function buscarUsuario($user){
        try {
            $pdo =Conexao::conectar();
            
            $stmt = $pdo->prepare("SELECT 
                    u.iduser,
                    u.LoginUser,
                    l.nomeLeitor,
                    l.endereco,
                    l.phone,
                    c.codigoCEP,
                    c.cidade,
                    c.estado,
                    c.uf
                FROM 
                    usuario u
                LEFT JOIN 
                    leitor l ON u.iduser = l.iduser
                LEFT JOIN 
                    cep c ON l.CEPID = c.CEPID
                WHERE 
                    u.LoginUser = :loginUsuario
            ");

            // Vincular parâmetros
            $stmt->bindParam(':loginUsuario', $user);

            // Executar a consulta
            $stmt->execute();

            // Armazenar os resultados em uma variável
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
    
            return $resultados;
    
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return null;
        }
    }

 }


