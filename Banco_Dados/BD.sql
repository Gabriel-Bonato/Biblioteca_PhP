DROP TABLE IF EXISTS livro; -- Dropando a tabela caso ela já exista
DROP TABLE IF EXISTS leitor; -- Dropando a tabela caso ela já exista
DROP TABLE IF EXISTS Estados; -- Dropando a tabela caso ela já exista
DROP TABLE IF EXISTS Funcionário; -- Dropando a tabela caso ela já exista

CREATE TABLE leitor (
    leitorID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nomeLeitor VARCHAR(100) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    UF CHAR(2) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    Rua VARCHAR(180) NOT NULL,
    R_Numero INT NOT NULL,
    Password VARCHAR(100) NOT NULL
    Tipo_Assinatura VARCHAR (50)
);

CREATE TABLE Funcionário (
    idFuncionario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    NomeFuncionario VARCHAR(100) NOT NULL,
    CPF_FUNCIONARIO VARCHAR(15) NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Username VARCHAR(50) NOT NULL
);

CREATE TABLE livro (
    livroID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    anoPublicacao YEAR,
    genero VARCHAR(50),
    autor VARCHAR(100) NOT NULL
)