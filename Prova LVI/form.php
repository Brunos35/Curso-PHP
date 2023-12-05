<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahea Burger</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/mediaquery.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <?php 
    $nome = $_POST["nome"];
    $tel = $_POST["num"];
    ?>
    <header>
        <h1>Bahea burger</h1>
        <ul>
            <li><a href="páginas/cardapio.html">Cardápio</a></li>
            <li><a href="páginas/pedido.php">Faça seu pedido</a></li>
            
        </ul>
    </header>
    <main>
        <div id="princip">
            <h1>Olá <?=$nome?>, venha conhecer os nosso lanches através do nosso <a href="páginas/cardapio.html">Cardápio</a></h1>
            <p><a href="páginas/pedido.php">Faça seu pedido aqui</a></p>
        </div>
    </main>
</body>
</html>