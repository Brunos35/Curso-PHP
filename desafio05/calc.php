<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conversão para o dolar</title>
</head>
<body>
    <header>
        <h1>Resultado</h1>
    </header>
    <section>
    <?php
        $num = $_POST["num"] ?? 0;
        $int = (int) $num ;
        $frac = $num - $int; 

        echo " <ul><li>A parte inteira é <strong>$int</strong></li>";
        echo "<li>A parte fracionaria é <strong>$frac</strong></li></ul>";
    ?>
    </section>
</body>
</html>
