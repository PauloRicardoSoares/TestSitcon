<?php

  include '../models/Conexao.php';
  include '../models/Manager.php';

  $manager = new Manager();

  $procedimento = $manager->listar('tbprocedimento');

    include_once './header.php';
?>
<body>
    <section class="container">
        <div class="content-header">
          <h1>
            Cadastro /
            <small>Cotação</small>
          </h1>
        </div>
        <form action="../controllers/CadCotacao.php" method="POST">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Fornecedor:</label>
                    <input type="text" name="NomeFornecedor" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Valor:</label>
                    <input type="number" step="0.01" name="ValorCotacao" class="form-control" required>
                </div>

                <div class="form-group col-5">
                    <label for="">Procedimento:</label>
                    <select class="form-select" required name="IdProcedimento" id="procedimento">

                    <option value="">Selecione</option>

                    <?php
                        foreach ($procedimento as $prod)
                        {
                    ?>
                    <option value="<?php echo $prod["IdProcedimento"]?>">
                     <?php echo $prod['Descricao'] 
                     ?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group col-2 mt-4">
                    <button type="submit" class=" btn btn-block btn-primary col-md-12"><b>SALVAR</b></button>     
                </div>
                <div class="form-group col-3 mt-4">
                    <button type="reset" class="btn btn-block btn-primary col-md-12"><b>CANCELAR</b></button>      
                </div>
                <div class="form-group col-2 mt-4">
                    <a href="../index.php" class="btn btn-block btn-warning col-md-12"><b>VOLTAR</b></a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>