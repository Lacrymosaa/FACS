
CREATE DATABASE `db_facs`;

USE `db_facs`;

-- Tabela Usuario
CREATE TABLE Usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    senha_hash VARCHAR(100) NOT NULL,
    reset_token VARCHAR(255),
    expire DATETIME
);

-- Tabela Departamento
CREATE TABLE Departamento  (
    id_departamento INT PRIMARY KEY AUTO_INCREMENT,
    nome_departamento VARCHAR(50) NOT NULL
);

-- Tabela Nota Fiscal
CREATE TABLE NotaFiscal (
    id_nota_fiscal INT PRIMARY KEY AUTO_INCREMENT,
    nf_numero VARCHAR(50) NOT NULL,
    processo VARCHAR(50) NOT NULL,
    data_emissao DATE NOT NULL,
    pregao VARCHAR(50) NOT NULL,
    valor FLOAT NOT NULL,
    nf_status BIT NOT NULL,
    nf_file VARCHAR(100) NOT NULL
);


CREATE TABLE Patrimonio (
    id_patrimonio INT PRIMARY KEY AUTO_INCREMENT,
    numero_patrimonio INT NOT NULL,
    conservacao VARCHAR(50) NOT NULL,
    observacao VARCHAR(200) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    condicao BIT NOT NULL,
    path_foto VARCHAR(100) NOT NULL,
    nome_objeto VARCHAR(50) NOT NULL,
    id_nota_fiscal INT NOT NULL, 
    id_departamento INT NOT NULL,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal),
    FOREIGN KEY (id_departamento) REFERENCES Departamento(id_departamento)
); 
