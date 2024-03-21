<?php
// Função para conectar ao banco de dados
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "Root123@";
    $dbname = "testechat";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    return $conn;
}

// Função para autenticar o usuário
function authenticateUser($username, $password) {
    $conn = connectDB();

    // Prepare a consulta SQL para encontrar o usuário com o nome de usuário e senha fornecidos
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Executa a consulta
    $stmt->execute();

    // Obtém o resultado da consulta
    $result = $stmt->get_result();

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        // Retorna os dados do usuário
        return $result->fetch_assoc();
    } else {
        // Retorna falso se o usuário não foi encontrado
        return false;
    }

    // Fecha a conexão e libera os recursos
    $stmt->close();
    $conn->close();
}

// Função para carregar as mensagens do banco de dados
function loadMessages() {
    $conn = connectDB();

    // Prepare a consulta SQL para carregar as mensagens
    $sql = "SELECT * FROM messages ORDER BY id DESC";
    $result = $conn->query($sql);

    // Array para armazenar as mensagens
    $messages = array();

    // Verifica se há mensagens
    if ($result->num_rows > 0) {
        // Adiciona cada mensagem ao array
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }

    // Fecha a conexão e retorna as mensagens
    $conn->close();
    return $messages;
}

// Função para enviar uma mensagem
function insertMessage($username, $message) {
    $conn = connectDB();

    // Prepare a consulta SQL para inserir a mensagem no banco de dados
    $stmt = $conn->prepare("INSERT INTO messages (sender, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $message);

    // Executa a consulta
    $stmt->execute();

    // Fecha a conexão e libera os recursos
    $stmt->close();
    $conn->close();
}
?>
