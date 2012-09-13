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
	 * Apresenta view de cadastro de novas auditorias
	 */
	public function newAuditoria()
	{

		// Lista todos os usuarios //
		$data['usuarios'] = $this->usuario_model->listar();
		
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

		// Converte a nada informada para o formato mysql //
		$date_mysql = implode("-",array_reverse(explode("/",$date)));
		

		// Recupera dos dados a serem cadastrados //

		$data['auditorID'] 				= $this->input->post('Auditor');
		$data['projetoID']   			= $this->input->post('Projeto');
		$data['auditoriaDataInicio']   	= $date_mysql;

			 
		$this->auditoria_model->cadastrar($data);

		redirect('auditoria/listAll');

	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteAuditoria($id)
	{

		$this->auditoria_model->deletar($id);
		
		redirect('auditoria/listAll','refresh');
	}	



}


/* End of file auditoria.php */
/* Location: ./application/controllers/auditoria.php */
