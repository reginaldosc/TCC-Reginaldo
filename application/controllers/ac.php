<?php 

class AC extends CI_Controller {


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
		$data['acs'] = $this->ac_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'ac/listAc_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newAc($id)
	{

		$data['ncID'] = $id;
		// Carrega a view correspondende //
		$data['main_content'] = 'ac/newAc_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}

	/**
	 * Executa Ação Corretiva 
	 */
	public function execAC($id)

	{

		$data['statusID']		= 3;
		$data['acDataFinal']	= date_now_mysql();

		// Envia msg para usuario auditor //
		// Mandar E-mail para auditor //
		$this->ac_model->cadastrar($data);


	}

	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarAc() 
	{
		
		// Recupera a data informada pelo usuario //
		$date = $this->input->post('Data');

		// Converte a dada informada para o formato mysql //
		$date_mysql = implode("-",array_reverse(explode("/",$date)));


		// Recupera dos dados a serem cadastrados //
		$data['acDescricao']	= $this->input->post('Descricao');
		$data['acDataAgendada']	= $date_mysql;
		$data['ncID']			= $this->input->post('NC');
		$data['statusID']		= 1;

		$this->ac_model->cadastrar($data);

		redirect('nc/listAll','refresh');

	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteAc($id)
	{

		$this->ac_model->deletar($id);
		
		redirect('nc/listAll','refresh');
	}	

}


