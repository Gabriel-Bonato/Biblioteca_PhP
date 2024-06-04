<?php
session_start();

$livros = isset($_SESSION['livros']) ? $_SESSION['livros'] : [];

// Obtenção do tipo de usuário a partir do cookie
$tipoUsuario = isset($_COOKIE['tipo-usuario']) ? $_COOKIE['tipo-usuario'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="./styleListF.css">
</head>
<body>
    <h1>Lista de Livros</h1>
    <?php
    if ($_SESSION['tipo'] === "funcionário") {?>
    <button onclick="window.location.href='./cadastrarLivro.php'">Adicionar Livro</button><?php
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
                <?php
                if ($_SESSION['tipo'] === "funcionário") {
                ?>
                <th>Ação</th>

                <?php
                }
                ?>
                <form action="../Controller/LivrosController.php" method="post"></form>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($livros)) {
                foreach ($livros as $livro) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($livro['livroID']) . "</td>";
                    
                    
                    
                    echo "<td>" . htmlspecialchars($livro['titulo']) . "</td>";
                    echo "<td>" . htmlspecialchars($livro['anoPublicacao']) . "</td>";
                    echo "<td>" . htmlspecialchars($livro['genero']) . "</td>";
                    echo "<td>" . htmlspecialchars($livro['autor']) . "</td>";
                    
                    
                    if ($_SESSION['tipo'] === "funcionário") {?>
                        <td><a href="../Controller/LivrosController.php?id=<?php echo $livro['livroID']; ?>">Delete</a>

                        <a href="./editar_livro.php?id=<?php echo $livro['livroID']; ?>">Editar</a></td>
                        <?php
                    
                    }
                    
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum livro encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button id="home-button">Home</button>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let tipoUsuario = "<?php echo $_SESSION['tipo']; ?>";

            // Ajuste do botão Home
            let homeButton = document.getElementById("home-button");
            if (tipoUsuario === "funcionário") {
                homeButton.addEventListener("click", function() {
                    window.location.href = "home_funcionario.php";
                });
            } else if (tipoUsuario === "leitor") {
                homeButton.addEventListener("click", function() {
                    window.location.href = "home_leitor.php";
                });
            }
        });
    </script>
</body>
</html>