<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Antecessor e Sucessor</title>
</head>

<body>
    <header>
        <h1>Sorteador de números</h1>
    </header>
    <section>
        <p>Ao clicar no botão um número aleatório entre 0 e 100 será escolhido <br></p>
        <?php
            $min = 0;
            $max = 100;
            $num = mt_rand($min , $max);
            echo "<p>O número sorteado foi $num</p>";
        ?>
        <button onclick="javascript:document.location.reload()">&#x1F504; Gerar outro</button>
    </section>

</body>

</html>