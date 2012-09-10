<?php

/**
 * Classe para controlar o sistema de Login 
 */

class Login extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

	}

	/**
	 *  
	 */
	public function index()	
	{
		$this->load->view('login_view');
	}


	/**
	 *  Validando Usuário 
	 */
	public function validate_login()
	{
		$query = $this->usuario_model->validar();

		if ($query)
		{
			$data = array(

				'usuarioLogin' => $this->input->post('login'), 
				'logged' => true

			);

			$this->session->set_userdata($data);
			redirect('app/home');

		}
		else
		{
			echo "Erro";
		}
	}

	/**
	 * Logout do sistema
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}