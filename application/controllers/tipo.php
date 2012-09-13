<?php 

class Tipo extends CI_Controller {


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
		$data['tipos'] = $this->tipo_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'listTipo_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newTipo()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'newTipo_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarTipo() 
	{
		
		// Recupera dos dados a serem cadastrados //
		$data['tipoNome']   = $this->input->post('Nome');
					 
		$this->tipo_model->cadastrar($data);

		redirect('tipo/listAll');

	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteTipo($id)
	{

		$this->tipo_model->deletar($id);
		
		redirect('tipo/listAll','refresh');
	}	



}


