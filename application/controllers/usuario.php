<?php

/**
 * Classe para controlar as funcoes relacionadas ao Usuario 
 */
class Usuario extends CI_Controller {


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


	/**
	 * Chama a view para listar usuarios e socita ao model todos os usuarios cadastrados do bd
	 */
	public function listAll()
	{

		// Lista todos os usuarios //
		$data['usuarios'] = $this->usuario_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'usuario/listUser_view';
		
		// Envia todas as informacoes para tela //
		$this->parser->parse('template', $data);

	} 


	/**
	 *
	 * Apresenta view de cadastro de novo usuario
	 *
	 */
	public function newUser()
	{
		// Lista todos os cargos //
		$data['cargos'] = $this->cargo_model->listar();

		// Lista todos os departamentos //
		$data['departamentos'] = $this->departamento_model->listar();

		// Lista todas as unidades de negocio //
		$data['unidades'] = $this->unidade_model->listar();

		// Lista todos os tipos de usuario //
		$data['tipos'] = $this->tipo_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'usuario/newUser_view';

		// Envia todas as informacoes para tela //		
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informacoes da view newUser, e carrega o model para gravar no banco os dados
	 */
	public function cadastrarUser() 
	{
	
		// Recupera dos dados a serem cadastrados //
		$data['usuarioNome']     	= $this->input->post('Nome');
		$data['usuarioMatricula']	= $this->input->post('Matricula');
		$data['usuarioLogin']    	= create_username($this->input->post('Nome'), $this->input->post('Matricula'));
		$data['usuarioPassword'] 	= create_username($this->input->post('Nome'), $this->input->post('Matricula')); 
		$data['usuarioEmail']    	= $this->input->post('Email');
		$data['cargoID']    		= $this->input->post('Cargo');
		$data['departamentoID']		= $this->input->post('Setor');
		$data['tipoID']   		    = $this->input->post('Tipo');
			 
		 
		// Insere os dados do novo usuario no bd //
		$this->usuario_model->cadastrar($data);

		redirect('usuario/listAll');

	}


	/**
	 *
	 * Apresenta view de edicao de um usuario
	 *
	 */
	public function editUser($id)
	{
		$data2['main_content']	= 'usuario/editUser_view';	

		$data['usuario'] 		= $this->usuario_model->buscar($id);

		//print_r($data);
		
		$data2['usuarioID'] 	= $data['usuario'][0]->usuarioID;
		
		$data2['usuarioNome'] 	= $data['usuario'][0]->usuarioNome;
		
		$data2['usuarioEmail'] 	= $data['usuario'][0]->usuarioEmail;
		
		$data2['cargos']		= $this->cargo_model->listar();
		
		$data2['unidades']		= $this->unidade_model->listar();
		
		$data2['departamentos']	= $this->departamento_model->listar();
		
		$data2['tipos']			= $this->tipo_model->listar();
				
		$this->parser->parse('template', $data2);
	}


	/**
	 * Recupera as informacoes da view newUser, e carrega o model para gravar no banco os dados
	 */
	public function editUsuario()
	{
	
		// Recupera dos dados a serem cadastrados //
		$id							= $this->input->post('ID');
		$data['usuarioNome']     	= $this->input->post('Nome');
		$data['usuarioEmail']    	= $this->input->post('Email');
		$data['cargoID']    		= $this->input->post('Cargo');
		$data['departamentoID']		= $this->input->post('Setor');
		$data['tipoID']   		    = $this->input->post('Tipo');
	
		//print_r($data);	
		// Insere os dados do novo usuario no bd //
		$this->usuario_model->atualizaUsuario($id, $data);
	
		redirect('usuario/listAll');
	
	}
	
	
	
	
	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteUser($id)
	{
		
		$this->usuario_model->deletar($id);
		
		redirect('usuario/listAll','refresh');
	}	

	/**
	 * Apresenta a view de informacoes do usuario
	 */
	public function pageUser($login)
	{
			
		// Carrega a view correspondende //
		$data['main_content'] = 'usuario/pageUser_view';
		
		//print_r($data);
				
		$data['usuario'] = $this->usuario_model->buscarByLogin($login);
		
		$tipo = $data['usuario'][0]->tipoID;
		
		$data['tipo'] = $this->tipo_model->buscar($tipo);
		
		// Envia todas as informacoes para tela //			
		$this->parser->parse('template', $data);
	}

	
	public function mudaSenha($id)
	{
		
		$data['usuarioPWD']     = $this->input->post('senha');
		
		echo($id);
		
		//$data['usuario'] 		= buscar($id);
				
		print_r($data);
		
		//atualizaSenha($data);
	}
	
}


/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */
