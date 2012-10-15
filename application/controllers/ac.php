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
					
		$data['statusID']		= STATUS_EXECUTADA;
		$data['acDataFinal']	= date_now_mysql();
		
		$this->ac_model->atualizaAc($id, $data);
		
		// Envia mensagem no formato id do usuario, status //
		$this->mensagem->sendMsg(4, STATUS_EXECUTADA);
		
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
		$data['statusID']			= STATUS_AGENDADA;

		$this->ac_model->cadastrar($data);

		// Envia mensagem no formato id do usuario, status //
		$this->mensagem->sendMsg(4, STATUS_AGENDADA);

		redirect('nc/listAll','refresh');

	}

	/**
	 * Envia mensagem ao usuário
	 */
	public function cadastrarMsg($data)
	{
		$this->mensagem_model->cadastrarUsuarioMensagem($data);
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
		$data['statusID'] = STATUS_FECHADA; 
		
		$this->ac_model->atualizaAc($id, $data);

		// Envia mensagem no formato id do usuario, status //
		$this->mensagem->sendMsg(4, STATUS_FECHADA);
		
		redirect('ac/listAll','refresh');
	}
	

	function updateAcOpenStatus($id)
	{
		$data['statusID'] = STATUS_ABERTA;
	
		$this->ac_model->atualizaAc($id, $data);

		// Envia mensagem no formato id do usuario, status //
		$this->mensagem->sendMsg(4, STATUS_ABERTA);
	
		redirect('ac/listAll','refresh');
	}
	
}


