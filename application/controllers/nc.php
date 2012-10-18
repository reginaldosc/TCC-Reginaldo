<?php 

class NC extends CI_Controller {


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
		return "não conformidade";
	}
	
	/**
	 * Apresenta a view com todos os projetos cadastrados no sistema 
	 */
	public function listAll()
	{

		// Lista todos os projetos //
		$data['ncs'] = $this->nc_model->listar();

		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data,'ncs','ncDataFinalprev');

		if($this->getTipo() == USER_AUDITOR)
		{
			$data['main_content'] = 'nc/auditor/listNc_auditor_view';
		}
		elseif($this->getTipo() == USER_SUPERVISOR)
		{
			$data['main_content'] = 'nc/supervisor/listNc_supervisor_view';
		}
		else
		{
			// Carrega a view correspondende //
			$data['main_content'] = 'nc/listNc_view';
		}
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarNc() 
	{

		// Recupera a data informada pelo usuario //
		$date = $this->input->post('Data');

		// Converte a dada informada para o formato mysql //
		$date_mysql = implode("-",array_reverse(explode("/",$date)));
		
		// Recupera dos dados a serem cadastrados //
		$data['ncDescricao']   		= $this->input->post('Descricao');
		$data['ncDataFinalprev']   	= $date_mysql;
		$data['ncComentario']  		= $this->input->post('Comentario');
		$data['auditoriaID']  		= $this->input->post('Auditoria');
		$data['artefatoID']  		= $this->input->post('Artefato');

		$data['statusID']   		= STATUS_ABERTA;
		
		$this->nc_model->cadastrar($data);

		// MSG //
		$remetente		= USER_ADMIN;
		$destinatario	= $this->input->post('Acompanhante');
		$status 		= STATUS_ABERTA;

		// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
		$this->mensagem->sendMsg($remetente, $destinatario, " ", " ", $status);

	}

	public function buscarNc($id)
	{
		$status['s'] = $this->nc_model->buscaStatus($id);
		
		if(($status['s'][0]->statusID == STATUS_ABERTA))
		{
			$data['main_content']	= 'nc/auditor/editNc_view';
		
			$data['nc'] 			= $this->nc_model->listarNc($id);
		
			$this->parser->parse('template', $data);
		}
		else
		{
			$this->session->set_userdata('msg', 'Ação permitada, somente se a Não Conformidade estiver
					com status ABERTA.');
			//print_r($status[0]->statusID);
			redirect("nc/listAll");
		}
	
	}
	
	
	
	public function editarNc()
	{
		
		// Recupera a data informada pelo usuario //
		$date = $this->input->post('Data');
		
		// Converte a dada informada para o formato mysql //
		$date_mysql = implode("-",array_reverse(explode("/",$date)));
		
		$data['ncID']				= $this->input->post('ID');
		$data['ncDescricao']   		= $this->input->post('Descricao');		
		$data['ncDataFinalprev']   	= $date_mysql;
		$data['ncComentario']  		= $this->input->post('Comentario');
		
		//print_r($data);
		$this->nc_model->editar($data);
		
		redirect('nc/listAll','refresh');
	}
	
	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteNc($id)
	{

		$this->nc_model->deletar($id);
		
		redirect('nc/listAll','refresh');
	}
	
	
	function verificaStatusAcs($id)
	{
		$igual = "FALSE";
		$data['acs'] = $this->ac_model->listarAcByNc($id);
		
		for ($i=0; $i < count($data['acs']); $i++)
		{
			if($data['acs'][$i]->statusNome == 'Fechada')
			{
				$igual = "TRUE";
			}
			else
			{
				$igual = "FALSE";
				break;
			}
		}
		return $igual;
	}
	
		
	/**
	 * Visualiza nao conformidade
	 */
	public function visualizarNc($id)
	{

		$status = $this->verificaStatusAcs($id);
		
		if($status == "TRUE")
		{
			$statusID = 8;
			$this->nc_model->setStatus($id, $statusID);
		}
		
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
		$data['acs'] = $this->ac_model->listarAcByNc($id);

		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data,'acs','acDataFinal');

		//print_r($data);
		
		if($this->getTipo() == USER_AUDITOR)
		{
			$data['main_content'] = 'nc/auditor/nc_auditor_view';
		}
		elseif($this->getTipo() == USER_SUPERVISOR)
		{
			// Carrega a view correspondende //
			$data['main_content'] = 'nc/supervisor/nc_supervisor_view';
		}
		else
		{
			// Carrega a view correspondende //
			$data['main_content'] = 'nc/nc_view';
		}
		// Envia todas as informacoes para tela //
		$this->parser->parse('template', $data);

		

	}


	/**
	 * Envia mensagem ao usuário
	 */
	public function cadastrarMsg($data)
	{
		$this->mensagem_model->cadastrarUsuarioMensagem($data);
	}
}


