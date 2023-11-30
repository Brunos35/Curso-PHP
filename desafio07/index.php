<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/style.css">
    <title>Salário mínimo</title>
</head>
<body>
    <header>
        <h1>Informe seu salário</h1>
    </header>
    <?php
        $sal = $_POST['sal'];
    ?>
    <main>        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="dividendo">Seu Salário</label>
            <input type="number" name="sal" id="sal" placeholder="Informe o seu salário" step="0.01"><br>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado final</h2>
        <?php 
            $div = $sal/1380;
            $int = intval($div);
            $frac = $sal - ($int*1380);

            echo "Seu salário equivale a $int salários minimos + R\$ $frac";
        ?>
    </section>
</body>
</html>