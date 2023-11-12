<?php

require('./assets/config/connect.php');

class Patrimonio
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function cadastrarPatrimonio($numero_patrimonio, $id_departamento, $conservacao, $observacao, $tipo, $condicao, $path_foto, $id_nota_fiscal, $nome_objeto)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO Patrimonio (numero_patrimonio, id_departamento, conservacao, observacao, tipo, condicao, path_foto, id_nota_fiscal, nome_objeto) 
                                          VALUES (:numero_patrimonio, :id_departamento, :conservacao, :observacao, :tipo, :condicao, :path_foto, :id_nota_fiscal, :nome_objeto)");

            $stmt->bindParam(':numero_patrimonio', $numero_patrimonio);
            $stmt->bindParam(':id_departamento', $id_departamento);
            $stmt->bindParam(':conservacao', $conservacao);
            $stmt->bindParam(':observacao', $observacao);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':condicao', $condicao);
            $stmt->bindParam(':path_foto', $path_foto);
            $stmt->bindParam(':id_nota_fiscal', $id_nota_fiscal);
            $stmt->bindParam(':nome_objeto', $nome_objeto);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editarPatrimonio($id_patrimonio, $numero_patrimonio, $id_departamento, $conservacao, $observacao, $tipo, $condicao, $path_foto, $id_nota_fiscal, $nome_objeto)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE Patrimonio 
                                          SET numero_patrimonio = :numero_patrimonio, 
                                              id_departamento = :id_departamento, 
                                              conservacao = :conservacao, 
                                              observacao = :observacao, 
                                              tipo = :tipo, 
                                              condicao = :condicao, 
                                              path_foto = :path_foto, 
                                              id_nota_fiscal = :id_nota_fiscal, 
                                              nome_objeto = :nome_objeto 
                                          WHERE id_patrimonio = :id_patrimonio");

            $stmt->bindParam(':id_patrimonio', $id_patrimonio);
            $stmt->bindParam(':numero_patrimonio', $numero_patrimonio);
            $stmt->bindParam(':id_departamento', $id_departamento);
            $stmt->bindParam(':conservacao', $conservacao);
            $stmt->bindParam(':observacao', $observacao);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':condicao', $condicao);
            $stmt->bindParam(':path_foto', $path_foto);
            $stmt->bindParam(':id_nota_fiscal', $id_nota_fiscal);
            $stmt->bindParam(':nome_objeto', $nome_objeto);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listarPatrimonioPorNota($id_nota_fiscal)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM Patrimonio WHERE id_nota_fiscal = :id_nota_fiscal");
            $stmt->bindParam(':id_nota_fiscal', $id_nota_fiscal);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listarPatrimonioPorDepartamento($id_departamento)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM Patrimonio WHERE id_departamento = :id_departamento");
            $stmt->bindParam(':id_departamento', $id_departamento);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

        public function listarPatrimonioPorId($id_patrimonio)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM Patrimonio WHERE id_patrimonio = :id_patrimonio");
            $stmt->bindParam(':id_patrimonio', $id_patrimonio);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function filtrarPatrimonioPorNome($nome_objeto)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM Patrimonio WHERE nome_objeto LIKE :nome_objeto");
            $stmt->bindValue(':nome_objeto', '%' . $nome_objeto . '%');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>
