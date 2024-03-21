<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Inclui o arquivo db_functions.php que contém as funções de manipulação do banco de dados
include 'db_functions.php';

// Carrega as mensagens do banco de dados
$messages = loadMessages();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chat</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="chat-container">
    <h2>Chat</h2>
    <div class="messages-container" id="messages-container">
        <?php
        // Exibe as mensagens carregadas do banco de dados
        foreach ($messages as $message) {
            $sender = htmlspecialchars($message['sender']);
            $messageText = htmlspecialchars($message['message']);
            echo '<div class="message"><strong>' . $sender . ':</strong> ' . $messageText . '</div>';
        }
        ?>
    </div>
    <form id="message-form">
        <input type="text" id="message-input" placeholder="Digite sua mensagem...">
        <button type="submit">Enviar</button>
    </form>
</div>

<script src="script.js"></script>
</body>
</html>
