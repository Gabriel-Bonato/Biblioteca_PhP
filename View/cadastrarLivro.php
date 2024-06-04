<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livro</title>
    <link rel="stylesheet" href="./styleCadastroLivro.css">
</head>
<body>
    <section>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "<p style='color:red;'>Todos os campos são obrigatórios!</p>";
        }
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo "<p style='color:green;'>Livro cadastrado com sucesso!</p>";
        }
        ?>
        <form action="../Controller/LivrosController.php" method="post">
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" placeholder="Título do Livro"><br>
            <label for="anoPublicacao">Ano de Publicação:</label><br>
            <input type="text" id="anoPublicacao" name="anoPublicacao" placeholder="Ano de Publicação"><br>
            <label for="genero">Gênero:</label><br>
            <input type="text" id="genero" name="genero" placeholder="Gênero"><br>
            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" placeholder="Autor"><br>
            <button type="submit" name="inserirLivro" id="button">Cadastrar</button>
        </form>
    </section>
</body>
</html>
