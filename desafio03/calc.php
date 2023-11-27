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
        $dol = 4.90;
        $valor = ($num / $dol);
        echo "Essa quantia 'R$ $num' equiavale à U$ $valor";
        ?>
    </section>
</body>
</html>
