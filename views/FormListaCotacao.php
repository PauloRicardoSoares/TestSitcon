<?php

include '../models/Conexao.php';
include '../models/Manager.php';

$manager = new Manager();

$cotacao = $manager->listar('tbcotacao', 'tbprocedimento', 'IdProcedimento');


require_once './header.php';
?>

<body>
  <section class="container">
    <div class="content-header">
      <h1>
        Lista /
        <small>Cotação</small>
      </h1>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <!-- <div class="box-header col-xs-12 bg-primary">
            <div class="box-header col-xs-2  bg-primary">
              <a href="form_lancamento_cad.php" class="btn btn-block btn-info"><b>NOVO</b></a>
            </div>

            <form action="../controller/PequisarLancamentoController.php" method="post">
              <div class="box-header col-xs-10  bg-primary">
                <div class="input-group margin">
                  <div class="col-xs-5">
                    <input name="data_ini" type="date" class="form-control">
                  </div>
                  <div class="col-xs-5">
                    <input name="data_fim" type="date" class="form-control">
                  </div>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </div>
            </form>
          </div> -->

          <div class="box-body">
            <table class="table table-borderless table-striped table-hover ">
              <thead class="bg-primary text-white">
                <tr>
                  <th>Id</th>
                  <th>Fornecedor</th>
                  <th>Valor Fornecedor</th>
                  <th>Procedimento</th>
                  <th>Valor Procedimento</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <?php
              foreach ($cotacao as $cot) {

              ?>
                <tr>
                  <td><?php echo $cot['IdCotacao']; ?></td>
                  <td><?php echo $cot['NomeFornecedor']; ?></td>
                  <td>R$ <?php echo number_format($cot['ValorCotacao'], 2, ',', '.'); ?></td>
                  <td><?php echo $cot['Descricao']; ?></td>
                  <td>R$ <?php echo number_format($cot['ValorProc'], 2, ',', '.'); ?></td>
                  <td>
                    <a class="link-primary text-decoration-none" href="./FormAlteCotacao.php?id=<?php echo $cot['IdCotacao']; ?>" title="Editar">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    &nbsp;&nbsp;
                    <a class="link-danger text-decoration-none" href="../controllers/ApaCotacao.php?id=<?php echo $cot['IdCotacao'];?>" title="Excluir" onclick="return confirm('Deseja excluir este registro?')">
                      <i class="fa-regular fa-trash-can"></i>
                    </a>  
                  </td> 
                </tr>
              <?php
              }
              ?>
            </table>
          </div>
          <div class="form-group col-md-2">
                    <a href="../index.php" class="btn btn-block btn-warning col-md-12"><b>VOLTAR</b></a>
                </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>