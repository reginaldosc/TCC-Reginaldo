<?php 

class Perguntas extends CI_Controller {


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
		$data['perguntas'] = $this->perguntas_model->listar(0);

		// Carrega a view correspondende //
		$data['main_content'] = 'perguntas/listPerguntas_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newPerguntas()
	{

		// Lista todos os usuarios //
		$data['artefatos'] = $this->artefato_model->listar(0);
		
		// Carrega a view correspondende //
		$data['main_content'] = 'perguntas/newPerguntas_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarPerguntas() 
	{
		
		// Recupera dos dados a serem cadastrados //
		$data['artefatoID']   	= $this->input->post('Artefato');
		
		$data['artefatoPergunta']  = $this->input->post('artefatoPergunta');
		
		$data['perguntaAtivo']		= 'SIM';
					 
		$this->perguntas_model->cadastrar($data);

		redirect('perguntas/listAll');

	}
	
	
	/**
	 * Recupera as informações do cadastro e grava no banco de dados
	 */
	public function editPerguntas()
	{
		// Recupera dos dados a serem cadastrados //
		$data['perguntasID']			= $this->input->post('ID');
		
		$data['artefatoNome']   	= $this->input->post('Artefato');
		
		$data['artefatoPergunta']  = $this->input->post('Pergunta');
		
		$data['perguntaAtivo']		= $this->input->post('perguntaAtivo');
		
		//print_r($data);
		
		$this->perguntas_model->editar($data);
		
		redirect('perguntas/listAll');
	
	}
	
	
	/**
	 *
	 * Apresenta view de edicao de um artefato
	 *
	 */
	public function buscaPerguntas($id)
	{
		$data['main_content']	= 'perguntas/editPerguntas_view';
		
		$data['perguntas']		= $this->perguntas_model->buscar($id);
		
		// Lista todas as unidades de negocio //
		$data['artefatos'] 		= $this->artefato_model->listar(2);
		
		$this->parser->parse('template', $data);
		
	}
	
	

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deletePerguntas($id)
	{
		//print_r($id);
		$this->perguntas_model->deletar($id);
		
		redirect('perguntas/listAll','refresh');
	}	
	
}
