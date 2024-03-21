<?php
// Inclui o arquivo db_functions.php que contém as funções de manipulação do banco de dados
include 'db_functions.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos do formulário estão definidos e não estão vazios
    if (isset($_POST['username']) && isset($_POST['message']) && !empty($_POST['username']) && !empty($_POST['message'])) {
        // Obtém os dados do formulário
        $username = $_POST['username'];
        $message = $_POST['message'];

        // Insere a mensagem no banco de dados
        insertMessage($username, $message);
    }
}
?>
