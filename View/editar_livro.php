<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Livro</title>
    <link rel="stylesheet" href="./styleCadastroF.css">

    <script>
        // Adiciona uma máscara para permitir apenas 4 dígitos e números no campo de "Ano de Publicação"
        document.getElementById('anoPublicacao').addEventListener('input', function(event) {
            this.value = this.value.replace(/\D/g, '').substring(0, 4);
        });
    </script>

</head>

<body>

    <section>

        <h1>Editar Livro</h1>

 

        <?php

        // Verificar se o ID do livro está definido e não está vazio

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $livroID = $_GET['id'];

 

            // Recuperar os detalhes do livro com base no ID

            // Você precisa implementar a lógica para recuperar os detalhes do livro do banco de dados

            // Substitua o código abaixo pela sua lógica de acesso ao banco de dados

            $livro = [

                'titulo' => 'Título do Livro', // Substitua pelo título do livro do banco de dados

                'anoPublicacao' => 'Ano de Publicação', // Substitua pelo ano de publicação do livro do banco de dados

                'genero' => 'Gênero do Livro', // Substitua pelo gênero do livro do banco de dados

                'autor' => 'Autor do Livro' // Substitua pelo autor do livro do banco de dados

            ];

        } else {

            echo "<p>ID do livro não encontrado.</p>";

            exit();

        }

        ?>

 

        <form action="../Controller/LivrosController.php" method="post">

            <input type="hidden" name="livroID" value="<?php echo $livroID; ?>">

            <label for="titulo">Título:</label>

            <input type="text" id="titulo" name="titulo" placeholder="<?php echo htmlspecialchars($livro['titulo']); ?>" required>

            <label for="anoPublicacao">Ano de Publicação:</label>

            <input type="text" id="anoPublicacao" name="anoPublicacao" placeholder="<?php echo htmlspecialchars($livro['anoPublicacao']); ?>" required>

            <label for="genero">Gênero:</label>

            <input type="text" id="genero" name="genero" placeholder="<?php echo htmlspecialchars($livro['genero']); ?>" required>

            <label for="autor">Autor:</label>

            <input type="text" id="autor" name="autor" placeholder="<?php echo htmlspecialchars($livro['autor']); ?>" required>

            <input type="submit" name="atualizarLivro" value="Atualizar">

        </form>

    </section>

</body>

</html>
