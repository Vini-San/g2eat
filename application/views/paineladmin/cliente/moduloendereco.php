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
		<a href="<?php echo base_url('paineladmin/cliente/modulo/'.$idusuario); ?>" title="voltar" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
	</div>
  </div>



	<form class="card shadow mb-4" method="post" action="<?php echo base_url('paineladmin/cliente/core_endereco'); ?>">
		<div class="card-header bg-primary text-white py-3">
			<h6 class="m-0 font-weight-bold text-center"><?php echo $titulo ?></h6>
		</div>
		<div class="card-body">
		
			<?php
			if (isset($endereco)) {
				foreach ($usuarios as $row){
				if ($row->user_id == $idusuario ) {
			
			?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nome de Usuário</label>
				<label class="col-sm-10 col-form-label"><?= $row->username ?></label>
				<input type="hidden" class="form-control"name="nomeusuario" value="<?= $row->username ?>">
				
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Login</label>
				<label class="col-sm-10 col-form-label"><?= $row->email; ?></label>
				<input type="hidden" class="form-control" name="login" value="<?= $row->email; ?>">
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Celular</label>
				<label class="col-sm-10 col-form-label"><?= $row->phone; ?></label>
				<div class="col-sm-10">
					<input type="hidden" class="form-control" placeholder="Digite um Celular" name="celular" value="<?= $row->phone; ?>">
				</div>
			</div>
			
			
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Endereço(s)</label>
			</div>

				<div class="form-group row">
					<div class="col-sm-5">
						<input type="text" class="form-control" placeholder="Coloque um Logradouro" name="logradouro" value="<?= $endereco->logradouro; ?>">
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" placeholder="Coloque um Número" name="numero" value="<?= $endereco->numero; ?>">
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Coloque um Complemento" name="complemento" value="<?= $endereco->complemento; ?>">
					</div>
					
				</div>
				<div class="form-group row">
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Coloque um CEP" name="cep" value="<?= $endereco->cep; ?>">
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" placeholder="Coloque um Cidade" name="cidade" value="<?= $endereco->cidade; ?>">
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" placeholder="Coloque um UF" name="uf" value="<?= $endereco->uf; ?>">
					</div>
				</div>

				<input type="hidden" name="id_endereco" value="<?= $endereco->id_endereco; ?>">
				<input type="hidden" name="id_usuario" value="<?= $row->user_id; ?>">

				<div class="form-group d-flex justify-content-end">
						<button type="submit" class="btn btn-success">Salvar</button>
				</div>
				
				<?php 							
				} 
				}
			} else {
				foreach ($usuarios as $row){
					if ($row->user_id == $idusuario ) {
			?>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nome de Usuário</label>
					<label class="col-sm-10 col-form-label"><?= $row->username ?></label>
					<input type="hidden" class="form-control"name="nomeusuario" value="<?= $row->username ?>">
					
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Login</label>
					<label class="col-sm-10 col-form-label"><?= $row->email; ?></label>
					<input type="hidden" class="form-control" name="login" value="<?= $row->email; ?>">
				</div>
				

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Celular</label>
					<label class="col-sm-4 col-form-label"><?= $row->phone; ?></label>
					<label class="col-sm-2 col-form-label">CEP</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite um CEP" name="cep" value="<?= set_value('cep'); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Logradouro</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Digite um Logradouro" name="logradouro" value="<?= set_value('logradouro'); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Numero</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite um Numero" name="numero" value="<?= set_value('numero'); ?>">
					</div>
					<label class="col-sm-2 col-form-label">Complemento</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite um Complemento" name="complemento" value="<?= set_value('complemento'); ?>">
					</div>
				</div>

				

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Cidade</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite uma Cidade" name="cidade" value="<?= set_value('cidade'); ?>">
					</div>
					<label class="col-sm-2 col-form-label">UF</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite uma UF" name="uf" value="<?= set_value('uf'); ?>">
					</div>
				</div>
				<input type="hidden" name="id_usuario" value="<?= $row->user_id; ?>">
				<div class="form-group d-flex justify-content-end">
						<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			<?php } } } ?>

			
  		</div>
	</form>

</div>
<!-- /.container-fluid -->