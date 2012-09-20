<?php 

class NC extends CI_Controller {


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
		$data['ncs'] = $this->nc_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'listNc_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newNc()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'newNc_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarNc() 
	{
		
		// Recupera dos dados a serem cadastrados //
		$data['ncDescricao']   = $this->input->post('Descricao');
		$data['ncStatus']   = $this->input->post('Status');
		$data['ncDataFinalprev']   = $this->input->post('DataFimPrev');
		$data['ncDataFinal']   = $this->input->post('DataFinal');
		$data['ncComentario']   = $this->input->post('Comentario');
		$data['ncDataFinal']   = $this->input->post('DataFinal');
		$this->nc_model->cadastrar($data);

		redirect('nc/listAll');

	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteNc($id)
	{

		$this->nc_model->deletar($id);
		
		redirect('nc/listAll','refresh');
	}
}

