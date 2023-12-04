<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/style.css">
    <title>Raízes</title>
</head>
<body>
    <header>
        <h1>Informe um número</h1>
    </header>
    <?php
        $num = $_POST['num'];
    ?>
    <main>        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="dividendo">Número</label>
            <input type="number" name="num" id="num" placeholder="Informe o seu salário" step="0.01"><br>
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado final</h2>
        <?php 
            $quad = sqrt($num);
            $cub = $num ** (1/3);

            echo "<ul><li>A raíz quadrada de $num é $quad<l/i>";
            echo "<li>A raíz cúbica de $num é $cub</li></ul>"
        ?>
    </section>
</body>
</html>