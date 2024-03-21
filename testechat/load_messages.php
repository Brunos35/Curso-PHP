<?php
// Inclui o arquivo db_functions.php que contém as funções de manipulação do banco de dados
include 'db_functions.php';

// Carrega as mensagens do banco de dados
$messages = loadMessages();

// Gera o HTML das mensagens para enviar de volta para a página
$html = '';
foreach ($messages as $message) {
    $sender = htmlspecialchars($message['sender']);
    $messageText = htmlspecialchars($message['message']);
    $html .= '<div class="message"><strong>' . $sender . ':</strong> ' . $messageText . '</div>';
}

// Retorna o HTML das mensagens
echo $html;
?>
