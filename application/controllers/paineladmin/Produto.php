<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
            redirect('login','refresh');
        }
        
		$this->load->library('form_validation');

		$this->load->library('session');

		$this->load->model('Produtos_model', '', TRUE);

		 

	}

	public function index()
	{

		$result['produtos'] = $this->Produtos_model->getProdutos();

		$this->load->view('paineladmin/layout/header', $result);
		/* $this->load->view('paineladmin/principal/principal'); */
		$this->load->view('paineladmin/produto/principal');
		$this->load->view('paineladmin/layout/footer');

	}

	public function modulo($id=NULL){
	

		$result['tipoprodutos'] = $this->Produtos_model->getTipos();

		


		if ($id) {

			//atualizar
			$result['produto'] = $this->Produtos_model->getProdutoById($id);
			$result['titulo'] = "Atualizar Cadastro";
			$result['idproduto'] = $id;
			
	  
				$produtosession = array(
					'idproduto'  => $id,			
					);
					$this->session->set_userdata($produtosession);
			   
				 

		} else {

			//cadastrar
			if (null !==$this->session->userdata('idproduto')){
				$this->session->unset_userdata('idproduto');
			}
			$result['titulo'] = "Novo Produto";
			$result['idproduto'] = NULL;
		}


		$this->load->view('paineladmin/layout/header', $result);
		$this->load->view('paineladmin/produto/modulo');
		$this->load->view('paineladmin/layout/footer');

	}

	public function core(){

		   //echo 'OK';
		   $nome_produto=$this->input->post('nomeproduto');
		   $valor=$this->input->post('valor');
		   $quantidade=$this->input->post('quantidade');
		   $tipoproduto=$this->input->post('tipoproduto');
		   $id_produto=$this->input->post('id_produto');

		   $this->form_validation->set_rules("nomeproduto", "Nome do Produto", 'required|trim');  
		   $this->form_validation->set_rules("valor", "Valor", 'required|trim');
		   $this->form_validation->set_rules("quantidade", "Quantidade", 'required|trim');
		   $this->form_validation->set_rules("tipoproduto", "Categoria", 'required|trim');

		   $data = array(  
			"nome_produto"     =>$nome_produto,  
			"valor"          =>$valor,
			"quantidade"          =>$quantidade,
			"id_tipo"          =>$tipoproduto
		   );  
            
			if ($id_produto!=null){
				if($this->form_validation->run()){
				$this->Produtos_model->update_produto($data, $id_produto);
				$this->session->set_flashdata('sucesso', 'Produto Atualizado com sucesso!');
				redirect('paineladmin/produto','refresh');
				} else {
					$this->modulo($id_produto); 
				}

			} else {
				if($this->form_validation->run()){                
				$this->Produtos_model->insert_produto($data);
				$this->session->set_flashdata('sucesso', 'Produto criado com sucesso!');
				redirect('paineladmin/produto','refresh');
			} else {
				$this->modulo(); 
			}
			}
                     
           
      }
}
