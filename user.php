<?php

require_once 'connect.php';
class User
{
    private $connection;
    public function __construct()
    {
        $dbConnection = new Connect('localhost', 'db_facs', 'root', '');
        $this->connection = $dbConnection;
    }


    public function cadastrar($email, $senha)
    {
        try {
            // Verificar se o email já existe
            $sql = "SELECT * FROM usuario WHERE email = ?";
            $user = $this->connection->Consult($sql, array($email));

            if (count($user) > 0) {
                echo "Email já cadastrado.";
                return false;
            }

            // Se o email não existir, insira o novo usuário
            $sql = "INSERT INTO usuario (email, senha_hash) VALUES (?, ?)";
            $stmt = $this->connection->Execute($sql, array($email, password_hash($senha, PASSWORD_DEFAULT)));

            return true;

        } catch (PDOException $e) {
            die('Falha ao registrar o usuário: ' . $e->getMessage());
        }
    }
}
?>
