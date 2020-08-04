<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{

		/* $identity = 'admin@admin.com';
		$password = 'password'; */
		$identity = $this->input->post('cpf');
		$password = $this->input->post('senha');
		$remember = TRUE; // remember the user
		
		$this->form_validation->set_rules("cpf", "Login", 'required|trim');  
		$this->form_validation->set_rules("senha", "Senha", 'required|trim');


		if($this->form_validation->run()==true){

			
			if($this->ion_auth->login($identity, $password, $remember)){
				
				$user = $this->ion_auth->user()->row();
				if ($user->active!=1){
					$this->session->set_flashdata('erro', 'Acesso Negado. Favor entrar em contato o administrador da conta ou com o suporte!');
					redirect('login','refresh');
				} else {
					redirect('paineladmin/paineladmin','refresh');
				}
				

			} else {
				redirect('login','refresh');
			}
			
		} else {
			
			$this->load->view('paineladmin/login/login');
		}
		
		
	}

	public function logout()
	{

		$this->ion_auth->logout();
		redirect('login','refresh');
		
	}
}
