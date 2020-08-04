<div class="container-fluid">
    <h3 class="text-dark mb-1">Produtos</h3>

    <div class="row mt-3 mb-3 text-right">
    	<div class="col-lg-12">
        <a href="<?php echo base_url('paineladmin/produto/modulo/')?>" title="Novo" class="btn btn-primary"><i class="fas fa-plus"></i>Novo Produto</a></p>
      </div>
    </div>
    
    

<div class="row mt-3">
            <div class="table-responsive">
              <table class="table table-striped" id="orderprodutos" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr class="filters">
                    <th scope="col" class=" text-center">ITEM</th>
                    <th scope="col" class=" text-center">VALOR</th>
                    <th scope="col" class=" text-center">QUANTIDADE</th>
                    <th scope="col" class=" text-center">TIPO</th>
                    <th scope="col" class=" text-center"></th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($produtos as $lista){ ?>
                  <tr class="<?php echo ' ';?>">
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->nome_produto ?></td>
                    <td class="text-center text-dark font-weight-bold">R$ <?php echo $lista->valor?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->quantidade?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->nome_tipo_produto?></td>
                    <td class="text-center text-dark font-weight-bold"><a href="<?php echo base_url('paineladmin/produto/modulo/'.$lista->{'id_produto'})?>" title="Alterar" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
</div>
