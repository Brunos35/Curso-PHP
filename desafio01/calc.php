<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Resultado</h1>
    </header>
    <section>
        <?php
        $num = $_POST['num'];
        $suc = ($num+1);
        $ant = ($num-1);
        echo "O Sucessor é $suc <br>";
        echo "O Antecessor é $ant";
        ?>
    </section>
</body>
</html>
