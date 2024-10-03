<?php

function formataData($var)
{
    if ($var <> '') {

        return (substr($var, 8, 2) . '/' . substr($var, 5, 2) . '/' . substr($var, 0, 4));
    }
};

function getServerIpFromUrl($url)
{
    // Parseia o URL e retorna seus componentes
    $parsedUrl = parse_url($url);

    // Verifica se há um host no URL
    if (isset($parsedUrl['host'])) {
        $host = $parsedUrl['host'];

        // Verifica se há uma porta e a inclui no retorno
        if (isset($parsedUrl['port'])) {
            return $host . ':' . $parsedUrl['port'];
        }

        return $host; // Retorna apenas o host se não houver porta
    }

    return null; // Retorna null se não houver um host no URL
}

// Pega a URL completa da requisição
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Obtém o IP do servidor a partir da URL
$serverIp = getServerIpFromUrl($url);

//echo $serverIp;

require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Configurações do Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Permite o carregamento de imagens remotas
$dompdf = new Dompdf($options); // Cria uma instância do Dompdf com as opções

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantidade_de = intval($_POST['quantidade_de']);
    $quantidade_ate = intval($_POST['quantidade_ate']);
    $valorRifa = htmlspecialchars($_POST['valor_rifa']);
    $pix = htmlspecialchars($_POST['pix']);
    $premio = htmlspecialchars($_POST['premio']);
    $data_sorteio = date('d/m/Y', strtotime($_POST['data_sorteio']));

    $html = '
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ação Entre Amigos</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-size: 12px;
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            .page {
                width: 100%;
                padding: 5px;
                margin: 0;
                box-sizing: border-box;
                page-break-after: always; /* Quebra de página ao final de cada .page */
            }

            .grid-container {
                display: grid;
                grid-template-columns: repeat(2, 1fr); /* Mantém duas rifas por linha */
                grid-auto-rows: minmax(140px, auto); /* Ajusta a altura mínima */
                gap: 10px; /* Reduz espaço entre rifas */
                margin-bottom: 5px;
            }

            .ticket {
                border: 1px solid #ddd;
                margin-bottom: 2px;
                padding: 18px 25px 8px 20px; /* Reduz padding para ocupar menos espaço */
                position: relative;
                height: 150px; /* Reduzir a altura das rifas */
                box-sizing: border-box;
                page-break-inside: avoid; /* Evita quebra dentro de uma rifa */
                break-inside: avoid; /* Compatibilidade com navegadores modernos */
            }

            .left, .right {
                display: inline-block;
                vertical-align: top;
            }

            .left {
                width: 40%; /* Ajusta a largura do canhoto */
                border-right: 1px dashed #ddd;
                padding-right: 3px;
                box-sizing: border-box;
            }

            .right {
                width: 55%;
                padding-left: 5px;
                box-sizing: border-box;
            }

            .right .prize {
                border: 1px solid #333;
                padding: 8px; /* Reduz padding do campo de prêmio */
                text-align: center;
                margin-bottom: 8px; /* Reduz margem inferior */
            }

            .highlight {
                color: red;
                font-weight: bold;
            }

            .small-text {
                font-size: 0.7rem;
            }

            .pix {
                position: absolute;
                bottom: 8px; /* Ajusta a posição do campo PIX */
                right: 45px;
                font-weight: bold;
                font-size: 0.75rem; /* Ajusta tamanho da fonte do PIX */
            }

            .ticket p {
                margin: 1px 0; /* Margens menores para ocupar menos espaço */
            }

            h4 {
                margin: 0 0 2px 0; /* Reduz a margem do título */
                font-size: 0.95rem; /* Ajusta tamanho da fonte */
                text-align: center;
            }

            /* Reduz margens da página A4 */
            @page {
                margin: 10px 10px; /* Define margens superior e inferior menores */
            }

            /* Força quebra de página quando necessário */
            .ticket {
                page-break-inside: avoid;
            }
        </style>
    </head>
    <body>
    <div class="page">
        <div class="grid-container">';

    // Gerar as rifas
    for ($i = $quantidade_de; $i <= $quantidade_ate; $i++) {
        $html .= '
        <div class="ticket">
            <div class="left">
                <p><strong>Nome</strong></p>
                <p>____________________________________</p>

                <p><strong>Telefone</strong></p>
                <p>____________________________________</p>

                <p><strong>&nbsp;</strong></p>

                <p><strong>Nº 00' . $i . '</strong></p>
                
            </div>

            <div class="right">
                <h4 class="text-center">AÇÃO ENTRE AMIGOS</h4>
                
                <div class="prize">
                    <p><strong>PRÊMIO</strong></p>
                    <p class="highlight">' . $premio . '</p>
                </div>

                <p><strong>VALOR DA RIFA: R$ ' . $valorRifa . '</strong></p>

                <p><strong>Sorteio: ' . $data_sorteio . '</strong></p>

                <p><strong>Nº 00' . $i . '</strong></p>
            </div>

            <div class="pix">
                PIX: ' . $pix . '
            </div>
        </div>';
    }

    // Fechamento do HTML
    $html .= '
        </div>
    </div>
    </body>
    </html>';
}
//echo $html;

// Carrega o HTML no Dompdf
$dompdf->loadHtml($html);

// Define o tamanho e a orientação da página (opcional)
$dompdf->setPaper('A4', 'portrait');

// Renderiza o HTML como PDF
$dompdf->render();

// Exibe o PDF no navegador
$nomeArquivo = sprintf("rifas.pdf");
$dompdf->stream($nomeArquivo, array("Attachment" => false));



$hasResults = false;
