<?php
require_once 'user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $user = new User();

    if ($user->logar($email, $senha)) {
         echo "Login Realizado";
        } else {
            echo "Falha ao fazer login.";
        }
    
    
}