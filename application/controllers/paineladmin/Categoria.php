<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
            redirect('login','refresh');
        }
        
		$this->load->library('form_validation');

		$this->load->library('session');

		$this->load->model('Produtos_model', '', TRUE);

		 

	}

	public function index($id=NULL)
	{

		$result['categorias'] = $this->Produtos_model->getCategorias();

		if ($id) {

			//atualizar
			$result['categoria'] = $this->Produtos_model->getCategoriasById($id);
			$result['titulo'] = "Atualizar Cadastro";
			$result['idcategoria'] = $id;

		} else {

			//cadastrar
			$result['titulo'] = "Nova Categoria";
			$result['idcategoria'] = NULL;
		}

		$this->load->view('paineladmin/layout/header', $result);
		/* $this->load->view('paineladmin/principal/principal'); */
		$this->load->view('paineladmin/categoria/principal');
		$this->load->view('paineladmin/layout/footer');

	}

	public function modulo($id=NULL){
	

		$result['tipoprodutos'] = $this->Produtos_model->getTipos();

		


		if ($id) {

			//atualizar
			$result['produto'] = $this->Produtos_model->getProdutoById($id);
			$result['titulo'] = "Atualizar Cadastro";
			$result['idproduto'] = $id;

		} else {

			//cadastrar
			$result['titulo'] = "Novo Produto";
			$result['idproduto'] = NULL;
		}


		$this->load->view('paineladmin/layout/header', $result);
		$this->load->view('paineladmin/produto/modulo');
		$this->load->view('paineladmin/layout/footer');

	}

	public function core(){

		   //echo 'OK';
		   $nomecategoria=$this->input->post('nomecategoria');
		   $id_tipo_produto=$this->input->post('id_tipo_produto');
		  

		   $this->form_validation->set_rules("nomecategoria", "Nome da Categoria", 'required|trim');

		   $data = array(  
			"nome_tipo_produto"     =>$nomecategoria
		   );  
            
			if ($id_tipo_produto!=null){
				if($this->form_validation->run()){
				$this->Produtos_model->update_categoria($data, $id_tipo_produto);
				$this->session->set_flashdata('sucesso', 'Categoria Atualizada com sucesso!');
				redirect('paineladmin/categoria','refresh');
				} else {
					$this->modulo($id_produto); 
				}

			} else {
				if($this->form_validation->run()){                
				$this->Produtos_model->insert_categoria($data);
				$this->session->set_flashdata('sucesso', 'Categoria criada com sucesso!');
				redirect('paineladmin/categoria','refresh');
			} else {
				$this->modulo(); 
			}
			}
                     
           
      }
}
