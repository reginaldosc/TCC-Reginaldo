<?php

class Escalonamento extends CI_Controller {


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
	* Verifica os status dos Auditoria, NC do sistema
	*/
	public function run()
	{

		/**
		* Analisa Auditorias
		*
		* - Verifica se tem status -> Agendanda
		* - Analisa se a data agendada é maior que atual
		* - Se for maior, envia e-mail/msg para Supervisor do auditor responsavel pela auditoria
		*
		*/

		// Lista todas as auditorias //
		$data['auditorias'] = $this->auditoria_model->listarAgendadas(STATUS_AGENDADA);

		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data, 'auditorias', 'auditoriaDataInicio');

		if (!empty($data['auditorias']))
		{
			$tamanho = sizeof($data['auditorias']);

			for ($i=0; $i < $tamanho; $i++)
			{	


				$date = $data['auditorias'][$i]->auditoriaDataInicio;
				$retorno = date_is_menor_hoje($date);

				if ($retorno)
				{
					// Se a data agendada para a auditoria for menor que a data atual, será enviado mensagem sobre o atraso para o supervisor //

					// Usuario departamento e tipoID = 3

					$id_auditor	=	$data['auditorias'][$i]->auditorID;

					$dados['usuario'] = $this->usuario_model->buscar($id_auditor);

					$id_departamento = $dados['usuario'][0]->departamentoID; 

					$id['supervisor']	=	$this->usuario_model->buscarByUsuarioID($id_departamento,USER_SUPERVISOR);

					// MSG //
					$remetente		= USER_ADMIN;
					$destinatario	= $id['supervisor'][0]->usuarioID;
					$status 		= STATUS_DIRETA;


					$assunto = "Auditoria Atrasada";

					//Criando Mensagem //
					$projeto 		= $data['auditorias'][$i]->projetoNome;
					$departamento 	= $data['auditorias'][$i]->departamentoNome;
					$responsavel 	= $dados['usuario'][0]->usuarioNome;

					$mensagem = "A Auditoria do projeto $projeto pertencente ao departamento $departamento está atrasada. A data agendada para execução foi $date. A mesma está sob responsabilidade do usuario $responsavel.";


					// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
					$this->mensagem->sendMsg($remetente, $destinatario, $assunto, $mensagem , $status);


					// recupera Email do supervisor //
					$emailTo = $id['supervisor'][0]->usuarioEmail;

					// Envia E-mail para o supervisor //
					$this->mail->envia_email($emailTo, $assunto, $mensagem, "RG Quality");

				}
			}
		}


		/**
		* Analisa NC
		*
		* - Verifica se tem status -> Aberta
		* - Analisa se a data Aberta é maior que atual
		* - Se for maior que atual, envia e-mail/msg para Chefe, Supervisor
		*
		*/

		// Lista todas as NC com status de Aberta //
		$data['ncs'] = $this->nc_model->listarAbertas(STATUS_ABERTA);

		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data, 'ncs', 'ncDataFinalprev');


		if (!empty($data['ncs']))
		{
			$tamanho = sizeof($data['ncs']);

			for ($i=0; $i < $tamanho; $i++)
			{	


				$date = $data['ncs'][$i]->ncDataFinalprev;
				$retorno = date_is_menor_hoje($date);

				if ($retorno)
				{
					// Se a data agendada para a efetuar a acao corretiva for menor que a data atual, será enviado mensagem sobre o atraso para o supervisor //


					// Recupera ID auditoria //
					$id_auditoria = $data['ncs'][$i]->auditoriaID;

					// Recupera auditoria //
					$data['auditoria'] = $this->auditoria_model->buscarAuditoria($id_auditoria);

					// Recupera projeto ID //
					$id_projeto = $data['auditoria'][0]->projetoID;

					$data['projeto'] = $this->projeto_model->buscar($id_projeto);


					$id_departamento	=	$data['projeto'][0]->departamentoID;

					//Recupera dados do supervisor //
					$id['supervisor']	=	$this->usuario_model->buscarByUsuarioID($id_departamento,USER_SUPERVISOR);

					// MSG //
					$remetente		= USER_ADMIN;
					$destinatario	= $id['supervisor'][0]->usuarioID;
					$status 		= STATUS_DIRETA;


					$assunto = "Não Conformidade Atrasada";


					// Recupera dados do departamento //
					$data['departamento'] = $this->departamento_model->buscar($id_departamento);

					//Criando Mensagem //
					$projeto 		= $data['projeto'][0]->projetoNome;
					$departamento 	= $data['departamento'][0]->departamentoNome;
					$NC 			= $data['ncs'][$i]->ncDescricao;
					$responsavel 	= $data['ncs'][$i]->usuarioNome;

					$mensagem = "A Não Conformidade ($NC) pertencente ao departamento $departamento referente ao projeto $projeto que foi auditado, está atrasada. Tinha data prevista para finalizar em $date. A mesma está sob responsabilidade do usuario $responsavel.";


					// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
					$this->mensagem->sendMsg($remetente, $destinatario, $assunto, $mensagem , $status);


					// recupera Email do supervisor //
					$emailTo = $id['supervisor'][0]->usuarioEmail;

					// Envia E-mail para o supervisor //
					$this->mail->envia_email($emailTo, $assunto, $mensagem, "RG Quality");

				}
			}
		}

		echo " Passou pelas funcoes de escalonamento !";
	}

	/**
	 * Salva mensagem 
	 */
	public function cadastrarMsg($data)
	{
		$this->mensagem_model->cadastrarUsuarioMensagem($data);

	} 	


}


/* End of file escalonamento.php */
/* Location: ./application/controllers/escalonamento.php */