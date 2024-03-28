function fetchMessages() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const messages = JSON.parse(xhr.responseText);
                const messagesDiv = document.getElementById('messages');
                messagesDiv.innerHTML = '';
                messages.forEach(message => {
                    const messageDiv = document.createElement('div');
                    messageDiv.textContent = `${message.sender}: ${message.content}`;
                    messagesDiv.appendChild(messageDiv);
                });
            } else {
                console.error('Erro ao buscar mensagens:', xhr.status);
            }
        }
    };
    xhr.open('GET', 'get_messages.php', true);
    xhr.send();
}

function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const message = messageInput.value.trim();
    if (message !== '') {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    fetchMessages(); // Atualiza as mensagens após enviar a nova mensagem
                    messageInput.value = ''; // Limpa o campo de entrada
                } else {
                    console.error('Erro ao enviar mensagem:', xhr.status);
                }
            }
        };
        xhr.open('POST', 'send_message.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(`message=${encodeURIComponent(message)}`);
    }
}

// Verifica se o usuário está logado
function checkLogin() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Usuário está logado, carrega a página do chat
                window.location.href = 'index.html';
            } else {
                // Usuário não está logado, mantém na página de login
            }
        }
    };
    xhr.open('GET', 'check_login.php', true);
    xhr.send();
}

// Verifica o status de login ao carregar a página
checkLogin();

// Atualiza as mensagens a cada 5 segundos
setInterval(fetchMessages, 5000);

// Inicializa as mensagens
fetchMessages();
