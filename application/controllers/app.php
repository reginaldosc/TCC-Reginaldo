<?php

class App extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('parser');
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
	 * 
	 */
	public function logged()
	{
		$logged = $this->session->userdata('logged');

		if(!isset($logged) || $logged != true)
		{	
			redirect('login','refresh');
		}		
	}	

	/**
	 *
	 * Apresenta view de cadastro de novo usuario
	 *
	 */
	public function newUser()
	{
		// Carrega Cargo //
		$this->load->model('Role_model');
		$data['cargos'] = $this->Role_model->listar();

		// Carrega EAG
		$this->load->model('Eag_model');
		$data['eags'] = $this->Eag_model->listar();

		// Carrega Perfis de usuarios do sistema //
		$this->load->model('Type_model');
		$data['tipos'] = $this->Type_model->listar();

		$data['main_content'] = 'newUser_view';		
		$this->parser->parse('template', $data);
		
	}


	/**
	 *
	 * Apresenta view de edicao de um usuario
	 *
	 */
	public function editUser()
	{
		$data['main_content'] = 'editUser_view';		
		$this->parser->parse('template', $data);
	}


	/**
	 * Chama a view para listar usuarios e socita ao model todos os usuarios cadastrados do bd
	 *
	 */
	public function listUser()
	{
		// Carrega o model sobre usuario //
		$this->load->model ('User_model');

		// solicita ao model a listagem de todos os usuarios do sistema, e carrega na variavel 'usuarios' //
		$data['usuarios'] = $this->User_model->listar();

		// Chama a view de listagem de usuarios e envia os dados //
		$data['main_content'] = 'listUser_view';
		
		$this->parser->parse('template', $data);

	}

	/**
	 * Recupera as informacoes do cadastro, testa e grava no banco os dados do novo usuario
	 */
	public function cadastrarUser() 
	{

		// Carrega helper para usar a funcao create_username(); //
		$this->load->helper('user');
	
		// Recupera dos dados a serem cadastrados //
		$data['userName']     			= $this->input->post('Nome');
		$data['userRegistration']		= $this->input->post('Matricula');
		$data['userLogin']    			= create_username($this->input->post('Nome'), $this->input->post('Matricula'));
		$data['userPassword'] 			= create_username($this->input->post('Nome'), $this->input->post('Matricula')); 
		$data['userEmail']    			= $this->input->post('Email');
		$data['Type_typeID']   		    = $this->input->post('Tipo');
		$data['Role_roleID']    		= $this->input->post('Cargo');
		$data['Eag_eagID']    			= $this->input->post('Setor');
			 
		// Carrega o modelo do usuario //
		$this->load->model('User_model');
		 
		// Insere os dados do novo usuario no bd //
		$this->User_model->cadastrar($data);

		redirect('app/listUser');

	}
	

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteUser($id)
	{
		
		$this->load->model('User_model');

		$this->User_model->deletar($id);
		
		// redirect to person list page
		redirect('app/listUser','refresh');
	}

	/**
	 * Pagina do usuario 
	 */

	public function pageUser()
	{

	$data['main_content'] = 'pageUser_view';		
	$this->parser->parse('template', $data);
	} 

}