<?php

    include '../models/Conexao.php';
    include '../models/Manager.php';

    $manager = new Manager();

    $procedimento = $manager->listar('tbprocedimento');
    $id = $_GET['id'];  
    $cotacao = $manager->getDados('tbcotacao', 'IdCotacao', $id);
    
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

                <input hidden type="text" name="Id" value="IdCotacao">

                <div class="form-group col-md-6">
                    <label for="">Id:</label>
                    <input type="text" readonly name="IdCotacao" value="<?php echo $id ?>" class="input-disable form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Fornecedor:</label>
                    <input type="text" name="NomeFornecedor" value="<?php echo $cotacao["NomeFornecedor"];?>" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Valor:</label>
                    <input type="number" step="0.01" value="<?php echo $cotacao["ValorCotacao"];?>" name="ValorCotacao" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Procedimento:</label>
                    <select class="form-control" name="IdProcedimento" id="procedimento">

                    <option value="">Selecione</option>

                    <?php
                        foreach ($procedimento as $prod)
                        {
                    ?>
                    <option value="<?php echo $prod["IdProcedimento"]?>" <?php echo ($prod['IdProcedimento'] === $cotacao['IdProcedimento']) ? "selected" : "" ;?>>
                     <?php echo $prod['Descricao'];   ?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group col-2">
                    <button type="submit" class="mt-3 btn btn-block btn-primary col-12"><b>SALVAR</b></button>     
                </div>
                <div class="form-group col-3">
                    <button type="reset" class=" mt-3 btn btn-block btn-primary col-12"><b>CANCELAR</b></button>      
                </div>
                <div class="form-group col-2">
                    <a href="./FormListaCotacao.php" class="mt-3 btn btn-block btn-warning col-12"><b>VOLTAR</b></a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>