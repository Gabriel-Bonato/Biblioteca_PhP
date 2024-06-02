<?php 
class Conexao{


    public static function conectar(){
        try{
            $pdo = new PDO('mysql:host=localhost;port=(suaporta);dbname=(seu banco de dados', '(seu Usuario)', '(sua senha)');
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