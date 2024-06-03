<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="./style.css">
    <script>
        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        function ativarSelecao() {
            var selecao = getParameterByName('selecao');
            if (selecao) {
                document.getElementById(selecao).selected = true;
            }
        }

        function atualizarPreco() {
            var select = document.getElementById('selecao');
            var preco = document.getElementById('preco');
            var valorSelecionado = select.options[select.selectedIndex].value;

            var precos = {
                'pacote1': 'R$ 50,00',
                'pacote2': 'R$ 100,00',
                'pacote3': 'R$ 150,00'
            };

            preco.innerHTML = precos[valorSelecionado];
        }

        function maskCEP(input) {
            let value = input.value.replace(/\D/g, ''); // Remove tudo que não é dígito
            if (value.length > 8) value = value.substring(0, 8); // Limita a 8 dígitos
            value = value.replace(/(\d{5})(\d)/, '$1-$2'); // Coloca um hífen entre o quinto e o sexto dígitos
            input.value = value;
        }

        window.onload = function() {
            atualizarPreco(); // Atualizar o preço ao carregar a página
            ativarSelecao();
        };
    </script>
</head>
<body>
    <div class="conteiner">
        <header>
            <div class="linkhome"><a href="./index.php">
                <h1>Logo da biblioteca</h1>
            </a></div>
            <div class="registro">
                <a href="./login.php">
                    <img src="imagens/usu_icon.png" alt="20" width="80">
                    <p>Login</p>
                </a>
            </div>
        </header>
        <main>
            <div class="centro">
                <div class="compra">
                    <?php
                    // Exibe a mensagem de erro, se existir
                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<p style="color:red;">Todos os campos são obrigatórios!</p>';
                    }
                    ?>
                    <form action="../Controller/LeitoresController.php" method="post">
                        <div class="form-group-inline">
                            <label for="nomeLeitor">Nome:</label>
                            <input type="text" id="nomeLeitor" name="nomeLeitor">
                        </div>
                        <div class="form-group-inline">
                            <label for="endereco">Endereço:</label>
                            <input type="text" id="endereco" name="endereco">
                        </div>
                        <div class="form-group-inline">
                            <label for="phone">Telefone:</label>
                            <input type="text" id="phone" name="phone">
                        </div>
                        <div class="form-group-inline">
                            <label for="CEPID">CEP:</label>
                            <input type="text" name="CEPID" id="CEPID" placeholder="CEP" oninput="maskCEP(this)" maxlength="9">
                        </div>
                        <div class="form-group-inline">
                            <label>Login</label>
                            <input type="text" name="login" id="login" placeholder="Seu login">
                        </div>
                        <div class="form-group-inline">
                            <label>Senha:</label>
                            <input type="password" name="senha" id="senha" placeholder="Sua senha">
                        </div>
                        <div class="form-group-inline">
                            <label for="tipoAssinatura">Tipo de Assinatura:</label>
                            <select name="selecao" id="selecao" onchange="atualizarPreco()">
                                <option value="pacote1" id="opcao1">Pacote Inicial</option>
                                <option value="pacote2" id="opcao2">Pacote Intermediario</option>
                                <option value="pacote3" id="opcao3">Pacote Avançado</option>
                            </select>
                        </div>
                        <div class="form-group-inline">
                            <input type="submit" value="Enviar" name="cadastrar">
                        </div>
                    </form>
                    <p>Preço: <span id="preco">R$ 50,00</span></p>
                </div>
            </div>
        </main>
        <footer>
            <a href="sobre.php">Sobre nós</a>
            <a href="#">Alguma coisa</a>
        </footer>
    </div>
</body>
</html>
