<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/style.css">
    <title>Calcular reajuste</title>
</head>
<body>
    <header>
        <h1>Informe os valores</h1>
    </header>
    <?php
        $valor = $_POST["valor"];
        $percent = $_POST["percent"]
    ?>
    <main>        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="valor">Valor a ser reajustado(em R$): </label>
            <input type="number" name="valor" id="valor" placeholder="Informe o valor a ser reajustado" step="0.01"><br>

            <label for="percent">Percentual de reajuste: (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" name="percent" id="percent" min="0" max="100" step="1" oninput="mudaValor()">

            <input type="submit" value="Calcular Idade">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado final</h2>
        <?php 
            $reajustado = ($valor *($percent/100)) + $valor;

            echo "O valor antigo era $valor e foi reajustado em $percent%, O valor final é $reajustado.";
        ?>
    </section>
    <script>
        mudaValor()

        function mudaValor(){
            p.innerText= percent.value
        }
    </script>
</body>
</html>