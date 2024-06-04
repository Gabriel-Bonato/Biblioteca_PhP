<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="./styleCadastroF.css">
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
        <main>
            <section>
                
                    <?php
                    // Exibe a mensagem de erro, se existir
                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        echo '<p style="color:red;">Todos os campos são obrigatórios!</p>';
                    }
                    elseif(isset($_GET['error']) && $_GET['error'] == 2) {
                        echo '<p style="color:red;">Algo deu errado!Tente novamente!</p>';
                    }
                    ?>
                    <form action="../Controller/LeitoresController.php" method="post">
                        
                            <label for="nomeLeitor">Nome:</label>
                            <input type="text" id="nomeLeitor" name="nomeLeitor">
                        
                        
                            <label for="endereco">Endereço:</label>
                            <input type="text" id="endereco" name="endereco">
                        
                            <label for="phone">Telefone:</label>
                            <input type="text" id="phone" name="phone">
                        
                            <label for="CEPID">CEP:</label>
                            <input type="text" name="CEPID" id="CEPID" placeholder="CEP" oninput="maskCEP(this)" maxlength="9">
                        
                            <label>Login</label>
                            <input type="text" name="login" id="login" placeholder="Seu login">
                        
                            <label>Senha:</label>
                            <input type="password" name="senha" id="senha" placeholder="Sua senha">
                        
                            <label for="tipoAssinatura">Tipo de Assinatura:</label>
                            <select name="selecao" id="selecao" onchange="atualizarPreco()">
                                <option value="pacote1" id="opcao1">Pacote Inicial</option>
                                <option value="pacote2" id="opcao2">Pacote Intermediario</option>
                                <option value="pacote3" id="opcao3">Pacote Avançado</option>
                            </select>
                        
                            <button type="submit" value="Enviar" name="cadastrar">Enviar</button>

                            <p>Preço: <span id="preco">R$ 50,00</span></p>
                           
                    </form>
                    
            </section>
            <button onclick="window.location.href='../View/index.php'">Voltar Home</button>
            
            
        </main>
        
    
</body>
</html>