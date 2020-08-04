<div class="container-fluid">
<?php
errosValidacoes();
getMsg('msgCadastro');
?>
    <div class="row mt-3 mb-3 text-right">
			<div class="col-lg-12">
			<?php $idproduto = $this->session->userdata('idproduto');
			if (isset($idproduto)){ ?>
				<a href="<?php echo base_url('paineladmin/produto/modulo/'.$idproduto); ?>" title="voltar" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
				<?php } else { ?>
				<a href="<?php echo base_url('paineladmin/produto/modulo'); ?>" title="voltar" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
				<?php }
			?>
			</div>
		</div>
    



		<form class="card shadow mb-4" method="post" action="<?php echo base_url('paineladmin/categoria/core'); ?>">
		<div class="card-header bg-primary text-white py-3">
			<h6 class="m-0 font-weight-bold text-center"><?php echo $titulo ?></h6>
		</div>
		<div class="card-body">
		
			<?php
			if ($idcategoria) {
				foreach ($categoria as $row) {
					
			?>
	
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Categoria</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Nome da Categoria" name="nomecategoria" value="<?= $row->nome_tipo_produto ?>">
				</div>
			</div>

			<input type="hidden" name="id_tipo_produto" value="<?= $row->id_tipo_produto; ?> ">
	
			<?php 
							
				}
			} else {
			?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Categoria</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Nome da Categoria" name="nomecategoria" value="<?= set_value('nomecategoria'); ?>">
				</div>
			</div>
			
			<?php
			}
			?>

			<div class="form-group d-flex justify-content-end">
					<button type="submit" class="btn btn-success">Salvar</button>
			</div>
  	</div>
	</form>
    
    

<div class="row mt-3">
            <div class="table-responsive">
              <table class="table table-striped" id="datatableinicial" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr class="filters">
                    <th scope="col" class=" text-center"></th>
                    <th scope="col" class=" text-center">Categoria</th>
                    <th scope="col" class=" text-center"></th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($categorias as $lista){ ?>
                  <tr class="<?php echo ' ';?>">
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->id_tipo_produto ?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->nome_tipo_produto?></td>
                    <td class="text-center text-dark font-weight-bold"><a href="<?php echo base_url('paineladmin/categoria/index/'.$lista->id_tipo_produto)?>" title="Alterar" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
</div>
