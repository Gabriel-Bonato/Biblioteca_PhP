<?php
include_once(__DIR__ . '/../Model/Usuario.php');
session_start();

class usuarioController{
    public function login(){
        $user = new Usuario();
    // Verifica se os campos estão vazios
    if (empty($_POST["loginUsu"]) || empty($_POST["senhaUSu"])) {
        // Redireciona para a página de cadastro com uma mensagem de erro
        header("Location: ../View/login.php?error=1");
        exit();
    } else {
        // Recebendo os dados do formulário
        $loginUsu = $_POST["loginUsu"];
        $senhaUSu = $_POST["senhaUSu"];

        $user->setLogin($loginUsu);
        $user->setSenha($senhaUSu);
    
        $result = $user->verificarLogin();
        $tipo=$user->verificarTipo($result);
        
        if($result == null){
            header("Location: ../View/login.php?error=3");
            exit();
        }
        else{
            
            if ($tipo == 'leitor') {
                // Definir sessão e cookie para leitor
                $_SESSION['usuario'] = $loginUsu;
                $_SESSION['tipo'] = 'leitor';
                setcookie('usuario', $loginUsu, time() + 3600, '/'); // Cookie válido por 1 hora
                setcookie('tipo_usuario', 'leitor', time() + 3600, '/'); // Cookie válido por 1 hora

                // Redirecionar para a página inicial do leitor
                header("Location: ../View/home_leitor.php");
                exit();
            } elseif ($tipo == 'funcionário') {
                // Definir sessão e cookie para funcionário
                $_SESSION['usuario'] = $loginUsu;
                $_SESSION['tipo'] = 'funcionário';
                setcookie('usuario', $loginUsu, time() + 3600, '/'); // Cookie válido por 1 hora
                setcookie('tipo_usuario', 'funcionário', time() + 3600, '/'); // Cookie válido por 1 hora

                 // Redirecionar para a página inicial do funcionário
                 header("Location: ../View/home_funcionario.php");
                 exit();
            }
            else{
               // header("Location: ../View/login.php?error=2");
                //exit();;
            }
        }

        

        
        
    }

}
    public function ListarUsuarios(){
        $user = new Usuario();

        $result = $user->buscarUsuariosNoBanco();
    
        if($result == null){
            echo "Erro ao encontrar usuário";
        }
        else{
            // Armazenar os dados dos usuários na sessão
            $_SESSION['usuarios'] = $result;
    
            // Redirecionar para a página onde os usuários serão exibidos
            header("Location: ../View/listar_usuarios.php");
            exit();
        }
    }

    public function deletarUsuario($idUsuario){
        $user = new Usuario();

        $tipo = $user->verificartipo($idUsuario);
        
        $result = $user->DeletarUsuario($idUsuario,$tipo);
        var_dump($result);
        if($result==false){
            header("Location: ../View/listar_usuarios?error=1");
            exit();
            
        }
       else{
            header("Location: ../View/home_funcionario.php");
            exit();
        }

    }

    public function resgatarSenha(){
        
        if(empty($_POST['loginrec'])){
            
            header("Location: ../View/recuperarsenha.php?error=1");
            exit();
        }else{
            $login = $_POST['loginrec'];
    
            $user = new Usuario();
            $senha = $user->resgatarSenha($login);
            
           
            if ($senha == null) {
                header("Location: ../View/recuperarsenha.php?error=2");
                exit();
            } else {
                $_SESSION['senha_recuperada'] = $senha; 
                header("Location: ../View/recuperarsenha.php"); 
                exit();
            }
        }
    }
}

    

    if(isset($_POST['login']) && !empty($_POST['login'])){
        $userController = new usuarioController();
        $userController->login();
    }
    if (isset($_POST['listarusuario'])) {
        $userController = new usuarioController();
        $userController->ListarUsuarios();
       
    }
    if (isset($_POST['Reuperarsenha'])) {
        $userController = new usuarioController();
        $userController->resgatarSenha();
       
    }
    if($_GET['acao'] == 'delete'){
        if(isset($_GET['id']) && !empty($_GET['id']))
        {
            $idUsuario = $_GET['id'];
            $userController = new usuarioController();
            $userController->deletarUsuario($idUsuario);
        }
    } 
    
?>