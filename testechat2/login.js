document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio do formulário

    // Obtenha os dados do formulário
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Envie os dados do formulário para o servidor
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`,
    })
    .then(response => {
        if (response.ok) {
            // Login bem-sucedido
            console.log('Login bem-sucedido');
            // Redirecionar para outra página, se necessário
            window.location.href = 'chat.html';
        } else {
            // Login falhou
            console.error('Login falhou');
            // Exibir mensagem de erro para o usuário, se necessário
        }
    })
    .catch(error => {
        console.error('Erro durante a solicitação:', error);
        // Exibir mensagem de erro para o usuário, se necessário
    });
});
