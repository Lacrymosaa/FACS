<?php
    Class Connect {
        private $pdo;
        public function __construct($host, $dbname, $username, $password)
        {
            try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Falha ao executar a conexão com o banco de dados: ERRO -> ". $e->getMessage());
            }
        }
        public function Consult($sql, $params = array())
        {
            try {
                $stmt=$this->pdo->prepare($sql);
                $stmt->execute($params);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die('Falha ao retornar o valor da consulta'.$e->getMessage());
            }
        }
        public function Execute($sql, $params = array())
        {
            try {
                $stmt=$this->pdo->prepare($sql);
                $stmt->execute($params);
                return $stmt->rowCount();
            } catch (PDOException $e) {
                die('falha ao executar '.$e->getMessage());
        }
        }
        public function ReturnAll($table)
        {
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM $table");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die('Erro ao retornar todos os valores da tabela '.$e->getMessage());
            }
        }
    }
?>