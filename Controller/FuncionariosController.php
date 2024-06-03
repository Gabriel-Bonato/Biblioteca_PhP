<?php
session_start();



include_once(__DIR__ . '/../Model/funcionario.php');

class funcionarioController{
    public function buscarDadosUsuario($loginUsuario){
        $usuario = $loginUsuario;
        $funcionario = new Funcionario();

        
    
        if ($usuario) {
            $dadosUsuario = $funcionario->buscarUsuario($usuario);
            
             // Armazena os dados do usuário na sessão
            $_SESSION['dadosUsuario'] = $dadosUsuario;

            
            // Redireciona para a página de perfil
            header("Location: ../View/perfil.php");
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
    
        if (empty($resultados)) {
            header("Location: ../View/listfuncionarios.php");
            exit();
        } else {
            $_SESSION['resultados'] = $resultados;
            header("Location: ../View/listfuncionarios.php");
            exit();
        }
    }

    public function CadastrarFuncionario(){
            $funcionario = new Funcionario();

            $nome = $_POST['NomeFuncionario'];
            $cpf = $_POST['CPF_FUNCIONARIO'];
            $login = $_POST['LoginUser'];
            $senha = $_POST['Senha']; // Certifique-se de tratar a senha de forma segura (ex: hash)

            $funcionario->setNomeFuncionario($nome);
            $funcionario->setCPF_FUNCIONARIO($cpf);
            $funcionario->setLogin($login);
            $funcionario->setSenha($senha);

            $result=$funcionario->cadasrarFuncionario();
            var_dump($result);

            if($result==false||$result==null){
                header("Location: ../View/funcionarios.php?erro=1");
                exit();
            }
            else{
                header("Location: ../View/funcionarios.php");
                exit();
            }

            
        

    }
}

if(isset($_POST['perfil'])&& !empty($_POST['perfil'])){
    $perfifun = new funcionarioController();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : (isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null);
    $perfifun->buscarDadosUsuario($usuario);
}
if(isset($_POST['funcionario'])){
    $perfifun = new funcionarioController();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : (isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null);
    $perfifun->buscarDadosUsuarios();
}
if(isset($_POST['cadastrFun'])){
    $perfifun = new funcionarioController();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : (isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null);
    $perfifun->CadastrarFuncionario();

}


