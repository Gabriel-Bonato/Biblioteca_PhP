create schema biblioteka;
use biblioteka;
DELIMITER $$
BEGIN
    -- dropando as table caso existam
    DROP TABLE IF EXISTS livro_autor;
    DROP TABLE IF EXISTS livro;
    DROP TABLE IF EXISTS autor;
    DROP TABLE IF EXISTS leitor;
    DROP TABLE IF EXISTS CEP;
    DROP TABLE IF EXISTS Funcionário;

    -- Create CEP table
    CREATE TABLE CEP (
        cepID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        codigoCEP VARCHAR(10) NOT NULL,
        cidade VARCHAR(100) NOT NULL,
        estado VARCHAR(50) NOT NULL,
        uf CHAR(2) NOT NULL
    );
    
    -- Create Usuario table
    CREATE TABLE `biblioteka`.`usuario` (
  `iduser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `LoginUser` VARCHAR(45) NULL,
  `Senha` VARCHAR(45) NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `LoginUser_UNIQUE` (`LoginUser` ASC) VISIBLE,
  UNIQUE INDEX `iduser_UNIQUE` (`iduser` ASC) VISIBLE);
  
  -- Create leitor table
CREATE TABLE `biblioteka`.`leitor` (
  `leitorID` INT NOT NULL AUTO_INCREMENT,
  `nomeLeitor` VARCHAR(100) NOT NULL,
  `endereco` VARCHAR(100) NOT NULL,
  `CEPID` INT NOT NULL,
  `phone` VARCHAR(14) NOT NULL,
  `iduser` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`leitorID`),
  INDEX `leitor_ibfk_1_idx` (`CEPID` ASC) VISIBLE,
  INDEX `iduser_idx` (`iduser` ASC) VISIBLE,
  CONSTRAINT `leitor_ibfk_1`
    FOREIGN KEY (`CEPID`)
    REFERENCES `biblioteka`.`cep` (`CEPID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iduser`
    FOREIGN KEY (`iduser`)
    REFERENCES `biblioteka`.`usuario` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


    -- Create Funcionário table
    CREATE TABLE `biblioteka`.`funcionário` (
  `idfuncionario` INT NOT NULL AUTO_INCREMENT,
  `NomeFuncionario` VARCHAR(100) NOT NULL,
  `CPF_FUNCIONARIO` VARCHAR(14) NOT NULL,
  `iduser` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  UNIQUE INDEX `CPF_FUNCIONARIO_UNIQUE` (`CPF_FUNCIONARIO` ASC) VISIBLE,
  INDEX `iduser_idx` (`iduser` ASC) VISIBLE,
  CONSTRAINT `iduser2`
    FOREIGN KEY (`iduser`)
    REFERENCES `biblioteka`.`usuario` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

  /*  -- Create autor table
    CREATE TABLE autor (
        autorID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nomeAutor VARCHAR(100) NOT NULL,
        bio TEXT
    );*/

    -- Create livro table
    CREATE TABLE livro (
        livroID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        titulo VARCHAR(200) NOT NULL,
        anoPublicacao YEAR,
        genero VARCHAR(50)
    );

 /*   -- Create livro_autor table
    CREATE TABLE livro_autor (
        livroID INT NOT NULL,
        autorID INT NOT NULL,
        PRIMARY KEY (livroID, autorID),
        FOREIGN KEY (livroID) REFERENCES livro(livroID),
        FOREIGN KEY (autorID) REFERENCES autor(autorID)
    );*/
END$$

DELIMITER ;

INSERT INTO usuario (LoginUser, Senha) VALUES ('Admin','senha');
INSERT INTO funcionário (NomeFuncionario, CPF_FUNCIONARIO, iduser) VALUES ('Pablo pereira','165.367.290-05',1);

  
