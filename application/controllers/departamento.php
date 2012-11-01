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
		$data['departamentos'] = $this->departamento_model->listar(0);

		// Carrega a view correspondende //
		$data['main_content'] = 'departamento/listDepartamento_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos departamentos
	 */
	public function newDepartamento()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'departamento/newDepartamento_view';

		// Lista todas as unidades de negocio //
		$data['unidades'] = $this->unidade_model->listar(2);

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}

	/**
	 * 
	 */
	public function getDepartamento($id)
	{
		$departamentos = $this->departamento_model->getDepartamentos($id);
		
		if( empty ( $departamentos ) ) 
			return '{ "nome": "Nenhum departamento encontrado" }';
			
		echo json_encode($departamentos);

		return;
	}

	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarDepartamento() 
	{
		// Recupera dos dados a serem cadastrados //
		$data['departamentoNome']   = $this->input->post('Nome');
		$data['unidadeID']   		= $this->input->post('Unidade');
		$data['departemantoAtivo']	= $this->input->post('Ativo');
			 
		$this->departamento_model->cadastrar($data);

		redirect('departamento/listAll');
	}

	
	/**
	 * Recupera as informações do cadastro e grava no banco de dados
	 */
	public function editDepartamento()
	{
		// Recupera dos dados a serem cadastrados //
		$data['departamentoID']			= $this->input->post('ID');
	
		$data['departamentoNome']   	= $this->input->post('Nome');
		
		$data['unidadeID']				= $this->input->post('Unidade');
		
		$data['departamentoAtivo']		= $this->input->post('Ativo');
	
		$this->departamento_model->editar($data);
	
		redirect('departamento/listAll');
	
	}
	
	
	/**
	 *
	 * 
	 *
	 */
	public function buscaDepartamento($id)
	{
		$data['main_content']	= 'departamento/editDepartamento_view';
	
		$data['departamento'] 	= $this->departamento_model->buscar($id);
		
		// Lista todas as unidades de negocio //
		$data['unidades'] = $this->unidade_model->listar(2);
	
		$this->parser->parse('template', $data);
	
		//print_r($data);
	
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
