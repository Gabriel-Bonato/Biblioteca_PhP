<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="styleListarLivro.css">
</head>
<body>
    <section>
        <h1>Lista de Livros</h1>

        <?php
        session_start();

        if (isset($_SESSION['livros']) && !empty($_SESSION['livros'])) {
            $livros = $_SESSION['livros'];
        } else {
            echo "<p>Nenhum livro encontrado.</p>";
            exit();
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Ano de Publicação</th>
                    <th>Gênero</th>
                    <th>Autor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($livro['livroID']); ?></td>
                    <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($livro['anoPublicacao']); ?></td>
                    <td><?php echo htmlspecialchars($livro['genero']); ?></td>
                    <td><?php echo htmlspecialchars($livro['autor']); ?></td>
                    <td>
                        <form action="../Controller/LivroController.php" method

="post" style="display:inline;">
                            <input type="hidden" name="livroID" value="<?php echo htmlspecialchars($livro['livroID']); ?>">
                            <button type="submit" name="excluirLivro" id="button">Excluir</button>
                        </form>
                        <form action="editar_livro.php" method="get" style="display:inline;">
                            <input type="hidden" name="livroID" value="<?php echo htmlspecialchars($livro['livroID']); ?>">
                            <button type="submit" name="editarLivro" id="button">Editar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br>
        <a href="cadastro_livro.php" id="button">Cadastrar Novo Livro</a>
    </section>
</body>
</html>
