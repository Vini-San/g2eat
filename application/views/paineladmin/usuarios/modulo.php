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
		<a href="<?php echo base_url('paineladmin/usuario'); ?>" title="voltar" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
	</div>
  </div>



	<form class="card shadow mb-4" method="post" action="<?php echo base_url('paineladmin/usuario/core'); ?>">
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
			<?php  if ($this->ion_auth->is_admin()){ ?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Grupo</label>
				<div class="col-sm-10">
					<select class="custom-select" id="tipogrupo" name="tipogrupo" required="">
					<?php

					foreach ($user_groups as $user_group){
						$usuario_grupo = $user_group->id;
					}
					foreach ($grupos as $rowgrupo) {
						if($usuario_grupo==$rowgrupo->id){
					?>

						<option value="<?php echo $rowgrupo->id;?>" selected><?php echo $rowgrupo->name; ?></option>
						<?php } else { ?>
							<option value="<?php echo $rowgrupo->id;?>"><?php echo $rowgrupo->name; ?></option>
					<?php
					} }
					?>
					</select>
				</div>
			</div>
			<?php } ?>

			<input type="hidden" name="id_usuario" value="<?= $row->user_id; ?> ">
	
			<?php 
							
				} }
			} else {
			
			/* print_r ($grupos); */
			?>

				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nome de Usuário</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Coloque um Nome de Usuário" name="nomeusuario" value="<?= set_value('nomeusuario'); ?>">
				</div>
				</div>
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Login</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Digite um Login" name="login" value="<?= set_value('login'); ?>">
				</div>
				</div>
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Senha</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" placeholder="Digite uma Senha" name="senha" value="<?= set_value('senha'); ?>">
				</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Grupo</label>
					<div class="col-sm-10">
						<select class="custom-select" id="tipogrupo" name="tipogrupo" required="">
						<?php
						foreach ($grupos as $rowgrupo) {
						?>						
								<option value="<?php echo $rowgrupo->id;?>"><?php echo $rowgrupo->name; ?></option>
						<?php
						}
						?>
						</select>
					</div>
				</div>
				

			<?php if($usuariobanco == 0) { ?>

			
			
			
			<?php } }  ?>

			 
			

			<div class="form-group d-flex justify-content-end">
					<button type="submit" class="btn btn-success">Salvar</button>
			</div>
  	</div>
	</form>

</div>
<!-- /.container-fluid -->