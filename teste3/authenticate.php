<?php
session_start();

// Conectar ao banco de dados MySQL
$servername = "localhost";
$username = "root";
$password = "Root123@";
$dbname = "testechat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Obter email e senha do formulário de login
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta SQL para verificar as credenciais do usuário
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Login bem-sucedido, redireciona para a página de chat
    $_SESSION['loggedin'] = true;
    header('Location: index.html');
} else {
    // Login falhou, redireciona de volta para a página de login
    header('Location: login.html');
}

$conn->close();
?>
