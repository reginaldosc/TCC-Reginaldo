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
	 * Verifica se o usuario esta logado
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
		return "auditoria";
	}
	
	/**
	 * Apresenta a view com todas as auditorias cadastradas no sistema 
	 */
	public function listAll()
	{

		// Lista todas as auditorias //
		$data['auditorias'] = $this->auditoria_model->listar();

		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data, 'auditorias', 'auditoriaDataInicio');


		if ($this->getTipo() == USER_AUDITOR)
		{
			$data['main_content'] = 'auditoria/auditor/listAuditoria_view';

		}
		else
			{
			$data['main_content'] = 'auditoria/admin/listAuditoria_view';
			}

		// // Envia todas as informacoes para tela //
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
		$data['unidades'] = $this->unidade_model->listar(2);

		// Lista todos os departamentos //
		$data['departamentos'] = $this->departamento_model->listar(2);

		// Lista todos os projetos //
		$data['projetos'] = $this->projeto_model->listar(2);

		// Carrega a view correspondende //
		$data['main_content'] = 'auditoria/newAuditoria_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarAuditoria() 
	{

		$this->form_validation->set_rules('Projeto', 'projeto', 'callback_projeto_check');
		$this->form_validation->set_rules('Data', 'data', 'callback_date_check');

		if ($this->form_validation->run() == FALSE)
		{
			// se conter error, retorna tela de cadastro de newAuditoria
			$this->newAuditoria();
		}
		else
		{

			// Recupera a data informada pelo usuario //
			$date = $this->input->post('Data');

			// Converte a dada informada para o formato mysql //
			$date_mysql = implode("-",array_reverse(explode("/",$date)));
			

			// Recupera dos dados a serem cadastrados //

			$data['auditorID'] 				= $this->input->post('Auditor');

			$data['projetoID']   			= $this->input->post('Projeto');
			
			$data['statusID']				= STATUS_AGENDADA;

			$data['auditoriaDataInicio']   	= $date_mysql;

			
			$this->auditoria_model->cadastrar($data);


			// MSG //
			$remetente		= USER_ADMIN;
			$destinatario	= $data['auditorID'];
			$status 		= STATUS_AGENDADA;

			// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
			$this->mensagem->sendMsg($remetente, $destinatario, " ", " ", $status);

			redirect('auditoria/listAll','refresh');

		}

	}


	/**
	 * Recupera as informacoes do cadastro e grava no bando de dados
	 */
	public function cadastrarExecAuditoria() 
	{
		
		// Recupera dos dados a serem cadastrados //

		$data['projetoID'] = $this->input->post('Projeto');

		$array_artefatos = $this->input->post('allArtefatos');
		$array_artefatos = explode("," ,$array_artefatos);

		$tam = count($array_artefatos);

		for ($i=0; $i < $tam; $i++) { 

			list ($data['artefatoID'], $data['statusID'] ) = explode ('-', $array_artefatos[$i]);
			$this->auditoria_model->cadastrarPAS($data);
		 }


		// Atualiza status auditoria //
		$id  = $this->input->post('Auditoria');
		$data2 ['acompanhanteID'] = $this->input->post('Acompanhante');
		$data2 ['statusID']  = STATUS_EXECUTADA;

		$this->auditoria_model->atualizaAuditoria($id, $data2);


		// MSG //
		$remetente		= USER_ADMIN;
		$destinatario	= $data2 ['acompanhanteID'];
		$status 		= STATUS_EXECUTADA;

		// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
		$this->mensagem->sendMsg($remetente, $destinatario, " ", " ", $status);

		redirect('auditoria/listAll','refresh');

	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteAuditoria($id)
	{

		$data['ncs'] = $this->nc_model->listarNcFromAuditoria($id);

		// Deleta as AC relacionadas as NC //
		if (!empty($data['ncs']))
		{
			$tamanho = sizeof($data['ncs']);
		
			for ($i=0; $i < $tamanho; $i++)
			{
				$ncID = $data['ncs'][$i]->ncID;
				$this->ac_model->deletarAcFromNC($ncID);
			}
		}
		
		// Deletar todos as nao conformidades //
		$this->nc_model->deletar($id);
		
		$data['projeto'] = $this->projeto_model->getProjetoFromAuditoria($id);

		$projetoID = $data['projeto'][0]->projetoID;
		
		// Deletar dados da tabela Projeto_Artefato //
		$this->auditoria_model->deletarPA($projetoID);

		
		// Deletar dados da tabela Auditoria //
		$this->auditoria_model->deletar($id);
		
		redirect('auditoria/listAll','refresh');
	}	

	/**
	 * Chama o model para executar a auditoria selecionada, apos essa operacao retorna a HOME
	 */
	public function execAuditoria($id)
	{

		$data['auditorias'] = $this->auditoria_model->executar($id);

		if ($data['auditorias'][0]->statusID == STATUS_AGENDADA)
		{

			// converte as datas do formato mysql para formato dd/mm/aaaa
			$data = convert_date($data, 'auditorias', 'auditoriaDataInicio');

			// Lista todos os usuarios //
			$data['usuarios'] = $this->usuario_model->listarPorTipo('4');

			// Lista todos os artefatos //
			$data['artefatos'] = $this->artefato_model->listar(2);

			// Carrega a view correspondende //
			$data['main_content'] = 'auditoria/execAuditoria_view';
			
			// Envia todas as informacoes para tela //
			$this->parser->parse('template', $data);

		}
		else 
		{

			$this->session->set_userdata('msg', 'Essa auditoria já foi executada.');

			redirect('auditoria/listAll');

		}
		
	}

	/**
	 * Visualiza auditoria selecionada 
	 */
	public function visualizarAuditoria($id)
	{
				
		// Lista todas as auditorias //
		$data['auditorias'] = $this->auditoria_model->listarAuditoria($id);


		if ($data['auditorias'][0]->statusID == STATUS_EXECUTADA)
		{

			// converte as datas do formato mysql para formato dd/mm/aaaa
			$data = convert_date($data, 'auditorias', 'auditoriaDataInicio');

			$projeto = $data['auditorias'][0]->projetoID;
			$acompanhante = $data['auditorias'][0]->acompanhanteID;

			$data['acompanhante'] = $this->usuario_model->getUsuario($acompanhante);
			$data['projetos_artefatos'] = $this->auditoria_model->listarProjeto_Arfetato($projeto);

			// Carrega a view correspondende //
			$data['main_content'] = 'auditoria/auditoria_view';
			
			// Envia todas as informacoes para tela //
			$this->parser->parse('template', $data);
		}
		else
		{
			
			$this->session->set_userdata('msg', 'É necessário executar a auditoria, para poder visualizá-la.');

			redirect('auditoria/listAll');
		}

	}


	public function editAuditoria($id)
	{
		
		// Lista todas as auditorias //
		$data['auditorias'] = $this->auditoria_model->listarAuditoria($id);
		
		if ($data['auditorias'][0]->statusID == STATUS_AGENDADA)
		{
		
			$data['id'] = $id;
			
			// Lista todas as unidades de negocio //
			$data['unidades'] = $this->unidade_model->listar(2);
	
			// Lista todos os departamentos //
			$data['departamentos'] = $this->departamento_model->listar(2);
	
			// Lista todos os projetos //
			$data['projetos'] = $this->projeto_model->listar(2);
	
			// Carrega a view correspondende //
			$data['main_content'] = 'auditoria/editAuditoria_view';
	
			// Envia todas as informações para tela //			
			$this->parser->parse('template', $data);
		
		}
		else
		{
			$this->session->set_userdata('msg', 'Essa auditoria já foi executada, não é possivel edita-la.');
			
			redirect('auditoria/listAll');
			
		}
	}
	

	public function editarAuditoria()
	{
			
		$id								= $this->input->post('Auditoria');
		
		$data['auditorID']				= $this->input->post('Auditor');
	
		$data['projetoID'] 				= $this->input->post('Projeto');
		
		// Recupera a data informada pelo usuario //
		$date 							= $this->input->post('Data');
		
		// Converte a dada informada para o formato mysql //
		$date_mysql 					= implode("-",array_reverse(explode("/",$date)));
	
		$data['auditoriaDataInicio']	= $date_mysql;
		
		$this->auditoria_model->atualizaAuditoria($id, $data);
	
		redirect('auditoria/listAll');
	
	}


	/**
	 * Salva mensagem 
	 */
	public function cadastrarMsg($data)
	{
		$this->mensagem_model->cadastrarUsuarioMensagem($data);

	}


	/*
	|--------------------------------------------------------------------------
	| Callbacks
	|--------------------------------------------------------------------------
	|
	| Funcoes de callback para validacao de dados
	|
	*/


	/**
	 * Analisa se projeto já está em uma auditoria
	 */
	public function projeto_check($id)
	{

		$data['auditado'] = $this->projeto_model->projetoAuditado($id);

		if (!empty($data['auditado']) and ($id == $data['auditado'][0]->projetoID) )
		{
			$this->form_validation->set_message('projeto_check', ' - O %s está sendo auditado em outra auditoria. Favor selecionar outro projeto.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


	/**
	 * Analisa se a data é maior que a data atual
	 */
	public function date_check($date)
	{

		$retorno = date_is_bigger($date);

		if(!$retorno)  
		{
			$this->form_validation->set_message('date_check', ' - A %s não pode ser menor que a data atual.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


}


/* End of file auditoria.php */
/* Location: ./application/controllers/auditoria.php */
