<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/style.css">
    <title>Calcular Idade</title>
</head>
<body>
    <header>
        <h1>Informe os Anos</h1>
    </header>
    <?php
        $anoN = $_POST['anoN'];
        $anoA = $_POST['anoA'];
    ?>
    <main>        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="anoN">Ano do seu Nascimento</label>
            <input type="number" name="anoN" id="anoN" placeholder="Informe o ano em que Nasceu" step="0.01"><br>

            <label for="anoN">Ano Atual (Estamos em <?=date("Y")?>)</label>
            <input type="number" name="anoA" id="anoA" placeholder="Informe o ano atual" step="0.01"><br>

            <input type="submit" value="Calcular Idade">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado final</h2>
        <?php 
            $idade = $anoA - $anoN;
           echo "Quem nasceu em $anoN, em $anoA, tem $idade anos"
        ?>
    </section>
</body>
</html>