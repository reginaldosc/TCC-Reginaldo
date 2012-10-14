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

	
	public function getName()
	{
		return "ação corretiva";
	}

	/**
	 * Apresenta a view com todos os projetos cadastrados no sistema 
	 */
	public function listAll()
	{

		// Lista todos os projetos //
		$data['acs'] = $this->ac_model->listar();
		
		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data,'acs','acDataFinal');

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
					
		$data['statusID']		= MSG::Executada;
		$data['acDataFinal']	= date_now_mysql();
		
		$this->ac_model->atualizaAc($id, $data);
		
		// Envia mensagem no formtado id, status//
		$this->inbox->sendMsg($id ,MSG::Executada);
		
		redirect('ac/listAll','refresh');
	}

	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarAc() 
	{
		
		// Recupera dos dados a serem cadastrados //
		$data['acDescricao']		= $this->input->post('Descricao');
		$data['acAcao']				= $this->input->post('Acao');
		$data['ncID']				= $this->input->post('NC');
		$data['statusID']			= MSG::Agendada;

		$this->ac_model->cadastrar($data);

		// Envia mensagem no formtado id, status//
		$this->inbox->sendMsg($id , MSG::Agendada);

		redirect('nc/listAll','refresh');

	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteAc($id)
	{

		$this->ac_model->deletar($id);
		redirect('ac/listAll','refresh');
	}

	
	function updateAcCloseStatus($id)
	{
		$data['statusID'] = '8'; 
		
		$this->ac_model->atualizaAc($id, $data);
		
		redirect('ac/listAll','refresh');
	}
	


	function updateAcOpenStatus($id)
	{
		$data['statusID'] = '7';
	
		$this->ac_model->atualizaAc($id, $data);
	
		redirect('ac/listAll','refresh');
	}
	
}


