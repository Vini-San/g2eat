<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gruposmembros extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
            redirect('login','refresh');
		}

		if (!$this->ion_auth->is_admin()) {
			$this->session->set_flashdata('erro', 'Não é possível acessar');
			redirect('paineladmin/paineladmin','refresh');
		}
		
        
		$this->load->library('form_validation');

		$this->load->library('session');

		$this->load->model('Produtos_model', '', TRUE);

		 

	}

	public function index()
	{

		$result['titulo'] = "Grupos de Membros";
		$result['usuarios'] = $this->ion_auth->users()->result(); // get all users
		/* $result['usuarios'] = $this->ion_auth->groups()->result(); */
		$result['grupos'] = $this->ion_auth->groups()->result(); // get all groups

		$result['user'] = $this->ion_auth->get_users_groups(7)->result();
		

		$this->load->view('paineladmin/layout/header', $result);
		/* $this->load->view('paineladmin/principal/principal'); */
		$this->load->view('paineladmin/gruposmembros/principal');
		$this->load->view('paineladmin/layout/footer');

	}

	public function modulo($id=NULL){
	
		if ($id) {

			/* $usuario = $this->ion_auth->user()->row();
			if (($this->ion_auth->is_admin())|| $id == $usuario->id ){

				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['usuarios'] = $this->ion_auth->users()->result();
				$result['user_groups'] = $this->ion_auth->get_users_groups($id)->result();
				$result['titulo'] = "Atualizar Cadastro";
				$result['idusuario'] = $id;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/gruposmembros/modulo');
				$this->load->view('paineladmin/layout/footer');
			
			} else {
				$this->index();
			} */

				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['usuarios'] = $this->ion_auth->users()->result();
				$result['user_groups'] = $this->ion_auth->get_users_groups($id)->result();
				$result['titulo'] = "Atualizar Cadastro";
				$result['id_grupo'] = $id;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/gruposmembros/modulo');
				$this->load->view('paineladmin/layout/footer');
			
			
		} else {

			if ($this->ion_auth->is_admin()){

				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['titulo'] = "Novo Grupo";
				$result['idusuario'] = NULL;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/gruposmembros/modulo');
				$this->load->view('paineladmin/layout/footer');
			
			} else {
				$this->index();
			}
	
		}


		

	}

	public function core(){

		   
		   
		   $nomegrupo=$this->input->post('nomegrupo');

		   
		   $descricao=$this->input->post('descricao');

		   $id_grupo=$this->input->post('id_grupo');
		   

		   $this->form_validation->set_rules("nomegrupo", "Nome do Grupo", 'trim|required');  
		   $this->form_validation->set_rules("descricao", "Descricao", 'trim|required');
		   
		   if($this->form_validation->run()){

		   if ($id_grupo!=null){

				/* $group_id = $id_grupo;
				$group_name = $nomegrupo;
						$additional_data = array(
							'description' => $descricao
						); */

						$data = array(  
							"name"=>$nomegrupo,  
							"description"=>$descricao
						   ); 
		
				// pass the right arguments and it's done
				/* $group_update = $this->ion_auth->update_group($group_id, $group_name, $additional_data); */
				/* $group_update = $this->ion_auth->update_group($group_id, $group_name); */
				/* $group_update = $this->ion_auth->update_group($id_grupo, $nomegrupo, $descricao);
				$group_update = $this->ion_auth->update_group($group_id, $group_name, $additional_data); */
				$group_update = $this->Produtos_model->update_groups($data, $id_grupo);
				
		
				
					
					$this->session->set_flashdata('sucesso', 'Grupo Atualizado com sucesso!');
					redirect('paineladmin/gruposmembros','refresh');
				
				
					
				
				

			} else {

				$group = $this->ion_auth->create_group($nomegrupo, $descricao);
					
					if(!$group){
						$this->session->set_flashdata('erro', 'Grupo não criado!');
						$this->modulo($id_grupo);
					} else {
						$this->session->set_flashdata('sucesso', 'Grupo criado com sucesso!');
						redirect('paineladmin/gruposmembros','refresh');
					}
					
				} 
			} else {
				if ($id_grupo!=null){
					$this->modulo($id_grupo);
				} else {
					$this->modulo();

				}	
				
			}
	  }
}
