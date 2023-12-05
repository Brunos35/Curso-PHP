<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahea Burger</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="../estilos/mediaquery.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <header>
        <h1>Faça seu pedido</h1>
        <ul>
            <li><a href="cardapio.html">Cardápio</a></li>
        </ul>   
    </header>
    <main>
        <div id="princip">
            <form action="final.php" method="post">
                <div id="pedido">
                    <label for="pedido">Escolha seu hamburguer: </label>
                    <select name="pedido" id="pedido">
                        <option value="Bahea">Bahea hamburguer</option>
                        <option value="Pelourinho">Pelourinho</option><br>
                        <option value="Salvador">Salvador</option>
                        <option value="Infantil">Hamburguer infantil</option>
                    </select>
                </div>
                <br>
                <div id="pedido">
                    <label for="quant">Quantidade: </label>
                    <input type="number" name="quant" id="quant">
                </div>
                <input type="submit" value="Enviar" id="pedido">
            </form>
        </div>
    </main>
</body>
</html>