<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // O usuário está logado
    http_response_code(200);
} else {
    // O usuário não está logado
    http_response_code(401);
}
?>
