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
        $inicio = date("m-d-Y", strtotime("-7 days"));
        $fim = date("m-d-Y");//Fazendo com que as datas sejam atualizadas sempre

        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';// trazendo dados do BC

        $dados = json_decode(file_get_contents($url), true);
        
        $cot = $dados["value"]["0"]["cotacaoCompra"];//Pegando o valor da cotaçao atual dos dados do BC

        $num = $_POST["num"] ?? 0;// Valor informado no Form
        $valor = ($num / $cot);

        echo "Essa quantia R\$" . number_format($num,2)  ." equivale à U\$" .number_format($valor,2);
        ?>
    </section>
</body>
</html>
