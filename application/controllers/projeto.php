<?php 

class Projeto extends CI_Controller {


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
		$data['projetos'] = $this->projeto_model->listar(0);

		// Carrega a view correspondende //
		$data['main_content'] = 'projeto/listProjeto_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newProjeto()
	{

		// Lista todos os departamentos //
		$data['departamentos'] = $this->departamento_model->listar(2);

		// Carrega a view correspondende //
		$data['main_content'] = 'projeto/newProjeto_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}

	/**
	 * 
	 */
	public function getProjetos($id)
	{
		$projetos = $this->projeto_model->getProjetos($id);
		
		if( empty ( $projetos ) ) 
			return '{ "nome": "Nenhum projeto encontrado" }';
			
		echo json_encode($projetos);

		return;
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarProjeto() 
	{
		

		// Recupera dos dados a serem cadastrados //
		$data['projetoNome']   	= $this->input->post('Nome');
		
		$data['departamentoID'] = $this->input->post('Setor');
		
		$data['projetoAtivo'] = 'SIM';
				 
		$this->projeto_model->cadastrar($data);

		redirect('projeto/listAll');

	}

	
	/**
	 * Recupera as informações do cadastro e grava no banco de dados
	 */
	public function editProjeto()
	{
		// Recupera dos dados a serem cadastrados //
		$data['projetoID']			= $this->input->post('ID');
	
		$data['projetoNome']   		= $this->input->post('Nome');
	
		$data['departamentoID']  	= $this->input->post('Departamento');
		
		$data['projetoAtivo']		= $this->input->post('Ativo');
	
		//print_r($data);
		$this->projeto_model->editar($data);
	
		redirect('projeto/listAll');
	
	}
	
	
	/**
	 *
	 * 
	 *
	 */
	public function buscaProjeto($id)
	{
		$data['main_content']	= 'projeto/editProjeto_view';
	
		$data['projeto'] 		= $this->projeto_model->buscar($id);
		
		// Lista todos os departamentos//
		$data['departamentos'] = $this->departamento_model->listar(2);
		
		$this->parser->parse('template', $data);
		
		//print_r($data);
	
	}	
	
	
	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteProjeto($id)
	{

		// Deletar dados da tabela Projeto_Artefato //
		$this->projeto_model->deletarPA($id);
		
		$this->projeto_model->deletar($id);
		
		redirect('projeto/listAll','refresh');
	}
}


