<?php
require_once 'user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($senha === $confirmar_senha) {

        $user = new User();

        if ($user->cadastrar($email, $senha)) {
            echo "Usuário registrado com sucesso!";
        } else {
            echo "Falha ao registrar o usuário.";
        }
    } else {
        echo "As senhas não coincidem!";
    }
}
?>