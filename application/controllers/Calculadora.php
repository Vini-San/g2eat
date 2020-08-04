<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculadora extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();

        $this->load->library('form_validation');

	}
	public function index()
	{
		$btnValue = $this->input->post("btnValue");
		
		
		/* $calculo = "$btnValue"; */
		
			$this->form_validation->set_rules('btnValue', 'Valor', 'trim|required|callback_validaValor');
			if ($this->form_validation->run() == TRUE) {
				
				try
				{
					$resultado = eval('return '.$btnValue.';');
					$result['resultado']=$resultado;
				}
				catch (ParseError $err)
				{
					$result['msgerror']="Operação inválida. Verifique os números e o sinal de operação colocado";
					$result['resultado']=null;
				}
				
				
			} else {
				$result['resultado']=null;
			}
			
		

		$this->load->view('calculadora', $result);
	}
	function validaValor($input = null) {
		

			
			
			$checknegativo = substr($input,0,1);
			if ($checknegativo == "-"){
				$restochecknegativo = substr($input,1,strlen($input));
				if (preg_match('#^(\d|\d\.\d)([\d\+\-\s\/\*]+|\d+\.\d+)(\d|\d\.\d)+$#', $restochecknegativo) > 0) {
					return true;
				} else {
				$this->form_validation->set_message('validaValor', 'Necessário um operador ou foi colocado algum caracter indevido');
				return false;
				}
			} else {
				if (preg_match('#^(\d|\d\.\d)([\d\+\-\s\/\*]+|\d+\.\d+)(\d|\d\.\d)+$#', $input) > 0) {
					return true;
				} else {
				$this->form_validation->set_message('validaValor', 'Necessário um operador ou foi colocado algum caracter indevido');
				return false;
				}
			}
	}
}
