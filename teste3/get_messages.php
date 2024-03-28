<?php
// Conectar ao banco de dados MySQL
$servername = "localhost";
$username = "root";
$password = "Root123@";
$dbname = "testechat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta para buscar mensagens do banco de dados
$sql = "SELECT sender, content FROM messages ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

$messages = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $messages[] = array(
            'sender' => $row['sender'],
            'content' => $row['content']
        );
    }
}

$conn->close();

// Retorna mensagens como JSON
header('Content-Type: application/json');
echo json_encode($messages);
?>
