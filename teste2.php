<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .ticket {
            display: flex;
            border: 1px solid #000;
            width: 100%;
            max-width: 800px;
            height: 200px;
            background: #f8f0df;
            position: relative;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }
        .left {
            background: #d1e7d5;
            padding: 20px;
            border-right: 2px dashed #000;
            width: 70%;
            position: relative;
        }
        .right {
            padding: 20px;
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .left h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
            padding-bottom: 10px;
        }
        .left .prize {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .left .date {
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .left .price {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .left .pix {
            font-size: 0.9rem;
            font-weight: bold;
        }
        .right h4 {
            font-size: 0.9rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .right .info {
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        .ticket-number {
            font-size: 0.9rem;
            font-weight: bold;
            position: absolute;
            left: 10px;
            top: 10px;
            transform: rotate(-90deg);
        }
    </style>
</head>
<body>

<div class="ticket">
    <div class="left">
        <div class="ticket-number">RIFA = 01</div>
        <h2>Rifa da Felicidade!</h2>
        <div class="prize">Prêmio: R$500,00</div>
        <div class="date">Sorteio dia: <strong>14 de novembro de 2024</strong></div>
        <div class="price">R$5,00</div>
        <div class="pix">Pagamento em pix: 073.896.581-26</div>
    </div>
    <div class="right">
        <h4>RIFA = 01</h4>
        <div class="info"><strong>Nome:</strong> ______________________</div>
        <div class="info"><strong>Telefone:</strong> ___________________</div>
        <div class="info"><strong>Email:</strong> ______________________</div>
    </div>
</div>

</body>
</html>