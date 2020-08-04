<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="Portal Interno do Servidor" content="">
	<meta name="DGI" content="">

  <?php

    if (isset($titulo)){

      echo '<title>'.$titulo.'</title>';

    } else {

      echo '<title>BIG BENÇÃO ADMIN</title>';

    }

  ?>

	<link rel="icon" href="<?php echo base_url('public/icons/admin.ico'); ?>" />
		
	<!-- Bootstrap core css-->
	<link href="<?php echo base_url('public/bigbencao/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/bigbencao/bootstrap/css/bootstrap-grid.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/bigbencao/bootstrap/css/bootstrap-reboot.min.css') ?>" rel="stylesheet">
	
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('public/bigbencao/jquery/jquery.min.js') ?>"></script>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('public/bigbencao/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
	<!-- Another custom fonts for this template-->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
	<link href="<?php echo base_url('public/bigbencao/css/jquery.fileupload.css') ?>" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('public/bigbencao/css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<!-- Custom styles for this page -->
	<link href="<?php echo base_url('public/bigbencao/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
	
	<link href="<?php echo base_url('public/bigbencao/css/site.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/bigbencao/css/filetree.css') ?>" rel="stylesheet">
	
	<script src="<?php echo base_url('public/bigbencao/js/configJS.js') ?>"></script>
  <script src="<?php echo base_url('public/bigbencao/js/site.js') ?>" type="text/javascript"></script>

  <script>
    /*function checaPermissao(idDiv, recursos){

    arrayRecursos = recursos.split("|");

    //console.log(arrayRecursos);
    //console.log(idDiv);
    if(!arrayRecursos.includes(idDiv)){
      $(`#`+idDiv).hide();

    }

    };*/
  </script>

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bullseye"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Big Benção<sup>admin</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('paineladmin/paineladmin') ?>">
        <i class="fas fa-shopping-cart"></i>
          <span>Pedidos</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

	  
<?php 


$usuario = $this->session->userdata('login');
 
?>

      
      <div id="membros">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('paineladmin/usuario') ?>" title='membros'>
            <i class="far fa-id-badge"></i>
            <span>Membros</span></a>
        </li>
      </div>

      
      <?php if ($this->ion_auth->is_admin()) { ?>
        <div id="grupomembros">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('paineladmin/gruposmembros') ?>" title='grupomembros'>
              <i class="far fa-id-badge"></i>
              <span>Grupos de Membros</span></a>
          </li>
        </div>
		  <?php } ?>
      

      <div id="cliente">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('paineladmin/cliente') ?>" title='cliente'>
            <i class="far fa-id-badge"></i>
            <span>Cliente</span></a>
        </li>
      </div>
			
      <div id="produtos">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('paineladmin/produto') ?>" title='produtos'>
            <i class="fas fa-pizza-slice"></i>
            <span>Produtos</span></a>
        </li>
      </div>

      <!-- Button to go out to the main link -->
      <?php //if(in_array("links", $arrayRecursosUsuarioSistema)){?>
      <div id="balancete">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin/links') ?>" title='balancete'>
            <i class="fas fa-dollar-sign"></i>
            <span>Balancete</span></a>
        </li>
      </div>


      <!-- Button to go out to the main link -->
      <?php //if(in_array("noticias", $arrayRecursosUsuarioSistema)){?>
      <div id="dashboard">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin/noticias/get_noticias') ?>" title='dashboard'>
          <i class="fas fa-chart-line"></i>
            <span>Dashboard</span></a>
        </li>
      </div>
      

      

      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      
      <!-- Button to go out to the main link -->
      <!--<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('') ?>" title='Intranet'>
          <i class="fas fa-home"></i>
          <span>Ir para a Intranet</span></a>
      </li>-->

      <!-- Button to logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/login/logout') ?>" title='Sair'>
          <i class="fas fa-sign-out-alt"></i>
          <span>Sair</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
					<?php if ($this->session->flashdata('erro') != ''){
						echo '<div class="container-fluid alert alert-danger alert-dismissible d-flex justify-elements-around my-1 fade show" role="alert">
										<div></div>
										<div><strong>'.$this->session->flashdata('erro').'</strong></div>
										<div>
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
					} ?>
					
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

            <!-- Nav Item - Alerts -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php $usuario = $this->ion_auth->user()->row(); echo $usuario->username; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/user/vinnie/likes">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Meus Dados
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configurações
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('') ?> ">
										<i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
										Intranet
								</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
				<!-- End of Topbar -->
				<div class="main-container">