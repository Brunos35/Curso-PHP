<?php
// Inicia a sessão para acessar as variáveis de sessão
session_start();


// Verifica se o usuário está logado
if (!isset($_SESSION["username"])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("Usuário não autenticado");
}

// Nome de usuário para depuração
$username = $_SESSION["username"];
echo "Nome de usuário: " . $username;


// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "Root123@";
$database = "testechat";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se a requisição é do tipo POST e se existem os parâmetros esperados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    // Obtém o nome de usuário e a mensagem enviados
    $username = $_SESSION["username"];
    $message = $_POST["message"];
    
    // Insere a mensagem no banco de dados
    $sql = "INSERT INTO chat_messages (sender, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $message);
    
    if ($stmt->execute()) {
        // Mensagem inserida com sucesso
        echo "Mensagem enviada com sucesso!";
    } else {
        // Erro ao inserir a mensagem
        header("HTTP/1.1 500 Internal Server Error");
        echo "Erro ao enviar mensagem: " . $conn->error;
    }
} else {
    // Requisição inválida
    header("HTTP/1.1 400 Bad Request");
    echo "Requisição inválida";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
