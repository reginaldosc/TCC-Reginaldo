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
	
		$status['s'] = $this->nc_model->buscaStatus($id);
		
		if(($status['s'][0]->statusID == STATUS_ABERTA))
		{
			$data['ncID'] = $id;
			// Carrega a view correspondende //
			$data['main_content'] = 'ac/newAc_view';
			// Envia todas as informações para tela //			
			$this->parser->parse('template', $data);
		}
		else 
		{
			$this->session->set_userdata('msg', 'Ação permitada, somente se a Não Conformidade estiver 
					com status ABERTA.');
			redirect("nc/listAll");
		}
	}

	/**
	 * Executa Ação Corretiva 
	 */
	public function execAC($id)
	{
					
		$status['s'] = $this->ac_model->buscaStatus($id);
		
		if(($status['s'][0]->statusID == STATUS_AGENDADA) || ($status['s'][0]->statusID == STATUS_RETORNADA))
		{

			$data['statusID']		= STATUS_EXECUTADA;
			$data['acDataFinal']	= date_now_mysql();

			$this->ac_model->atualizaAc($id, $data);

			// Buscar Auditor //
			$ac['ac'] 	= $this->ac_model->buscarAC($id);
			$id2		= $ac['ac'][0]->ncID;
			$nc['nc'] 	= $this->nc_model->buscarNC( $ac['ac'][0]->ncID );
			$ad['ad']	= $this->auditoria_model->buscarAuditoria( $nc['nc'][0]->auditoriaID );

			// MSG //
			$remetente		= USER_ADMIN;
			$destinatario	= $ad['ad'][0]->auditorID;
			$status 		= STATUS_EXECUTADA;

			// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
			$this->mensagem->sendMsg($remetente, $destinatario, " ", " ", $status);
		}
		else 
		{
			$ac['ac'] 	= $this->ac_model->buscarAC($id);
			$id2		= $ac['ac'][0]->ncID;
			$this->session->set_userdata('msg', 'Ação permitada, somente se Ação Corretiva estiver com status AGENDADA ou RETORNADA.');
				
		}
		
		redirect("nc/visualizarNc/$id2");
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

		$status['s'] = $this->ac_model->buscaStatus($id);
		$ac['ac'] 	= $this->ac_model->buscarAC($id);
		$id2		= $ac['ac'][0]->ncID;			

		if(($status['s'][0]->statusID == STATUS_AGENDADA) || ($status['s'][0]->statusID == STATUS_RETORNADA))
		{
			$this->ac_model->deletar($id);
		}
		else
		{
			$this->session->set_userdata('msg', 'Ação permitada, somente se Ação Corretiva estiver com status 
					AGENDADA ou RETORNADA.');
		}
		redirect("nc/visualizarNc/$id2");
	}
	

	public function buscaAC($id)
	{
		$data['main_content']	= 'ac/auditor/ac_auditor_view';
		
		$data['acs'] 		= $this->ac_model->listarAC($id);
		
		$this->parser->parse('template', $data);
		
		//print_r($data);
	}

	
	function updateAcCloseStatus($id)
	{
		$status['s'] = $this->ac_model->buscaStatus($id);
		$ac['ac'] 	= $this->ac_model->buscarAC($id);
		$id2		= $ac['ac'][0]->ncID;

		if($status['s'][0]->statusID == STATUS_EXECUTADA)
		{
			$data['statusID'] = STATUS_FECHADA;


			$this->ac_model->atualizaAc($id, $data);

			// Buscar Acompanhante //
			$ac['ac'] 	= $this->ac_model->buscarAC($id);
			$nc['nc'] 	= $this->nc_model->buscarNC( $ac['ac'][0]->ncID );
			$ad['ad']	= $this->auditoria_model->buscarAuditoria( $nc['nc'][0]->auditoriaID );

			// MSG //
			$remetente		= USER_ADMIN;
			$destinatario	= $ad['ad'][0]->acompanhanteID;
			$status 		= STATUS_FECHADA;

			// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
			$this->mensagem->sendMsg($remetente, $destinatario, " ", " ", $status);
		}
		else
		{
			$this->session->set_userdata('msg', 'Ação permitada, somente se Ação Corretiva estiver com status EXECUTADA.');
		}
		redirect("nc/visualizarNc/$id2");
	}
	

	function updateAcOpenStatus($id)
	{
		$status['s'] = $this->ac_model->buscaStatus($id);
		$ac['ac'] 	= $this->ac_model->buscarAC($id);
		$id2		= $ac['ac'][0]->ncID;
		
		if($status['s'][0]->statusID == STATUS_EXECUTADA)
		{
			$data['statusID'] = STATUS_RETORNADA;

			$this->ac_model->atualizaAc($id, $data);

			// Buscar Acompanhante //
			$ac['ac'] 	= $this->ac_model->buscarAC($id);
			$nc['nc'] 	= $this->nc_model->buscarNC( $ac['ac'][0]->ncID );
			$ad['ad']	= $this->auditoria_model->buscarAuditoria( $nc['nc'][0]->auditoriaID );

			// MSG //
			$remetente		= USER_ADMIN;
			$destinatario	= $ad['ad'][0]->acompanhanteID;
			$status 		= STATUS_RETORNADA;

			// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
			$this->mensagem->sendMsg($remetente, $destinatario, " ", " ", $status);
		} 
		else 
		{
			$this->session->set_userdata('msg', 'Ação permitada, somente se Ação Corretiva estiver com status EXECUTADA.');
		}
		
		redirect("nc/visualizarNc/$id2");
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
	
	
		if(($this->getTipo() == USER_AUDITOR) || ($this->getTipo() == USER_ADMIN) || ($this->getTipo() == USER_SUPERVISOR))
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

	function editAC($id)
	{
		$status['s'] = $this->ac_model->buscaStatus($id);
		$ac['ac'] 	= $this->ac_model->buscarAC($id);
		$id2		= $ac['ac'][0]->ncID;
		
		if(($status['s'][0]->statusID == STATUS_AGENDADA) || ($status['s'][0]->statusID == STATUS_RETORNADA))
		{
			$data['main_content']	= 'ac/editAc_view';
	
			$data['ac'] 		= $this->ac_model->listarAC($id);
	
			$this->parser->parse('template', $data);
		}
		else
		{
			$this->session->set_userdata('msg', 'Ação permitada, somente se Ação Corretiva estiver com status AGENDADA ou RETORNADA.');
			redirect("nc/visualizarNc/$id2");
		}
		

		//print_r($data);
	}
	
	
	/**
	 * Recupera as informações do cadastro e grava no banco de dados
	 */
	public function editarAc()
	{
		// Recupera dos dados a serem cadastrados //
		$data['acID']			= $this->input->post('ID');
	
		$data['acAcao']   		= $this->input->post('Acao');
	
		$data['acDescricao']  	= $this->input->post('Descricao');
	
		$id						= $this->input->post('ID2');
	
		$this->ac_model->editar($data);
	
		redirect("nc/visualizarNc/$id");
	
	}

}


