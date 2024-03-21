// Função para carregar as mensagens do chat
function loadMessages() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'load_messages.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('messages-container').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Função para enviar uma mensagem
function sendMessage() {
    var messageInput = document.getElementById('message-input').value;
    var usernameInput = document.getElementById('username-input').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_message.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Atualiza a lista de mensagens após enviar a mensagem
            loadMessages();
            // Limpa o campo de entrada após enviar a mensagem
            document.getElementById('message-input').value = '';
        }
    };
    xhr.send('username=' + encodeURIComponent(usernameInput) + '&message=' + encodeURIComponent(messageInput));
}

// Carrega as mensagens do chat quando a página é carregada
window.onload = function() {
    loadMessages();
};

// Atualiza as mensagens do chat a cada 5 segundos
setInterval(function() {
    loadMessages();
}, 5000); // 5000 milissegundos = 5 segundos
