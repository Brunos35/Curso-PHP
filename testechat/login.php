<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <?php
    // Verifica se há uma mensagem de erro na URL
    if (isset($_GET['error'])) {
        echo '<p class="error-message">Usuário ou senha incorretos. Por favor, tente novamente.</p>';
    }
    ?>
    <form action="authenticate.php" method="POST">
        <div class="form-group">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
