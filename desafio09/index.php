<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/style.css">
    <title>Médias Arítmeticas</title>
</head>
<body>
    <header>
        <h1>Informe os números</h1>
    </header>
    <?php
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $peso1 = $_POST['peso1'];
        $peso2= $_POST['peso2'];
    ?>
    <main>        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="num1">Valor 1: </label>
            <input type="number" name="num1" id="num1" placeholder="Informe o primeiro valor" step="0.01"><br>

            <label for="peso1">Peso 1: </label>
            <input type="number" name="peso1" id="peso1" placeholder="Informe primeiro peso" step="0.01"><br>

            <label for="num1">Valor 2: </label>
            <input type="number" name="num2" id="num2" placeholder="Informe o segundo Valor" step="0.01"><br>

            <label for="num1">Peso 2: </label>
            <input type="number" name="peso2" id="peso2" placeholder="Informe o segundo peso" step="0.01"><br>
            <input type="submit" value="Calcular Médias">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado final</h2>
        <?php 
            $mediaA= ($num1 + $num2)/2;
            $mediaP= (($num1*$peso1)+($num2*$peso2))/($peso1 + $peso2);

            echo "<ul><li>A média simples é <strong>$mediaA</strong></li>";
            echo "<li>A média ponderada é <strong>$mediaP</strong></li></ul>";
        ?>
    </section>
</body>
</html>