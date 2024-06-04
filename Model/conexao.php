<?php 
class Conexao{


    public static function conectar(){
        try{
            $senha = "positivo";
            $pdo = new PDO('mysql:host=localhost;port=3306;dbname=biblioteka', 'root', $senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão realizada com sucesso!";
            return $pdo;
        }
        catch(PDOException $erro)
        {
            echo "ERRO => " . $erro->getMessage();
            return null;
        }
    }

    
    
}



?>