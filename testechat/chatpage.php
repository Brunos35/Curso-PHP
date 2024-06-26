<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chat entre Usuários</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }
    .container {
        width: 400px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .chat-box {
        height: 300px;
        overflow-y: auto;
        padding: 10px;
    }
    .message {
        margin-bottom: 10px;
    }
    .message.sent {
        text-align: right;
    }
    .message.received {
        text-align: left;
    }
    .message p {
        background-color: #f1f1f1;
        padding: 8px 12px;
        border-radius: 10px;
        display: inline-block;
        max-width: 70%;
    }
    .sender {
        font-weight: bold;
        margin-bottom: 5px;
    }
    .input-box {
        padding: 10px;
        background-color: #f9f9f9;
        border-top: 1px solid #ddd;
    }
    .input-box input[type="text"] {
        width: calc(100% - 20px);
        padding: 8px;
        border: none;
        border-radius: 20px;
        outline: none;
    }
    .input-box button {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 20px;
        cursor: pointer;
    }
    .input-box button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <div class="chat-box" id="chatBox">
        <!-- Mensagens do chat serão inseridas aqui -->
    </div>
    <div class="input-box">
        <input type="text" id="messageInput" placeholder="Digite sua mensagem...">
        <button onclick="sendMessage()">Enviar</button>
    </div>
</div>

<script>
    
    function sendMessage() {
    
    var messageInput = document.getElementById('messageInput');
    var message = messageInput.value;
    var usuario = localStorage.getItem('username');
    if (message.trim() !== '') {
        var xhr = new XMLHttpRequest();
    var params = 'sender= ' + usuario + '&message=' + encodeURIComponent(message);
        xhr.open('POST', 'chat.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Atualiza a caixa de chat após enviar a mensagem
                loadMessages();
            }
        }
        xhr.send(params);
        messageInput.value = '';
    }
}

function loadMessages() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'chat.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var messages = JSON.parse(xhr.responseText);
            var chatBox = document.getElementById('chatBox');
            chatBox.innerHTML = '';
            messages.forEach(function(msg) {
                var newMessage = document.createElement('div');
                newMessage.classList.add('message');
                newMessage.classList.add(msg.sender === 'Usuário' ? 'sent' : 'received');
                newMessage.innerHTML = '<p><span class="sender">' + msg.sender + ': </span>' + msg.message + '</p>';
                chatBox.appendChild(newMessage);
            });
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    }
    xhr.send();
}

// Chama a função para carregar as mensagens quando a página é carregada
window.onload = function() {
    loadMessages();
}


</script>
</body>
</html>
