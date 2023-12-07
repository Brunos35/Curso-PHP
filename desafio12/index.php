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
        <h1>Informe o tempo</h1>
    </header>
    <?php
        $total = $_POST["total"];
    ?>
    <main>        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="valor">Informe o total de segundos: </label>
            <input type="number" name="total" id="total" min="0" placeholder="Informe o total de segundos" step="1"><br>

            <input type="submit" value="Calcular Idade">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado final</h2>
        <?php 
            $sobra = $total;
            //semanas
            $semana = intdiv($sobra , 604_800);
            $sobra = $sobra % 604_800;
            //dias
            $dia =intdiv($sobra , 86_400);
            $sobra = $sobra % 86_400;
            //horas
            $hora = intdiv($sobra , 3_600);
            $sobra = $sobra % 3_600;
            //minutos
            $min =intdiv($sobra , 60);
            $sobra = $sobra % 60;
            //segundos
            $seg = $sobra;
        ?>
        <h2><?=$total?> segundos equivalem à:</h2>
        <ul>
            <li><p><?=$semana?> Semanas</p></li>
            <li><p><?=$dia?> Dias</p></li>
            <li><p><?=$hora?> Horas</p></li>
            <li><p><?=$min?> Minutos</p></li>
            <li><p><?=$seg?> Segundos</p></li>
        </ul>
    </section>
</body>
</html>