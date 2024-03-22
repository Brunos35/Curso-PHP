document.addEventListener('DOMContentLoaded', function () {
    const chatContainer = document.getElementById('chat-container');
    const messageInput = document.getElementById('message-input');
    const sendButton = document.getElementById('send-button');

    sendButton.addEventListener('click', function () {
        const message = messageInput.value.trim();
        if (message !== '') {
            sendMessage(message);
            messageInput.value = '';
            messageInput.focus();
        }
    });

    function sendMessage(message) {
        const username = getUsername();
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'send_message.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Mensagem enviada com sucesso, exibe no chat
                    const messageId = xhr.responseText;
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message', 'sent');
                    messageElement.innerHTML = `<strong>${username}:</strong> ${message}`;
                    chatContainer.appendChild(messageElement);
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                } else {
                    // Tratar erro
                    console.error('Erro ao enviar mensagem:', xhr.status);
                }
            }
        };
        xhr.send(`username=${encodeURIComponent(username)}&message=${encodeURIComponent(message)}`);
    }

    function getUsername() {
        // Obtém o nome de usuário armazenado na sessão
        return localStorage.getItem('username');
    }
});
