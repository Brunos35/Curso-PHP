<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/style.css">
    <title>Divisão</title>
</head>
<body>
    <header>
        <h1>Faça sua divisão</h1>
    </header>
    <?php
        $dividendo = $_POST["dividendo"] ?? 0;
        $divisor= $_POST["divisor"] ?? 0;
    ?>
    <main>        
        <form action=" <?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="dividendo">Dividendo: </label>
            <input type="number" name="dividendo" id="dividendo" placeholder="Informe o Dividendo" step="0.1"><br>
            <label for="divisor">Divisor: </label>
            <input type="number" name="divisor" id="divisor" placeholder="Informe o Divisor" step="0.1"><br>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado da divisão</h2>
        <?php 
            $quo = intdiv($dividendo, $divisor);
            $resto = $dividendo % $divisor;
        ?>
        <table class="divisao">
            <tr>
                <td><?=$dividendo?></td>
                <td><?=$divisor?></td>
            </tr>
            <tr>
                <td><?=$resto?></td>
                <td><?=$quo?></td>
            </tr>
        </table>
    </section>
</body>
</html>