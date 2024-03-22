<?php
session_start();
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "Root123@";
$database = "testechat";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se a requisição é do tipo POST e se existem os parâmetros esperados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
    // Obtém o e-mail e a senha enviados
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Consulta o banco de dados para encontrar o usuário com o e-mail e a senha correspondentes
    $sql = "SELECT username FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Usuário autenticado com sucesso
        session_start();
        $_SESSION["username"] = $result->fetch_assoc()["username"];
        echo "<script>localStorage.setItem('username', '" . $_SESSION["username"] . "');</script>";
        echo "Login bem-sucedido";
    } else {
        // Credenciais inválidas
        header("HTTP/1.1 401 Unauthorized");
        echo "Credenciais inválidas";
    }
} else {
    // Requisição inválida
    echo "Requisição inválida";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
