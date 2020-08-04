<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
            redirect('login','refresh');
        }
        
		$this->load->library('form_validation');

		$this->load->library('session');

		$this->load->model('Produtos_model', '', TRUE);
		$this->load->model('Clientes_model', '', TRUE);

		

		 

	}

	public function index()
	{

		$result['titulo'] = "Membros";
		$result['usuarios'] = $this->ion_auth->users(3)->result(); // get all users
		/* $result['usuarios'] = $this->ion_auth->groups()->result(); */
		$result['grupos'] = $this->ion_auth->groups()->result(); // get all groups

		$result['user'] = $this->ion_auth->get_users_groups(7)->result();
		

		$this->load->view('paineladmin/layout/header', $result);
		/* $this->load->view('paineladmin/principal/principal'); */
		$this->load->view('paineladmin/cliente/principal');
		$this->load->view('paineladmin/layout/footer');

	}

	public function modulo($id=NULL){
	
		if ($id) {

			$usuario = $this->ion_auth->user()->row();
			/* if($id_endereco){

				$result['endereco'] = $this->Clientes_model->getEnderecoCliente($id_endereco);
				
				$result['titulo'] = "Atualizar Endereço";

			} else { */
				$result['titulo'] = "Atualizar Cadastro";
				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['usuarios'] = $this->ion_auth->users()->result();
				$result['user_groups'] = $this->ion_auth->get_users_groups($id)->result();
				$result['enderecos'] = $this->Clientes_model->getEnderecosCliente($id);
				
				
				$result['idusuario'] = $id;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/cliente/modulo');
				$this->load->view('paineladmin/layout/footer');
			
			
			
			
		} else {

			
				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['titulo'] = "Novo Cliente";
				$result['idusuario'] = NULL;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/cliente/modulo');
				$this->load->view('paineladmin/layout/footer');
			
			
	
		}


		

	}

	public function moduloendereco($id, $id_endereco=null){
	
		if ($id_endereco) {

			$usuario = $this->ion_auth->user()->row();

				$result['endereco'] = $this->Clientes_model->getEnderecoCliente($id_endereco);
				
				$result['titulo'] = "Atualizar Endereço";
			

				$result['grupos'] = $this->ion_auth->groups()->result();
				$result['usuarios'] = $this->ion_auth->users()->result();
				$result['user_groups'] = $this->ion_auth->get_users_groups($id)->result();
				$result['enderecos'] = $this->Clientes_model->getEnderecosCliente($id);
				$result['titulo'] = "Atualizar Endereço";
				
				$result['idusuario'] = $id;
				$this->load->view('paineladmin/layout/header', $result);
				$this->load->view('paineladmin/cliente/moduloendereco');
				$this->load->view('paineladmin/layout/footer');
			
			
			
			
		} else {
			$result['grupos'] = $this->ion_auth->groups()->result();
			$result['usuarios'] = $this->ion_auth->users()->result();
			$result['titulo'] = "Novo Endereço";
			$result['idusuario'] = $id;
			$this->load->view('paineladmin/layout/header', $result);
			$this->load->view('paineladmin/cliente/moduloendereco');
			$this->load->view('paineladmin/layout/footer');
		}


		

	}

	public function core(){

		   
		$nome_usuario=$this->input->post('nomeusuario');
		$login=$this->input->post('login');
		$senha=$this->input->post('senha');
		$celular=$this->input->post('celular');
		$id_usuario=$this->input->post('id_usuario');
		$cep=$this->input->post('cep');
		$logradouro=$this->input->post('logradouro');
		$numero=$this->input->post('numero');
		$complemento=$this->input->post('complemento');
		$cidade=$this->input->post('cidade');
		$uf=$this->input->post('uf');
		$id_endereco=$this->input->post('id_endereco');

		if(isset($id_usuario)){
			$this->form_validation->set_rules("nomeusuario", "Nome de Usuário", 'trim|required');  
			$this->form_validation->set_rules("login", "Login", 'trim|required');
			$this->form_validation->set_rules("celular", "Celular", 'trim|required');
		} else {
			$this->form_validation->set_rules("nomeusuario", "Nome de Usuário", 'trim|required');  
			$this->form_validation->set_rules("login", "Login", 'trim|required');
			$this->form_validation->set_rules("celular", "Celular", 'trim|required');
			$this->form_validation->set_rules("senha", "Senha", 'trim|required');
			$this->form_validation->set_rules("logradouro", "Logradouro", 'trim|required');
		}
		
		   	$identity = $nome_usuario;
			$password = $senha;
			$email = $login;
			$additional_data = array(
                
                'phone' => $celular
                );
			$group = array(3);

			
				if(isset($id_usuario)){
					if($this->form_validation->run()){
						$data = array(
							  'username' => $identity,
							  'email' => $email,
							  'phone' => $celular
							   );
						$this->ion_auth->update($id_usuario, $data);
						if ($group!=null){
							$this->ion_auth->remove_from_group(NULL, $id_usuario);
							$this->ion_auth->add_to_group($group, $id_usuario);
						}
					$this->session->set_flashdata('sucesso', 'Cliente Atualizado com sucesso!');
					redirect('paineladmin/cliente','refresh');
					} else {
						$this->modulo($id_usuario); 
					}
				} else {
					if($this->form_validation->run()){
						$retorno = $this->ion_auth->create_user($identity, $password, $email, $additional_data, $group);
						

						if(isset($retorno)){
							$data_endereco = array(  
								"logradouro"     =>$logradouro,  
								"numero"          =>$numero,
								"complemento"          =>$complemento,
								"cidade"          =>$cidade,
								"uf"          =>$uf,
								"cep"          =>$cep,
								"id_user"          =>$retorno
							);

							
							/* $this->Clientes_model->insert_endereco($data); */
							$this->ion_auth->insert_endereco($data_endereco);
							$this->session->set_flashdata('sucesso', 'Cliente criado com sucesso!');
							redirect('paineladmin/cliente','refresh');
						} else {
							$this->session->set_flashdata('Erro', 'Erro ao cadastrar o cliente!');
							redirect('paineladmin/cliente','refresh');
						}
					} else {
						$this->modulo(); 
					}
				}
    
	}
	public function core_endereco(){

		   
		
		$id_usuario=$this->input->post('id_usuario');
		$cep=$this->input->post('cep');
		$logradouro=$this->input->post('logradouro');
		$numero=$this->input->post('numero');
		$complemento=$this->input->post('complemento');
		$cidade=$this->input->post('cidade');
		$uf=$this->input->post('uf');
		$id_endereco=$this->input->post('id_endereco');

		
		
		$this->form_validation->set_rules("logradouro", "Logradouro", 'trim|required');
		 
		
		

		

		 if(isset($id_endereco)){
			 if($this->form_validation->run()){
				 $data_endereco = array(  
					 "logradouro"     =>$logradouro,  
					 "numero"          =>$numero,
					 "complemento"          =>$complemento,
					 "cidade"          =>$cidade,
					 "uf"          =>$uf,
					 "cep"          =>$cep
				 );

				 $return = $this->Clientes_model->update_endereco($data_endereco, $id_endereco);
				 if (isset($return)) {
					$this->session->set_flashdata('sucesso', 'Endereço modificado com sucesso!');
					redirect('paineladmin/cliente/modulo/'.$id_usuario,'refresh');
				 } else {
					$this->session->set_flashdata('erro', 'Endereço não modificado!');
					redirect('paineladmin/cliente/moduloendereco/'.$id_usuario.'/'.$id_endereco,'refresh');
				 }
				 
			 } else {
				$this->moduloendereco($id_usuario); 
			 }
		 } else {
			if($this->form_validation->run()){
					$data_endereco = array(  
						"logradouro"     =>$logradouro,  
						"numero"          =>$numero,
						"complemento"          =>$complemento,
						"cidade"          =>$cidade,
						"uf"          =>$uf,
						"cep"          =>$cep,
						"id_user"          =>$id_usuario
					);

					$return = $this->Clientes_model->insert_endereco($data_endereco);
					if (isset($return)) {
						$this->session->set_flashdata('sucesso', 'Endereço criado com sucesso!');
						redirect('paineladmin/cliente/modulo/'.$id_usuario,'refresh');
					} else {
						$this->session->set_flashdata('Erro', 'Erro ao criar endereço!');
						redirect('paineladmin/cliente/moduloendereco'.$id_usuario,'refresh');
					}
				} else {
					$this->moduloendereco($id_usuario); 
				}
			}
 
   	}
}