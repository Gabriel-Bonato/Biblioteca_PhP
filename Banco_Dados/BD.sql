CREATE SCHEMA biblioteka;
USE biblioteka;

DELIMITER $$

BEGIN
    -- Dropando as tabelas caso existam
    DROP TABLE IF EXISTS livro_autor;
    DROP TABLE IF EXISTS livro;
    DROP TABLE IF EXISTS autor;
    DROP TABLE IF EXISTS leitor;
    DROP TABLE IF EXISTS CEP;
    DROP TABLE IF EXISTS Funcionário;
    DROP TABLE IF EXISTS usuario;

    -- Create CEP table
    CREATE TABLE CEP (
        cepID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        codigoCEP VARCHAR(10) NOT NULL,
        cidade VARCHAR(100) NOT NULL,
        estado VARCHAR(50) NOT NULL,
        uf CHAR(2) NOT NULL
    );

    -- Create Usuario table
    CREATE TABLE usuario (
        iduser INT UNSIGNED NOT NULL AUTO_INCREMENT,
        LoginUser VARCHAR(45) NULL,
        Senha VARCHAR(45) NULL,
        PRIMARY KEY (iduser),
        UNIQUE INDEX LoginUser_UNIQUE (LoginUser ASC) VISIBLE,
        UNIQUE INDEX iduser_UNIQUE (iduser ASC) VISIBLE
    );

    -- Create leitor table
    CREATE TABLE leitor (
        leitorID INT NOT NULL AUTO_INCREMENT,
        nomeLeitor VARCHAR(100) NOT NULL,
        endereco VARCHAR(100) NOT NULL,
        estado VARCHAR(20) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        UF CHAR(2) NOT NULL,
        cidade VARCHAR(100) NOT NULL,
        Rua VARCHAR(180) NOT NULL,
        R_Numero INT NOT NULL,
        Password VARCHAR(100) NOT NULL,
        Tipo_Assinatura VARCHAR(50),
        CEPID INT NOT NULL,
        iduser INT UNSIGNED NOT NULL,
        PRIMARY KEY (leitorID),
        INDEX leitor_ibfk_1_idx (CEPID ASC) VISIBLE,
        INDEX iduser_idx (iduser ASC) VISIBLE,
        CONSTRAINT leitor_ibfk_1
            FOREIGN KEY (CEPID)
            REFERENCES CEP (cepID)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
        CONSTRAINT iduser
            FOREIGN KEY (iduser)
            REFERENCES usuario (iduser)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
    );

    -- Create Funcionário table
    CREATE TABLE funcionário (
        idfuncionario INT NOT NULL AUTO_INCREMENT,
        NomeFuncionario VARCHAR(100) NOT NULL,
        CPF_FUNCIONARIO VARCHAR(15) NOT NULL,
        Password VARCHAR(100) NOT NULL,
        Username VARCHAR(50) NOT NULL,
        iduser INT UNSIGNED NOT NULL,
        PRIMARY KEY (idfuncionario),
        UNIQUE INDEX CPF_FUNCIONARIO_UNIQUE (CPF_FUNCIONARIO ASC) VISIBLE,
        INDEX iduser_idx (iduser ASC) VISIBLE,
        CONSTRAINT iduser2
            FOREIGN KEY (iduser)
            REFERENCES usuario (iduser)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
    );

    -- Create livro table
    CREATE TABLE livro (
        livroID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        titulo VARCHAR(200) NOT NULL,
        anoPublicacao YEAR,
        genero VARCHAR(50),
        autor VARCHAR(100) NOT NULL
    );

END$$

DELIMITER ;
