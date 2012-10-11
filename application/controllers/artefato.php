<?php 

class Artefato extends CI_Controller {


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

		// Lista todos os artefatos //
		$data['artefatos'] = $this->artefato_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'artefato/listArtefato_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newArtefato()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'artefato/newArtefato_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarArtefato() 
	{
		
		// Recupera dos dados a serem cadastrados //
		$data['artefatoNome']   	= $this->input->post('Nome');
		
		$data['artefatoDescricao']  = $this->input->post('Descricao');
					 
		$this->artefato_model->cadastrar($data);

		redirect('artefato/listAll');

	}
	
	
	/**
	 * Recupera as informações do cadastro e grava no banco de dados
	 */
	public function editArtefato()
	{
		// Recupera dos dados a serem cadastrados //
		$data['artefatoID']			= $this->input->post('ID');
		
		$data['artefatoNome']   	= $this->input->post('Nome');
		
		$data['artefatoDescricao']  = $this->input->post('Descricao');
		
		$this->artefato_model->editar($data);
		
		redirect('artefato/listAll');
	
	}
	
	
	/**
	 *
	 * Apresenta view de edicao de um artefato
	 *
	 */
	public function buscaArtefato($id)
	{
		$data['main_content'] = 'artefato/editArtefato_view';
		
		$data['artefato'] = $this->artefato_model->buscar($id);
		
		$this->parser->parse('template', $data);
		
	}
	
	

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteArtefato($id)
	{

		// Deletar dados da tabela Projeto_Artefato //
		$this->artefato_model->deletarPA($id);
		
		$this->artefato_model->deletar($id);
		
		redirect('artefato/listAll','refresh');
	}	



}


