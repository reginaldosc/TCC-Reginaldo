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

	function buscaAC($id)
	{
		$data['main_content']	= 'ac/auditor/ac_auditor_view';
		
		$data['ac'] 		= $this->ac_model->listarAC($id);
		
		$this->parser->parse('template', $data);
		
		//print_r($data);
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
		$data['statusID'] = STATUS_RETORNADA;
	
		$this->ac_model->atualizaAc($id, $data);

		// Envia mensagem no formato id do usuario, status //
		$this->mensagem->sendMsg(4, STATUS_RETORNADA);
	
		redirect('ac/listAll','refresh');
	}
	
	
	/**
	 * Visualiza nao conformidade
	 */
	public function visualizarAc($id)
	{
	
		// Lista todas as auditorias //
		$data['ncs'] = $this->nc_model->listarNc($id);
	
		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data,'ncs','ncDataFinalprev');
	
		$auditoria = $data['ncs'][0]->auditoriaID;
	
		$data['auditorias'] = $this->auditoria_model->listarAuditoria($auditoria);
	
		$projeto = $data['auditorias'][0]->projetoID;
		$acompanhante = $data['auditorias'][0]->acompanhanteID;
	
		$data['acompanhante'] = $this->usuario_model->getUsuario($acompanhante);
		$data['projetos_artefatos'] = $this->auditoria_model->listarProjeto_Arfetato($projeto);
	
	
		// Lista todos os Ação corretivas //
		$data['acs'] = $this->ac_model->listarAC($id);
	
		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data,'acs','acDataFinal');
	
	
		if($this->getTipo() == USER_AUDITOR)
		{
			$data['main_content'] = 'ac/auditor/ac_auditor_view';
			//print_r($data);
		}
		else
		{
			// Carrega a view correspondende //
			$data['main_content'] = 'ac/ac_view';
		}
	
		// Envia todas as informacoes para tela //
		$this->parser->parse('template', $data);
	
	}
}


