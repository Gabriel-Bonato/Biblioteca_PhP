<?php
session_start();



include_once(__DIR__ . '/../Model/funcionario.php');

class funcionarioController{
    public function buscarDadosUsuario($loginUsuario){
        $usuario = $loginUsuario;
        $funcionario = new Funcionario();

        var_dump($usuario);

        
    
        if ($usuario) {
            $dadosUsuario = $funcionario->buscarUsuario($usuario);
            var_dump($dadosUsuario);
            
             // Armazena os dados do usuário na sessão
            $_SESSION['dadosUsuario'] = $dadosUsuario;

            
            // Redireciona para a página de perfil
           header("Location: ../View/Perfil_F.php");
            exit();
            

        } else {
            // Redireciona para a página de login se não houver usuário
          header("Location: login.php");
            exit();
        }

    }

    public function buscarDadosUsuarios() {
        $func = new Funcionario();
        $resultados = $func->buscarLista();
        var_dump($resultados);
        if (empty($resultados)) {
            header("Location: ../View/listfuncionarios.php");
            exit();
        } else {
            $_SESSION['resultados'] = $resultados;
            header("Location: ../View/listfuncionarios.php");
            exit();
        }
    }

    public function CadastrarFuncionario() {
        // Verificando se os campos estão vazios
        if (empty($_POST['NomeFuncionario']) || empty($_POST['CPF_FUNCIONARIO']) || empty($_POST['LoginUser']) || empty($_POST['Senha'])) {
            header("Location: ../View/cadastro_funcionario.php?error=1");
            exit();
        }
    
        $funcionario = new Funcionario();
    
        $nome = $_POST['NomeFuncionario'];
        $cpf = $_POST['CPF_FUNCIONARIO'];
        $login = $_POST['LoginUser'];
        $senha = $_POST['Senha']; // Certifique-se de tratar a senha de forma segura (ex: hash)
    
        $funcionario->setNomeFuncionario($nome);
        $funcionario->setCPF_FUNCIONARIO($cpf);
        $funcionario->setLogin($login);
        $funcionario->setSenha($senha);
    
        $result = $funcionario->cadastrarFuncionario();
        
        var_dump($result);
        if ($result === false || $result === null) {
            header("Location: ../View/cadastro_funcionario.php?error=1");
            exit();
        } else {
            header("Location: ../View/listfuncionarios.php");
            exit();
        }
    }
            
        

        
}

if(isset($_POST['perfil'])){
    $perfifun = new funcionarioController();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : (isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null);
    $perfifun->buscarDadosUsuario($usuario);
}
if(isset($_POST['funcionario'])){
    $perfifun = new funcionarioController();
    $perfifun->buscarDadosUsuarios();
}
if(isset($_POST['cadastrFun'])){
    $perfifun = new funcionarioController();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : (isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null);
    $perfifun->CadastrarFuncionario();

}


