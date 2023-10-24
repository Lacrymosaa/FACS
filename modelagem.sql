
CREATE DATABASE `db_facs`;

USE `db_facs`;

-- Tabela Usuarios 
CREATE TABLE Usuario (
    id_usuario INT PRIMARY KEY,
    email VARCHAR(100),
    senha_hash VARCHAR(100)
);

-- Tabela Departamentos
CREATE TABLE Departamento (
    id_departamento INT PRIMARY KEY AUTO_INCREMENT,
    nome_departamento VARCHAR(50)
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

-- Tabela Armario
CREATE TABLE Armario (
    id_armario INT PRIMARY KEY AUTO_INCREMENT,
    armario_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    armario_conservacao VARCHAR(50) NOT NULL,
    armario_observacao VARCHAR(200) NOT NULL,
    armario_tipo VARCHAR(50) NOT NULL,
    armario_status BIT NOT NULL,
    armario_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);

-- Tabela Cadeira
CREATE TABLE Cadeira (
    id_cadeira INT PRIMARY KEY AUTO_INCREMENT,
    cadeira_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    cadeira_conservacao VARCHAR(50) NOT NULL,
    cadeira_observacao VARCHAR(200) NOT NULL,
    cadeira_tipo VARCHAR(50) NOT NULL,
    cadeira_status BIT NOT NULL,
    cadeira_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);

-- Tabela Informatica
CREATE TABLE Informatica (
    id_informatica INT PRIMARY KEY AUTO_INCREMENT,
    informatica_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    informatica_conservacao VARCHAR(50) NOT NULL,
    informatica_observacao VARCHAR(200) NOT NULL,
    informatica_tipo VARCHAR(50) NOT NULL,
    informatica_status BIT NOT NULL,
    informatica_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);

-- Tabela Eletrodomestico
CREATE TABLE Eletrodomestico (
    id_eletrodomestico INT PRIMARY KEY AUTO_INCREMENT,
    eletrodomestico_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    eletrodomestico_conservacao VARCHAR(50) NOT NULL,
    eletrodomestico_observacao VARCHAR(200) NOT NULL,
    eletrodomestico_tipo VARCHAR(50) NOT NULL,
    eletrodomestico_status BIT NOT NULL,
    eletrodomestico_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);

-- Tabela Mesa
CREATE TABLE Mesa (
    id_mesa INT PRIMARY KEY AUTO_INCREMENT,
    mesa_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    mesa_conservacao VARCHAR(50) NOT NULL,
    mesa_observacao VARCHAR(200) NOT NULL, 
    mesa_tipo VARCHAR(50) NOT NULL,
    mesa_status BIT NOT NULL,
    mesa_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);

-- Tabela Patrimonio Diversos
CREATE TABLE PatrimonioDiverso (
    id_patrimonio_diverso INT PRIMARY KEY AUTO_INCREMENT,
    patrimonio_diverso_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    patrimonio_diverso_conservacao VARCHAR(50) NOT NULL,
    patrimonio_diverso_observacao VARCHAR(200) NOT NULL,
    patrimonio_diverso_tipo VARCHAR(50) NOT NULL,
    patrimonio_diverso_status BIT NOT NULL,
    patrimonio_diverso_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);

-- Tabela Poltrona
CREATE TABLE Poltrona (
    id_poltrona INT PRIMARY KEY AUTO_INCREMENT,
    poltrona_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    poltrona_conservacao VARCHAR(50) NOT NULL,
    poltrona_observacao VARCHAR(200) NOT NULL,
    poltrona_tipo VARCHAR(50) NOT NULL,
    poltrona_status BIT NOT NULL,
    poltrona_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);

-- Tabela Som e Imagem
CREATE TABLE SomImagem (
    id_som_imagem INT PRIMARY KEY AUTO_INCREMENT,
    som_imagem_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    som_imagem_conservacao VARCHAR(50) NOT NULL, 
    som_imagem_observacao VARCHAR(200) NOT NULL,
    som_imagem_tipo VARCHAR(50) NOT NULL,
    som_imagem_status BIT NOT NULL,
    som_imagem_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);

-- Tabela Telefone
CREATE TABLE Telefone (
    id_telefone INT PRIMARY KEY AUTO_INCREMENT,
    telefone_numero_patrimonio INT NOT NULL,
    id_departamento INT NOT NULL,
    telefone_conservacao VARCHAR(50) NOT NULL,
    telefone_observacao VARCHAR(200) NOT NULL,
    telefone_tipo VARCHAR(50) NOT NULL,
    telefone_status BIT NOT NULL,
    telefone_path_foto VARCHAR(100) NOT NULL,
    id_nota_fiscal INT NOT NULL,
    FOREIGN KEY (id_departamento) REFERENCES Departamentos(id_departamento) ON DELETE CASCADE,
    FOREIGN KEY (id_nota_fiscal) REFERENCES NotaFiscal(id_nota_fiscal) ON DELETE CASCADE
);
