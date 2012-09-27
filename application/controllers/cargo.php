<?php 

class Cargo extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->logged();

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

	
	/**
	 * Apresenta a view com todos os projetos cadastrados no sistema 
	 */
	public function listAll()
	{

		// Lista todos os projetos //
		$data['cargos'] = $this->cargo_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'cargo/listCargo_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newCargo()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'cargo/newCargo_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarCargo() 
	{
		

		// Recupera dos dados a serem cadastrados //
		$data['cargoNome']   = $this->input->post('Nome');
					 
		$this->cargo_model->cadastrar($data);

		redirect('cargo/listAll');

	}

	
	/**
	 * Recupera as informações do cadastro e grava no banco de dados
	 */
	public function editCargo()
	{
		// Recupera dos dados a serem cadastrados //
		$data['cargoID']			= $this->input->post('ID');
	
		$data['cargoNome']   		= $this->input->post('Nome');
	
		$this->cargo_model->editar($data);
	
		redirect('cargo/listAll');
	
	}
	
	
	/**
	 *
	 * Apresenta view de edicao de um cargo
	 *
	 */
	public function buscaCargo($id)
	{
		$data['main_content']	= 'cargo/editCargo_view';
	
		$data['cargo'] 		= $this->cargo_model->buscar($id);
	
		$this->parser->parse('template', $data);
	
		//print_r($data);
	
	}
	
		
	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteCargo($id)
	{

		$this->cargo_model->deletar($id);
		
		redirect('cargo/listAll','refresh');
	}	



}


