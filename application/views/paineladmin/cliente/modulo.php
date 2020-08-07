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
	<?php if (isset($endereco)){ ?>
		<a href="<?php echo base_url('paineladmin/cliente/modulo/'.$idusuario); ?>" title="voltar" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
	<?php } else { ?>
		<a href="<?php echo base_url('paineladmin/cliente'); ?>" title="voltar" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
	<?php } ?>
	</div>
  </div>



	<form class="card shadow mb-4" method="post" action="<?php echo base_url('paineladmin/cliente/core'); ?>">
		<div class="card-header bg-primary text-white py-3">
			<h6 class="m-0 font-weight-bold text-center"><?php echo $titulo ?></h6>
		</div>
		<div class="card-body">
		
			<?php
			if (isset($idusuario)) {
				foreach ($usuarios as $row){
				if ($row->user_id == $idusuario ) {
			
			?>
			
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nome de Usuário</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Coloque um Nome de Usuário" name="nomeusuario" value="<?= $row->username ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Login</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Digite um Login" name="login" value="<?= $row->email; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Celular</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Digite um Celular" name="celular" value="<?= $row->phone; ?>">
					</div>
				</div>
				<div class="form-group d-flex justify-content-end">
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			
	
			
			

			<input type="hidden" name="id_usuario" value="<?= $row->user_id; ?>">
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Endereço(s)</label>
			</div>

			
			
					<div class="row mt-3">
					<div class="table-responsive">
					<table class="table table-striped"  width="100%" cellspacing="0">
						<thead class="thead-dark">
						<tr class="filters">
							<th scope="col" class=" text-center">ENDEREÇO(s) DO CLIENTE</th>
							<th scope="col" class=" text-center"></th>
							
						</tr>
						</thead>
						<tbody>
						<?php foreach ($enderecos as $rowenderecos){?>
							<tr class="<?php echo ' ';?>">
								<td class="text-center text-dark font-weight-bold"><?php echo $rowenderecos->logradouro; if($rowenderecos->numero!=null) { echo ", ".$rowenderecos->numero;}?><?php if($rowenderecos->complemento!=null) { echo ", ".$rowenderecos->complemento;}?><?php if($rowenderecos->cep!=null) { echo ", ".$rowenderecos->cep;}?><?php if($rowenderecos->cidade!=null) { echo ", ".$rowenderecos->cidade;}?><?php if($rowenderecos->uf!=null) { echo ", ".$rowenderecos->uf;}?></td>
								<td class="text-center text-dark font-weight-bold">
								
								<a href="<?php echo base_url('paineladmin/cliente/moduloendereco/'.$rowenderecos->id_user.'/'.$rowenderecos->id_endereco)?>" title="Alterar Endereço" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
								
								</td>
							</tr>

						<?php } ?>
						</tbody>
					</table>
					</div>
					</div>
					<div class="form-group d-flex justify-content-end">
						<a href="<?php echo base_url('paineladmin/cliente/moduloendereco/'.$row->user_id)?>" title="Novo" class="btn btn-primary"><i class="fas fa-plus"></i>Novo Endereço</a></p>
					</div>
				<?php 							
				} 
				}
			} else {
			
			
			?>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nome do Cliente</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Coloque um Nome" name="nomeusuario" value="<?= set_value('nomeusuario'); ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Login</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite um Login" name="login" value="<?= set_value('login'); ?>">
					</div>
					<label class="col-sm-2 col-form-label">Senha</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" placeholder="Digite uma Senha" name="senha" value="<?= set_value('senha'); ?>">
					</div>
				</div>
				<!-- <div class="form-group row">
					<label class="col-sm-2 col-form-label">Senha</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" placeholder="Digite uma Senha" name="senha" value="<?= set_value('senha'); ?>">
					</div>
				</div> -->

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Celular</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite um Celular" name="celular" value="<?= set_value('celular'); ?>">
					</div>
					<label class="col-sm-2 col-form-label">CEP</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" placeholder="Digite um CEP" name="cep" id="cep" value="<?= set_value('cep'); ?>">
					</div>
					<div class="col-sm-2">
						
						<!-- <a title="Buscar Endereço" class="btn btn-primary" onblur="pesquisacep(this.value);">Buscar</a> -->
						<a href="#" title="Buscar Endereço" class="btn btn-primary" onclick="pesquisacep();">Buscar</a>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Logradouro</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Digite um Logradouro" name="logradouro" id="logradouro" value="<?= set_value('logradouro'); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Numero</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite um Numero" name="numero" id="numero" value="<?= set_value('numero'); ?>">
					</div>
					<label class="col-sm-2 col-form-label">Complemento</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite um Complemento" name="complemento" id="complemento" value="<?= set_value('complemento'); ?>">
					</div>
				</div>

				

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Cidade</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite uma Cidade" name="cidade" id="cidade" value="<?= set_value('cidade'); ?>">
					</div>
					<label class="col-sm-2 col-form-label">UF</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Digite uma UF" name="uf" id="uf" value="<?= set_value('uf'); ?>">
					</div>
				</div>
				<div class="form-group d-flex justify-content-end">
						<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			<?php
			}
			?>

			
  		</div>
	</form>

</div>
<!-- /.container-fluid -->