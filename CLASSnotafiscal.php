<?php

require('./assets/config/connect.php');

class NotaFiscal
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function cadastrarNotaFiscal($nf_numero, $processo, $data_emissao, $pregao, $valor, $nf_status, $nf_file)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO NotaFiscal (nf_numero, processo, data_emissao, pregao, valor, nf_status, nf_file) 
                                          VALUES (:nf_numero, :processo, :data_emissao, :pregao, :valor, :nf_status, :nf_file)");

            $stmt->bindParam(':nf_numero', $nf_numero);
            $stmt->bindParam(':processo', $processo);
            $stmt->bindParam(':data_emissao', $data_emissao);
            $stmt->bindParam(':pregao', $pregao);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':nf_status', $nf_status);
            $stmt->bindParam(':nf_file', $nf_file);

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

    public function listarNotasFiscais()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM NotaFiscal");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>
