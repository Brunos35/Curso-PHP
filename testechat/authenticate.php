<?php
// Inclua o arquivo db_functions.php que contém as funções de manipulação do banco de dados
include 'db_functions.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o usuário existe no banco de dados
    $user = authenticateUser($username, $password);

    if ($user !== false) {
        // Usuário autenticado com sucesso, redireciona para o chat
        session_start();
        $_SESSION['username'] = $username;
        header("Location: chat.php");
        exit;
    } else {
        // Usuário não autenticado, redireciona de volta para a página de login com uma mensagem de erro
        header("Location: login.php?error=1");
        exit;
    }
}
?>
