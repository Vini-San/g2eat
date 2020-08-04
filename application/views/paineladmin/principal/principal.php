<div class="container-fluid">
    <h3 class="text-dark mb-1">Pedidos</h3>

    
    

<div class="row mt-3">
            <div class="table-responsive">
              <table class="table table-striped" id="orderpedidos" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr class="filters">
                    <th scope="col" class=" text-center">CLIENTE</th>
                    <th scope="col" class=" text-center">TELEFONE</th>
                    <th scope="col" class=" text-center">TIPO DE ENTREGA</th>
                    <th scope="col" class=" text-center">SITUAÇÃO FINANCEIRA</th>
                    <th scope="col" class=" text-center">VALOR DO PEDIDO</th>
                    <th scope="col" class=" text-center">CONFIRMAR ENTREGA</th>
                    <th scope="col" class=" text-center"></th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($pedidosgerais as $lista){ ?>
                  <tr class="<?php echo ' ';?>">
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->nome_cliente ?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->telefone_cliente?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->tb_tipo_pedido?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->nome_situacao_financeira?></td>
                    <td class="text-center text-dark font-weight-bold">R$ <?php echo $lista->valor_pedido?></td>
                    
                    <?php if ($lista->id_situacao_entrega==1){
                      $color = "style='color:red'";
                    } else {
                      $color = "style='color:green'";
                    } ?>
                    <td class="text-center text-dark font-weight-bold"><a href="<?php echo base_url('paineladmin/produto/modulo/'.$lista->{'id_pedido'})?>" title="Confirmar"><i class="fas fa-check" <?php echo $color; ?>></i></a></td>
                    <?php echo '<td class="text-center text-dark font-weight-bold"><div class="btn-primary btn-circle" data-toggle="modal" title="Ver Pedido" id="botaoAtivarModalInfoPedido" onclick="preencheModalInfoPedido(\''.base_url().'\', \''.$lista->{'id_pedido'}.'\', \''.$lista->{'valor_pedido'}.'\');"><i class="fas fa-eye"></i></div></td>';?>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="modal fade" id="infomodal" tabindex="-1" role="dialog" aria-labelledby="infomodal" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="overflow-y: initial !important" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><div id="headerModal"> </div></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="overflow-y: auto; height: 450px;">
                  <div class="card-body mt-2">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover" width="100%" cellspacing="0" id="tabela-produtos">
                      <thead class="thead-dark">
                      <tr>
                      <th scope="col" class="text-center">Produto</th>
                      <th scope="col" class="text-center">Quantidade</th>
                      <th scope="col" class="text-center">Preço</th>
                      </tr>
                      </thead>
                      <tbody>
                      <!--código da tabela?-->

                      </tbody>
                      </table>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-6 col align-self-end" id="totalproduto">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
