<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="Portal Big Benção" content="">
	<meta name="big_bencao" content="">
		<title>Big Benção</title>	
  	<!-- Bootstrap core css-->
  	<link href="<?php echo base_url('public/bigbencao/bootstrap/css/loginform.css') ?>" rel="stylesheet">
  	<!-- Custom fonts for this template-->
  	<link href="<?php echo base_url('public/bigbencao/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  	<!-- Another custom fonts for this template-->
  	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  	<!-- Custom styles for this template-->
  	<link href="<?php echo base_url('public/bigbencao/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    
      <!-- script src="https://www.google.com/recaptcha/api.js?render=6LdbOccUAAAAAHYnJZuoXSC565LYj4A1kIaPZww4"></script -->      

      <!-- script>
          grecaptcha.ready(function() {
              grecaptcha.execute('6LdbOccUAAAAAHYnJZuoXSC565LYj4A1kIaPZww4', {action: 'homepage'});
          });
      </script -->
      <style>
/*
- Como Fazer Uma Imagem de Fundo Preencher Toda a Tela
- Autor: Guilherme Müller
- Site: http://guilhermemuller.com.br/blog/2011/06/08/como-fazer-uma-imagem-de-fundo-preencher-a-tela-inteira/
*/

/* reset de margens */
* {
	margin: 0;
	padding:0;
}

/* para garantir que estes elementos ocuparão toda a tela */
body, html {
	width: 100%;
	height: 100%;
	font-family: Arial, Tahoma, sans-serif;
}

body {
	background: url('<?=base_url('public/bigbencao/img/login/fundo_login1.jpg');?>') center center no-repeat fixed;
	
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

#container {
	width: 560px;
	padding: 20px;
	margin: 40px auto;
	background: #FFF; /* fundo branco para navegadores que não suportam rgba */
	background: rgba(255,255,255,0.8); /* fundo branco com um pouco de transparência */
}

</style>
      

</head>
<body>

  <div class="container" >

    <!-- Outer Row -->
    
    <div class="row justify-content-center">
    
      <div class="col-xl-12 col-lg-12 col-md-9 mt-5">
      
            <div class="row d-flex justify-content-center mt-5">
                <div class="container">
                  <?php 
                    errosValidacoes(); 
                    if ($this->session->flashdata('erro') != ''){
                      echo '<div class="container-fluid alert alert-danger alert-dismissible d-flex justify-content-center my-1 fade show" role="alert">
                              <div></div>
                              <div><strong>'.$this->session->flashdata('erro').'</strong></div>
                              <div class="justify-content-center">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            </div>';
                    }elseif($this->session->flashdata('sucesso') != ''){
                      echo '<div class="container-fluid alert alert-success alert-dismissible d-flex justify-elements-around my-1 fade show" role="alert">
                              <div></div>
                              <div><strong>'.$this->session->flashdata('sucesso').'</strong></div>
                              <div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            </div>';
                    } 
                  ?>                
                </div>
              <div class="col-lg-6 mt-5">
                <div class="p-5">
                  

                  <div class="flex-wrap">

                    <fieldset>
                    

                      <form action="" method="post">
                        
                        <input type="radio" name="rg" id="sign-in" value="sign-in" checked />
                        
                          
                        <label for="sign-in" class="text-dark">BIG BENÇÃO</label>
                        <!-- label for="sign-up">Registrar</label -->
                          
  
                        <input type="text"     class="sign-in"  id="cpf"   name="cpf" aria-describedby="cpf" placeholder="Entre com seu login...">
                        <input type="password" class="sign-in"  id="senha"   name="senha" placeholder="Senha de acesso" />
                        <input type="text"     class="sign-up reset"         id="sign-up-reset" name="sign-up-reset" placeholder ="CPF" />
                        
                        <button> </button>
                      <!-- div class="g-recaptcha mt-5" data-sitekey="6LdbOccUAAAAAHYnJZuoXSC565LYj4A1kIaPZww4" ></div -->   
                      </form>
                    </fieldset>
                  </div>

                  <hr>
                  <div class="modal fade" id="registrarmodal" tabindex="-1" role="dialog" aria-labelledby="registrarmodal" aria-hidden="true">
										<div class="modal-dialog" role="document">
												<div class="modal-content">
														<div class="modal-header">
																<h5 class="modal-title">Usuário já Cadastrado, Crie uma Senha</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
														</div>
														<div class="modal-body">
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Digite sua senha</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" placeholder="Nova Senha" name="senha">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Confirme sua senha</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" placeholder="Nova Senha" name="senha">
                                </div>
                              </div>
														</div>
														<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
																<button type="submit" class="btn btn-success">Confirmar</button>
														</div>
														</form>
												</div>
										</div>
								</div>
                </div>
              </div>
            </div>
      </div>

    </div>

  </div>


  


<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('public/bigbencao/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('public/bigbencao/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('public/bigbencao/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('public/bigbencao/js/sb-admin-2.min.js') ?>"></script>  

  
</body>
</html>