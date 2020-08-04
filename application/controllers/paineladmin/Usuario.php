<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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

		$usuario = $this->ion_auth->user()->row();
		$result['titulo'] = "Membros";
		$result['usuarios'] = $this->ion_auth->users(array(1,2))->result(); // get all users
		/* foreach ($usuarios as $key) {
			if($keyc==$usuario->company){
				$result['usuarios']=$key;
			}
		} */
		$result['grupos'] = $this->ion_auth->groups()->result(); // get all groups
		$result['usuariobanco'] = $usuario->company;

		$this->load->view('paineladmin/layout/header', $result);
		/* $this->load->view('paineladmin/principal/principal'); */
		$this->load->view('paineladmin/usuarios/principal');
		$this->load->view('paineladmin/layout/footer');

	}

	public function modulo($id=NULL){
	
		$usuario = $this->ion_auth->user()->row();
		if ($id) {

			
			if (($this->ion_auth->is_admin())|| $id == $usuario->id ){

				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['usuarios'] = $this->ion_auth->users()->result();
				$result['user_groups'] = $this->ion_auth->get_users_groups($id)->result();
				$result['titulo'] = "Atualizar Cadastro";
				$result['usuariobanco'] = $usuario->id;
				$result['idusuario'] = $id;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/usuarios/modulo');
				$this->load->view('paineladmin/layout/footer');
			
			} else {
				$this->index();
			}
			
			
		} else {

			if ($this->ion_auth->is_admin()){

				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['titulo'] = "Novo Usuario";
				$result['idusuario'] = NULL;
				$result['usuariobanco'] = $usuario->id;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/usuarios/modulo');
				$this->load->view('paineladmin/layout/footer');
			
			} else {
				$this->index();
			}
	
		}


		

	}

	public function modulosenha($id){
	
		

			$usuario = $this->ion_auth->user()->row();
			if (($this->ion_auth->is_admin()) || $id == $usuario->id ){

				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['usuarios'] = $this->ion_auth->users()->result();
				$result['user_groups'] = $this->ion_auth->get_users_groups($id)->result();
				$result['titulo'] = "Modificar Senha";
				$result['idusuario'] = $id;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/usuariosenha/modulo');
				$this->load->view('paineladmin/layout/footer');
			
			} else {
				$this->index();
			}
			
	}

	public function core(){

		   
		   $nome_usuario=$this->input->post('nomeusuario');
		   $login=$this->input->post('login');
		   $senha=$this->input->post('senha');
		   $tipogrupo=$this->input->post('tipogrupo');
		   $id_usuario=$this->input->post('id_usuario');

		   $this->form_validation->set_rules("nomeusuario", "Nome de Usuário", 'trim|required');  
		   $this->form_validation->set_rules("login", "Login", 'trim|required');
		   $this->form_validation->set_rules("tipogrupo", "Grupo", 'trim|required');

		   	$identity = $nome_usuario;
			$password = $senha;
			$email = $login;
			$usuario = $this->ion_auth->user()->row();
			if($usuario->id==0){
				$additional_data = array(
					'company' => 'Ben',
					'last_name' => 'Edmunds',
					);
			} else {
				$additional_data = array(
					'company' => $usuario->id
					);
			}
			
			
			$group = array($tipogrupo);
            
			if ($id_usuario!=null){
				if($this->form_validation->run()){
					$data = array(
						  'username' => $identity,
						  'email' => $email
						   );
					$this->ion_auth->update($id_usuario, $data);
					if ($tipogrupo!=null){
						$this->ion_auth->remove_from_group(NULL, $id_usuario);
						$this->ion_auth->add_to_group($tipogrupo, $id_usuario);
					}
					
				$this->session->set_flashdata('sucesso', 'Usuário Atualizado com sucesso!');
				redirect('paineladmin/usuario','refresh');
				} else {
					$this->modulo($id_usuario); 
				}

			} else {
					
				$this->form_validation->set_rules("senha", "Senha", 'trim|required');
				if($this->form_validation->run()){                
				$this->ion_auth->create_user($identity, $password, $email, $additional_data, $group);
				$this->session->set_flashdata('sucesso', 'Usuário criado com sucesso!');
				redirect('paineladmin/usuario','refresh');
				} else {
					$this->modulo(); 
				}
			}
    
	  }
	  
	  public function core_change_senha(){

		   
		
		$senha=$this->input->post('senha');
		
		$id_usuario=$this->input->post('id_usuario');

		$this->form_validation->set_rules("senha", "Senha", 'trim|required');
		 
		$password = $senha;
		
		 
		 
			 if($this->form_validation->run()){
				 $data = array(
					   'password' => $password
						);
				 $this->ion_auth->update($id_usuario, $data);
				 				 
			 $this->session->set_flashdata('sucesso', 'Senha Modificada com sucesso!');
			 redirect('paineladmin/usuario','refresh');
			 } else {
				 $this->modulo($id_usuario); 
			 }
 
   }
}
