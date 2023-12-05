<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahea Burger</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="../estilos/mediaquery.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        h1{ text-align: center;}
        h2{padding: 10px; text-align: center;}
    </style>
</head>
<body>
    <header>
        <h1>Seu pedido</h1>
        <ul>
            <li><a href="cardapio.html">Cardápio</a></li>
            <li><a href="pedido.php"></a>Faça outro pedido</li>
        </ul> 
    </header>

    <main>
        <div id="princip">
            <?php
            $pedido = $_POST["pedido"];
            $quant = $_POST["quant"];
            if($pedido=='Bahea'){
                $valor = 25 * $quant;
                echo"<h1>Olá você escolheu $quant $pedido</h1>";
                echo"<h1>Seu pedido ficou R\$$valor</h1>";

            }elseif($pedido=='Pelourinho'){
                $valor = 28 * $quant;
                echo"<h1>Olá você escolheu $quant $pedido</h1>";
                echo"<h1>Seu pedido ficou R\$$valor</h1>";
            }elseif($pedido=='Salvador'){
                $valor = 30 * $quant;
                echo"<h1>Olá você escolheu $quant $pedido</h1>";
                echo"<h1>Seu pedido ficou R\$$valor</h1>";
            }else{
                $valor = 20 * $quant;
                echo"<h1>Olá você escolheu $quant $pedido</h1>";
                echo"<h1>Seu pedido ficou R\$$valor</h1>";
            }
            
            ?>
            <h2>Uma notificação será enviada para o seu número no momento em que seu pedido sair para entrega</h2>
        </div>
    </main>
</body>
</html>