<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém as credenciais do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aqui você deve adicionar a lógica para consultar o banco de dados e verificar as credenciais
    // Vou fornecer um exemplo simples de conexão ao banco de dados e consulta
    $host = 'localhost';
    $db_username = 'root';
    $db_password = 'Root123@';
    $dbname = 'testechat';

    // Conecta ao banco de dados
    $conn = new mysqli($host, $db_username, $db_password, $dbname);

    // Verifica se houve algum erro na conexão
    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    // Consulta o banco de dados para verificar as credenciais
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Usuário autenticado com sucesso
        $_SESSION['username'] = $username; // Armazena o nome de usuário na sessão
        echo "<script>localStorage.setItem('username', '" . $_SESSION["username"] . "');</script>";
        header("Location: chatpage.php"); // Redireciona para a página do chat
    } else {
        // Credenciais inválidas, redireciona de volta para a página de login com uma mensagem de erro
        header("Location: login.html?error=1");
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Se o formulário não foi enviado via POST, redireciona de volta para a página de login
    header("Location: login.html");
}
?>
