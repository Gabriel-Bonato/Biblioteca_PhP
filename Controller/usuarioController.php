<?php
require_once('');

class usuarioController{

    public function processsa($acao){
        if($acao == "C")// para criação de usuario
            {
                $novousuario = new Usuario();

                function redirectWithError($error) {
                    header("Location: View/cadastro.php?error=" . urlencode($error));
                    exit();
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $NomeUsu = $_POST['nomeUsu'];
                    $email = $_POST['email'];
                    $telefone = $_POST['telefone'];
                    $CEP = $_POST['CEP'];
                    $CPF = $_POST['CPF'];
                    $selecao = $_POST['selecao'];
                
                    // Verificar se os campos obrigatórios estão preenchidos
                    if (empty($login)) {
                        redirectWithError("Login é obrigatório");
                    }
                    if (empty($senha)) {
                        redirectWithError("Senha é obrigatória");
                    }
                    if (empty($NomeUsu)) {
                        redirectWithError("Nome é obrigatório");
                    }
                    if (empty($email)) {
                        redirectWithError("Email é obrigatório");
                    }
                    if (empty($telefone)) {
                        redirectWithError("Telefone é obrigatório");
                    }
                    if (empty($CEP)) {
                        redirectWithError("CEP é obrigatório");
                    }
                    if (empty($CPF)) {
                        redirectWithError("CPF é obrigatório");
                    }
                    if (empty($selecao)) {
                        redirectWithError("Tipo de Assinatura é obrigatório");
                    }
                    
    
                
                    // Determinar o nível de assinatura
                    switch ($selecao) {
                        case 'pacote1':
                            $nivel = 1;
                            break;
                        case 'pacote2':
                            $nivel = 2;
                            break;
                        case 'pacote3':
                            $nivel = 3;
                            break;
                        default:
                            redirectWithError("Seleção de assinatura inválida");
                    }

                    $novousuario->setLogin($login);
                    $novousuario->setsenha($senha);
                    $novousuario->setNomeUsu($NomeUsu);
                    $novousuario->setemail($email);
                    $novousuario->setTelefone($telefone);
                    $novousuario->setCEP($CEP);
                    $novousuario->setCPF($CPF);


                    


            }
        }
    }
}



?>