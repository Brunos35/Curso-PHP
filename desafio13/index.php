<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/style.css">
    <title>Calculadora de tempo</title>
</head>
<body>
    <header>
        <h1>Caixa eletrônico</h1>
    </header>
    <?php
        $total = $_POST["total"];
    ?>
    <main>        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="valor">Informe o valor do saque:<sup>*</sup></label>
            <input type="number" name="total" id="total" min="0" placeholder="Informe o quanto quer sacar" step="5" required ><br>
            <p style="font-size:0.7em"><sup>*</sup>Notas disponiveis: R$100, R$50, R$10, R$5</p>

            <input type="submit" value="Calcular Idade">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado final</h2>
        <?php 
            $resto = $total;

            $tot100= intdiv($resto , 100);
            $resto = $resto % 100;

            $tot50= intdiv($resto , 50);
            $resto = $resto % 50;

            $tot10 = intdiv($resto , 10);
            $resto %= 10;

            $tot5 = intdiv($resto , 5);
            $resto %= 5;
        ?>
        <h2><?=$total?> segundos equivalem à:</h2>
        <ul>
            <li><p><img src="imagens/100-reais.jpg">x<?=$tot100?></p></li>
            <li><p><img src="imagens/50-reais.jpg">x<?=$tot50?></p></li>
            <li><p><img src="imagens/10-reais.jpg">x<?=$tot10?></p></li>
            <li><p><img src="imagens/5-reais.jpg">x<?=$tot5?></p></li>
            
        </ul>
    </section>
</body>
</html>