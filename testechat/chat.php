<?php
// Configurações do banco de dados
$host = 'localhost';
$username = 'root';
$password = 'Root123@';
$database = 'testechat';

// Função para conectar ao banco de dados
function connectDB() {
    global $host, $username, $password, $database;
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }
    return $conn;
}

// Função para salvar mensagem no banco de dados


function saveMessage($sender, $message) {
    $conn = connectDB();
    $sender = $conn->real_escape_string($sender).`echo '<script>localStorage.getItem('username')</script>'`;
    $message = $conn->real_escape_string($message);
    $sql = "INSERT INTO messages (sender, message) VALUES ('$sender', '$message')";
    if ($conn->query($sql) === FALSE) {
        echo "Erro ao salvar mensagem: " . $conn->error;
    }
    $conn->close();
}

// Função para carregar mensagens do banco de dados
function loadMessages() {
    $conn = connectDB();
    $sql = "SELECT * FROM messages";
    $result = $conn->query($sql);
    $messages = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }
    $conn->close();
    return $messages;
}

// Verifica se a requisição é um POST e se contém uma mensagem
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $sender = isset($_POST['sender']) ? $_POST['sender'] : 'Usuário';
    $message = $_POST['message'];
    saveMessage($sender, $message);
    exit; // Termina a execução do script após salvar a mensagem
}

// Verifica se a requisição é um GET para carregar mensagens
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    $messages = loadMessages();
    echo json_encode($messages);
    exit; // Termina a execução do script após enviar as mensagens
}
?>
