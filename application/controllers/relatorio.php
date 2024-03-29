<?php

class Relatorio extends CI_Controller {


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


	public function listAll()
	{
		// Carrega a view correspondende //
		$data['auditorias'] = $this->relatorio_model->listaAuditorias(1);

		$data['ncs'] = $this->relatorio_model->listaNCs(1);

		$data['acs'] = $this->relatorio_model->listaACs(1);

		$data['main_content'] = 'relatorio/relatorio_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);
	}


	/**
	 * Gera o relatorio de auditorias do sistema 
	 */
	public function relatAuditoria($status)
	{

		$data = $this->relatorio_model->listaAuditorias($status);

		echo json_encode($data);
		return;
	}

	/**
	 * Gera o relatorio de NC do sistema 
	 */
	public function relatNC($status)
	{
		$data = $this->relatorio_model->listaNCs($status);

		echo json_encode($data);
		return;
	}

	/**
	 * Gera o relatorio de AC do sistema 
	 */
	public function relatAC($status)
	{
		$data = $this->relatorio_model->listaACs($status);

		echo json_encode($data);
		return;	
	}	


}


/* End of file relatorio.php */
/* Location: ./application/controllers/relatorio.php */