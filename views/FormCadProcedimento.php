<!DOCTYPE html>
<html lang="en">
<?php
    include_once './header.php';
?>
<body>
    <section class="container">        
        <div class="content-header">
          <h1>
            Cadastro /
            <small>Procedimento</small>
          </h1>
        </div>
        <form action="../controllers/CadProcedimento.php" class="row" method="POST">
                <div class="form-group col-md-6">
                    <label for="">Descrição:</label>
                    <input type="text" name="descricao" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Valor:</label>
                    <input type="number" step="0.01" name="ValorProc" class="form-control" required>
                </div>

                <div class="form-group col mt-3">
                    <button type="submit" class=" btn btn-block btn-primary col-md-12"><b>SALVAR</b></button>     
                </div>
                <div class="form-group col mt-3">
                    <button type="reset" class="btn btn-block btn-primary col-md-12"><b>CANCELAR</b></button>      
                </div>
                <div class="form-group col mt-3">
                    <a href="../index.php" class="btn btn-block btn-warning col-md-12"><b>VOLTAR</b></a>
                </div>
        </form>
    </section>
</body>
</html>