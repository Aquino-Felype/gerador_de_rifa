<!DOCTYPE html>
<html lang="pt-br">
<?php
$pageTitle = "Gerar Rifas"; // Definir o título da página aqui
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<body>

    <div class="container-fluid">
        <div class="row">
            <?php include('lateral.php'); ?>

            <main class="col-md-9 col-lg-10 content">
                <div class="wrapper candidato">
                    <div class="container-fluid">

                        <div class="card-box mt-3">
                            <div class="row">

                                <div class="col-12">
                                    <form method="post">
                                        <div class="form-row mb-3">
                                            <div class="col-12 text-left">
                                                <button type="button" class="btn btn-primary" id="openModalBtn">
                                                    <span>Gerar Rifas</span>
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="validadeModal" tabindex="-1" aria-labelledby="validadeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="validadeModalLabel">Escolha a quantidade de rifas</h5>
                    <button type="button" class="btn-close" id="closeModalBtn" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rifaForm" method="POST" action="gerador.php">
                        <label for="quantidade">Digite o valor da rifas:</label>
                        <input type="text" id="valor_rifa" name="valor_rifa" class="form-control" placeholder="Ex: 5,00" required>

                        <label for="quantidade">Digite a quantidade de rifas de:</label>
                        <input type="number" id="quantidade" name="quantidade_de" class="form-control" placeholder="Ex: 1" required>

                        até:
                        <input type="number" id="quantidade" name="quantidade_ate" class="form-control" placeholder="Ex: 100" required>

                        <label for="pix">Digite o pix (Email, CPF/CNPJ ou Telefone):</label>
                        <input type="text" id="pix" name="pix" class="form-control" placeholder="Ex: (00) 00000-0000" required>

                        <label for="premio">Digite o prêmio:</label>
                        <input type="text" id="premio" name="premio" class="form-control" placeholder="Ex: R$ 500,00" required>

                        <label for="data_sorteio">Data do sorteio:</label>
                        <input type="date" id="data_sorteio" name="data_sorteio" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModalBtnFooter">Fechar</button>
                    <button type="submit" class="btn btn-primary" form="rifaForm">Gerar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Função para abrir o modal
        document.getElementById('openModalBtn').onclick = function() {
            $('#validadeModal').modal('show');
        };

        // Fechar o modal ao clicar no botão "Fechar"
        document.getElementById('closeModalBtn').onclick = function() {
            $('#validadeModal').modal('hide');
        };

        // Fechar o modal ao clicar no botão "Fechar" no rodapé
        document.getElementById('closeModalBtnFooter').onclick = function() {
            $('#validadeModal').modal('hide');
        };
    </script>

</body>

</html>