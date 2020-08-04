<!-- Begin Page Content -->

<div class="container-fluid">
<?php
errosValidacoes();
getMsg('msgCadastro');
?>

  <!-- Page Heading -->
  
  <div class="row mt-3 mb-3 text-right">
	<div class="col-lg-12">
		<a href="<?php echo base_url('paineladmin/produto'); ?>" title="voltar" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
		<a href="<?php echo base_url('paineladmin/categoria'); ?>" title="novacategoria" class="btn btn-primary">Nova Categoria <i class="fas fa-forward"></i></a>
  	</div>
  </div>



	<form class="card shadow mb-4" method="post" action="<?php echo base_url('paineladmin/produto/core'); ?>">
		<div class="card-header bg-primary text-white py-3">
			<h6 class="m-0 font-weight-bold text-center"><?php echo $titulo ?></h6>
		</div>
		<div class="card-body">
		
			<?php
			if ($idproduto) {
				foreach ($produto as $row) {
					
			?>
	
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nome do Produto</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Nome do Produto" name="nomeproduto" value="<?= $row->nome_produto ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Valor</label>
				<div class="col-sm-10">
					<input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" placeholder="Valor" name="valor" value="<?= $row->valor; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Quantidade</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" placeholder="Quantidade" name="quantidade" value="<?= $row->quantidade; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Categoria</label>
				<div class="col-sm-10">
					<select class="custom-select" id="tipoproduto" name="tipoproduto" required="">
					<?php
					foreach ($tipoprodutos as $rowtipo) {
						if($row->id_tipo==$rowtipo->id_tipo_produto){
					?>

						<option value="<?php echo $rowtipo->id_tipo_produto;?>" selected><?php echo $rowtipo->nome_tipo_produto; ?></option>
						<?php } else { ?>
							<option value="<?php echo $rowtipo->id_tipo_produto;?>"><?php echo $rowtipo->nome_tipo_produto; ?></option>
					<?php
					} }
					?>
					</select>
				</div>
			</div>

			<input type="hidden" name="id_produto" value="<?= $row->id_produto; ?> ">
	
			<?php 
							
				}
			} else {
			?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nome do Produto</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Nome do Produto" name="nomeproduto" value="<?= set_value('nomeproduto'); ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Valor</label>
				<div class="col-sm-10">
					<input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" placeholder="Valor" name="valor" value="<?= set_value('valor'); ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Quantidade</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" placeholder="Quantidade" name="quantidade" value="<?= set_value('quantidade'); ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Categoria</label>
				<div class="col-sm-10">
					<select class="custom-select" id="tipoproduto" name="tipoproduto" required="">
						<option value="" selected disabled>Escolha Uma Categoria</option>
						<?php
						foreach ($tipoprodutos as $rowtipo) {
						?>

						<option value="<?php echo $rowtipo->id_tipo_produto;?>"><?php echo $rowtipo->nome_tipo_produto; ?></option>

						<?php
						}
						?>
					</select>
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

</div>
<!-- /.container-fluid -->