<?php
// Verifica se a mensagem foi enviada via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtem a mensagem do corpo da solicitação
    $message = $_POST['message'];

    // Conectar ao banco de dados MySQL
    $servername = "localhost";
    $username = "root";
    $password = "Root123@";
    $dbname = "testechat";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Insere a mensagem no banco de dados
    $sql = "INSERT INTO messages (sender, content) VALUES ('Usuario 1', '$message')";
    if ($conn->query($sql) === TRUE) {
        // Mensagem enviada com sucesso
        echo "Mensagem enviada com sucesso.";
    } else {
        echo "Erro ao enviar mensagem: " . $conn->error;
    }

    $conn->close();
}
?>
