<?php 

class Departamento extends CI_Controller {


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
	 * Apresenta a view com todos os departamentos cadastrados no sistema 
	 */
	public function listAll()
	{

		// Lista todos os departamentos //
		$data['departamentos'] = $this->departamento_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'listDepartamento_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos departamentos
	 */
	public function newDepartamento()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'newDepartamento_view';

		// Lista todas as unidades de negocio //
		$data['unidades'] = $this->unidade_model->listar();

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarDepartamento() 
	{
		// Recupera dos dados a serem cadastrados //
		$data['departamentoNome']   	= $this->input->post('Nome');
		$data['unidadeID']   		= $this->input->post('Unidade');
	
			 
		$this->departamento_model->cadastrar($data);

		redirect('departamento/listAll');
	}

	/**
	 * Chama o model para deletar o departamento selecionado, apos essa operacao retorna a view de listagem de departamentos
	 */
	public function deleteDepartamento($id)
	{

		$this->departamento_model->deletar($id);
		
		redirect('departamento/listAll','refresh');
	}	

}

?>
