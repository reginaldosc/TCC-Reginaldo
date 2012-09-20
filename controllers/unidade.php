<?php 

class Unidade extends CI_Controller {


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
		$data['unidades'] = $this->unidade_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'listUnidade_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newUnidade()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'newUnidade_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarUnidade() 
	{
		

		// Recupera dos dados a serem cadastrados //
		$data['unidadeNome']   = $this->input->post('Nome');
					 
		$this->unidade_model->cadastrar($data);

		redirect('unidade/listAll');

	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteUnidade($id)
	{

		$this->unidade_model->deletar($id);
		
		redirect('unidade/listAll','refresh');
	}	



}


