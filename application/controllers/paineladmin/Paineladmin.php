<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paineladmin extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
            redirect('login','refresh');
        }
        
		/* $this->load->library('form_validation'); */

		$this->load->library('session');

		$this->load->model('Pedidos_model', '', TRUE);

		 

	}

	public function index()
	{

		$result['pedidosgerais'] = $this->Pedidos_model->getPedidos();

		$this->load->view('paineladmin/layout/header', $result);
		/* $this->load->view('paineladmin/principal/principal'); */
		$this->load->view('paineladmin/principal/principal');
		$this->load->view('paineladmin/layout/footer');

	}

	public function lista_produtos()
	{

		$idPedido = $this->input->post('idPedido');

		$result['produtospedidos'] = $this->Pedidos_model->getProdutos($idPedido);
		

		echo(json_encode($result));

	}
}
