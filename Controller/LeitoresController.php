<?php
include_once(__DIR__ . '/../Model/leitores.php');
class LeitoresController{
    public function cadastrarleitor(){
        
        
    
        $nomeLeitor = trim($_POST['nomeLeitor']);
        $endereco = trim($_POST['endereco']);
        $phone = trim($_POST['phone']);
        $CEPID = trim($_POST['CEPID']);
        $login = trim($_POST['login']);
        $senha = trim($_POST['senha']);
        $selecao = trim($_POST['selecao']);

        // Verifica se algum dos campos está vazio
        if (empty($nomeLeitor) || empty($endereco) || empty($phone) || empty($CEPID) || empty($login) || empty($senha) || empty($selecao)) {
            // Redireciona para a página de cadastro com uma mensagem de erro
            header("Location: ../View/cadastro.php?error=1");
            exit();
        } else {
            // Todos os campos estão preenchidos, armazena os valores em variáveis
            

            $leitor = new leitores();
            $nomeLeitor = $_POST['nomeLeitor'];
            $endereco = $_POST['endereco'];
            $phone = $_POST['phone'];
            $CEPID = $_POST['CEPID'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $selecao = $_POST['selecao'];

            $leitor->setNomeLeitor($nomeLeitor);
            $leitor->setEndereco($endereco);
            $leitor->setPhone($phone);
            $leitor->setCEPID($CEPID);
            $leitor->setLogin($login);
            $leitor->setSenha($senha);
            $leitor->setSelecao($selecao);
            
            



            $result = $leitor->salvarNoBancoDeDados();

            if($result == false){
                // Redireciona para a página de cadastro com uma mensagem de erro
                header("Location: ../View/cadastro.php?error=2");
                exit();
            }
            else{
                // Redireciona para uma página de sucesso ou qualquer outra página desejada
                header("Location: ../View/login.php");
                exit();
            }


            

            
        }

    }
}


if(isset($_POST['cadastrar']) && !empty($_POST['cadastrar'])){
    $leitorController = new LeitoresController();
    $leitorController->cadastrarleitor();
}


?>