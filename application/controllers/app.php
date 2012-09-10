<?php

class App extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->logged();

	}

	/**
	 * 
	 * Apresenta view principal do sistema
	 *
	 */
	public function home()
	{
		$data['main_content'] = 'home_view';
		$this->load->view('template',$data);
	}

	/**
	 * Verifica se o usuario está logado
	 */
	public function logged()
	{
		$logged = $this->session->userdata('logged');

		if(!isset($logged) || $logged != true)
		{	
			redirect('login','refresh');
		}		
	}	


}


/* End of file app.php */
/* Location: ./application/controllers/app.php */