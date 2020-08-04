<div class="container-fluid">
<?php $usuario = $this->ion_auth->user()->row(); ?>
    <h3 class="text-dark mb-1"><?php echo $titulo; ?></h3>

    <?php  if ($this->ion_auth->is_admin()){ ?>
    <div class="row mt-3 mb-3 text-right">
      <div class="col-lg-12">
        <a href="<?php echo base_url('paineladmin/usuario/modulo/')?>" title="Novo" class="btn btn-primary"><i class="fas fa-plus"></i>Novo Cadastro</a></p>
      </div>
    </div>
    <?php } ?>
    
    <?php /* print_r ($usuarios);
    
    echo "<br>";
    
    print_r ($usuario); */?>

<div class="row mt-3">
            <div class="table-responsive">
              <table class="table table-striped" id="datatableinicial" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr class="filters">
                    <th scope="col" class=" text-center">NOME DE USUÁRIO</th>
                    <th scope="col" class=" text-center">LOGIN</th>
                    <th scope="col" class=" text-center"></th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php 
                
                foreach ($usuarios as $lista){
                 
                  if($usuariobanco==0){
                  ?>
                  <tr class="<?php echo ' ';?>">
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->username ?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->email?></td>
                    <td class="text-center text-dark font-weight-bold">
                    <?php  if (($this->ion_auth->is_admin())|| $lista->user_id == $usuario->id ){ ?>
                    <a href="<?php echo base_url('paineladmin/usuario/modulo/'.$lista->user_id)?>" title="Alterar cadastro" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('paineladmin/usuario/modulosenha/'.$lista->user_id)?>" title="Alterar senha" class="btn btn-primary btn-circle"><i class="fas fa-user-edit"></i></a>
                    <?php } ?>
                    </td>
                  </tr>
                <?php } else {
                  if ($lista->company==$usuariobanco){ ?>
                  <tr class="<?php echo ' ';?>">
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->username ?></td>
                    <td class="text-center text-dark font-weight-bold"><?php echo $lista->email?></td>
                    <td class="text-center text-dark font-weight-bold">
                    <?php  if (($this->ion_auth->is_admin())|| $lista->user_id == $usuario->id ){ ?>
                    <a href="<?php echo base_url('paineladmin/usuario/modulo/'.$lista->user_id)?>" title="Alterar cadastro" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('paineladmin/usuario/modulosenha/'.$lista->user_id)?>" title="Alterar senha" class="btn btn-primary btn-circle"><i class="fas fa-user-edit"></i></a>
                    <?php } ?>
                    </td>
                  </tr>
                  <?php } } } ?>
                </tbody>
              </table>
            </div>
          </div>
</div>
