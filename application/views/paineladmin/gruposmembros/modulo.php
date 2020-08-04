<!-- Begin Page Content -->

<div class="container-fluid">
<?php
errosValidacoes();
getMsg('msgCadastro');
?>

  <!-- Page Heading -->
  <h3 class="text-dark mb-1"><?php echo $titulo; ?></h3>
  
  <div class="row mt-3 mb-3 text-right">
	<div class="col-lg-12">
		<a href="<?php echo base_url('paineladmin/gruposmembros'); ?>" title="voltar" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
	</div>
  </div>



	<form class="card shadow mb-4" method="post" action="<?php echo base_url('paineladmin/gruposmembros/core'); ?>">
		<div class="card-header bg-primary text-white py-3">
			<h6 class="m-0 font-weight-bold text-center"><?php echo $titulo ?></h6>
		</div>
		<div class="card-body">
		
			<?php
			if (isset($id_grupo)) {
				foreach ($grupos as $row){
				if ($row->id == $id_grupo ) {					
					
			?>
	
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nome do Grupo</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Coloque um Nome de Grupo" name="nomegrupo" value="<?= $row->name ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Descrição</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Digite uma Descrição" name="descricao" value="<?= $row->description; ?>">
				</div>
			</div>
			

			<input type="hidden" name="id_grupo" value="<?= $row->id; ?> ">
	
			<?php 
							
				} }
			} else {
			
			/* print_r ($grupos); */
			?>

				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nome do Grupo</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Coloque um Nome de Grupo" name="nomegrupo" value="<?= set_value('nomegrupo'); ?>">
				</div>
				</div>
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Descrição do Grupo</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Digite uma Descrição" name="descricao" value="<?= set_value('descricao'); ?>">
				</div>
				</div>

				

			<?php } ?>

			<div class="form-group d-flex justify-content-end">
					<button type="submit" class="btn btn-success">Salvar</button>
			</div>
  	</div>
	</form>

</div>
<!-- /.container-fluid -->