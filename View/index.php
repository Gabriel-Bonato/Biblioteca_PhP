<!--index.php-->
<?php
include("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeira area</title>
    <link rel="stylesheet" href="./style.css">

    <script>
        function redirecionarComSelecao(selecao) {
            window.location.href = `cadastro.php?selecao=${selecao}`;
        }
    </script>
</head>
<body>
    <div class="conteiner">
        <header>
            <div class="linkhome"><a href="index.php"><h1>Logo da biblioteca</h1></a></div>
        
            <div class="registro">
                
    
                <a href="login.php">
                    
                <img src="imagens/usu_icon.png" alt="20" width="80">
                <p>Login</p>

                </a>
            
            </div>
        </header>
        <main>
            <div class="centro">
                
                <div class="texto">

                    <h1>Biblio Text</h1>

                    <p>Bem-vindo à [Nome da Biblioteca Virtual], um portal dedicado a oferecer acesso ilimitado a uma vasta coleção de recursos digitais. Nossa missão é democratizar o conhecimento, permitindo que pessoas de todas as idades e locais explorem e usufruam de conteúdos culturais e acadêmicos de alta qualidade.</p>

                    <p>Na [Nome da Biblioteca Virtual], você encontrará uma diversidade de materiais que atendem a diferentes interesses e necessidades educacionais. Nossa coleção inclui:</p>

                    <li>Livros Digitais: Acesse milhares de e-books, desde clássicos da literatura até obras contemporâneas, em diversos idiomas.</li>
                    <li>Artigos e Periódicos: Pesquise artigos acadêmicos, revistas científicas e periódicos de várias áreas do conhecimento.</li>
                    <li>Manuscritos e Documentos Históricos: Explore documentos raros e manuscritos históricos que fornecem um olhar detalhado sobre o passado.</li>
                    <li>Áudios e Vídeos: Assista a documentários, entrevistas e ouça gravações de áudio de palestras, conferências e eventos culturais.</li>
                    <li>Imagens e Fotografias: Desfrute de uma rica coleção de imagens, incluindo obras de arte, fotografias históricas e ilustrações.</li>

                    <p>Nosso portal é projetado para ser intuitivo e fácil de navegar, permitindo que você encontre rapidamente os recursos que precisa. Oferecemos diversas ferramentas de pesquisa e filtros avançados para refinar sua busca e facilitar o acesso ao conteúdo desejado.</p>
                    
                    <p>A [Nome da Biblioteca Virtual] também se dedica a apoiar a educação e a pesquisa. Por isso, disponibilizamos uma série de recursos educativos e guias de estudo para estudantes e pesquisadores. Nossa equipe está constantemente trabalhando para expandir nossa coleção e garantir que você tenha acesso às informações mais recentes e relevantes.</p>

                    <p>Além disso, promovemos uma série de eventos online, como webinars, workshops e palestras, que visam enriquecer o conhecimento dos nossos usuários e fomentar a troca de ideias e experiências.</p>

                    <p>Convidamos você a explorar a [Nome da Biblioteca Virtual] e descobrir um mundo de conhecimento ao seu alcance. Seja para fins educacionais, pesquisa acadêmica ou simplesmente para satisfazer sua curiosidade, nossa biblioteca é o seu ponto de acesso a um vasto universo de informações digitais.</p>

                    <p>Junte-se a nós e aproveite tudo o que a [Nome da Biblioteca Virtual] tem a oferecer. O conhecimento é a chave para o crescimento pessoal e coletivo, e estamos aqui para abrir essas portas para você.</p>
                </div>






                <div class="vendaPacote">
                    <div class="produto"><img src="imagens/livros/51KvntpPRpL._SY445_SX342_.jpg" width="200px">
                    <p>Pacote inicial</p>
                    valor do pacote
                    R$50,00
                    <button onclick="redirecionarComSelecao('opcao1')">Assinar</button>
                
                
                    </div>
                    <div class="produto"><img src="imagens/livros/51KvntpPRpL._SY445_SX342_.jpg" width="200px">
                    <p>Pacote Intermediario</p>
                    valor do pacote
                    R$100,00
                    <button onclick="redirecionarComSelecao('opcao2')">Assinar</button>
                
                
                    </div>
                    <div class="produto"><img src="imagens/livros/51KvntpPRpL._SY445_SX342_.jpg" width="200px">
                    <p>Pacote Avançado</p>
                    valor do pacote
                    R$150,00

                    <button onclick="redirecionarComSelecao('opcao3')">Assinar</button>
                
                
                    </div>
                    

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