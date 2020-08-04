<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function setMsg($id,$msg,$tipo){
	$CI =& get_instance();

	switch ($tipo) {
		case 'erro':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-danger alert-dismissible d-flex justify-content-center fade show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			break;
		case 'sucesso':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-success alert-dismissible d-flex justify-content-center fade show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;
			
		case 'sucessoAviso':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-warning alert-dismissible d-flex justify-content-center show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;

			case 'erroRelotacao':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-success alert-dismissible d-flex justify-content-center show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;

			case 'erroEmailJaCadastrado':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-success alert-dismissible d-flex justify-content-center show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;

			case 'erroEmailNaoConfirmado':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-success alert-dismissible d-flex justify-content-center show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;
			case 'erroEmailNaoCadastrado':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-success alert-dismissible d-flex justify-content-center show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;
			case 'esqueciMinhaSenha':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-success alert-dismissible d-flex justify-content-center show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;
			case 'trocaEmailAdminPronatecSucesso':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-success alert-dismissible d-flex justify-content-center show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;
			case 'trocaEmailAdminPronatecFalha':
			
			$CI->session->set_flashdata($id, '<div class="alert alert-danger alert-dismissible d-flex justify-content-center show" role="alert"><strong>'.$msg.'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			
			break;
			
			
	}
}

function getMsg($id){

	$CI =& get_instance();

	if ($CI->session->flashdata($id)) {

		echo $CI->session->flashdata($id);
	}

}

function errosValidacoes(){

	if (validation_errors()){
		//echo '<div class="alert alert-danger alert-dismissible d-flex justify-content-center fade show" role="alert"><strong>'.validation_errors().'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		echo '<div class="container-fluid alert alert-danger alert-dismissible d-flex justify-content-center my-1 fade show" role="alert">
		<div></div>
		<div><strong>'.validation_errors().'</strong></div>
		<div class="justify-content-center">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
	  </div>';
	}

}

function erros_validacao_lotacao(){

	if (validation_errors()){
		echo '<div role="alert"><strong>'.validation_errors().'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
	}


}

function dataDiaDB(){
	
	date_default_timezone_get('America/Sao_paulo');
	$formato = "DATE_W3C";
	$hora = time();

	return standard_date($formato, $hora);

}

function formatDataView($data=NULL){

	if ($data) {
		
		$data = explode(' ', $data);

		$data = explode('-', $data[0]);

		return $data[2].'/'.$data[1].'/'.$data[0];
	}

}

?>