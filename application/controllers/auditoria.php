<?php 

/**
 * Classe para controlar o sistema de auditoria
 */
class Auditoria extends CI_Controller {


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
	 * Apresenta a view com todas as auditorias cadastradas no sistema 
	 */
	public function listAll()
	{

		// Lista todas as auditorias //
		$data['auditorias'] = $this->auditoria_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'listAuditoria_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}

	/**
	 * Apresenta a view com todas as auditorias executadas no sistema 
	 */
	public function listAllExec()
	{

		// Lista todas as auditorias //
		$data['auditoriasExec'] = $this->auditoria_model->listarExec();

		// Carrega a view correspondende //
		$data['main_content'] = 'listAuditoriaExec_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}

	/**
	 * Apresenta view de cadastro de novas auditorias
	 */
	public function newAuditoria()
	{

		// Lista todos os usuarios //
		$data['usuarios'] = $this->usuario_model->listarPorTipo('2');
		
		// Lista todas as unidades de negocio //
		$data['unidades'] = $this->unidade_model->listar();

		// Lista todos os departamentos //
		$data['departamentos'] = $this->departamento_model->listar();

		// Lista todos os projetos //
		$data['projetos'] = $this->projeto_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'newAuditoria_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarAuditoria() 
	{
		// Recupera a data informada pelo usuario //
		$date = $this->input->post('Data');

		// Converte a dada informada para o formato mysql //
		$date_mysql = implode("-",array_reverse(explode("/",$date)));
		

		// Recupera dos dados a serem cadastrados //

		$data['auditorID'] 				= $this->input->post('Auditor');

		$data['projetoID']   			= $this->input->post('Projeto');

		$data['auditoriaDataInicio']   	= $date_mysql;
			 
		$this->auditoria_model->cadastrar($data);

		redirect('auditoria/listAll');

	}

/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarExecAuditoria() 
	{
		
		// Recupera dos dados a serem cadastrados //

		$data['auditoriaID']	= $this->input->post('AuditoriaExec');
		
		$this->auditoria_model->cadastrarExec($data);

		redirect('auditoria/listAllExec');


	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteAuditoria($id)
	{

		$this->auditoria_model->deletar($id);
		
		redirect('auditoria/listAll','refresh');
	}	

	/**
	 * Chama o model para executar a auditoria selecionada, apos essa operacao retorna a HOME
	 */
	public function execAuditoria($id)
	{

		$data['auditorias'] = $this->auditoria_model->executar($id);

		// Lista todos os usuarios //
		$data['usuarios'] = $this->usuario_model->listarPorTipo('4');

		// Lista todos os artefatos //
		$data['artefatos'] = $this->artefato_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'execAuditoria_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data); 
		
	}

}


/* End of file auditoria.php */
/* Location: ./application/controllers/auditoria.php */
