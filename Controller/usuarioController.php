<?php
include_once(__DIR__ . '/../Model/Usuario.php');

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
}

    

    if(isset($_POST['login']) && !empty($_POST['login'])){
        $userController = new usuarioController();
        $userController->login();
    }

?>