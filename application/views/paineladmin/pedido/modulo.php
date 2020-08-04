<div class="container-fluid">
    <h3 class="text-dark mb-1">Pedidos</h3>

    
    

<div class="row mt-3">
            <div class="table-responsive">
              <table class="table table-striped" id="orderpedidos" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr class="filters">
                    <th scope="col" class=" text-center">CLIENTE</th>
                    <th scope="col" class=" text-center">TELEFONE</th>
                    <th scope="col" class=" text-center">SITUAÇÃO ENTREGA</th>
                    <th scope="col" class=" text-center">SITUAÇÃO FINANCEIRA</th>
                    <th scope="col" class=" text-center">VALOR DO PEDIDO</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($pedidosgerais as $lista){ ?>
                  <tr class="<?php echo ' ';?>">
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->pedido_titular ?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->telefone?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->nome_situacao_entrega?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->nome_situacao_financeira?></td>
                    <td class="text-center text-dark font-weight-bold">R$ <?php echo $lista->valor_pedido?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
</div>
