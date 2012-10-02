<?php

class Auditoria_model extends CI_Model {
	
	
	/**
	 * Inicia construtor do model
	 */
	function __construct() 
	{
		parent::__construct();
	}


	/**
	  * Insere 
	  */ 
	function cadastrar($data) 
	{
		return $this->db->insert('Auditoria', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');
		
		$this->db->from('Auditoria');

		$this->db->join('Projeto' , 'Projeto.projetoID = Auditoria.projetoID');

		$this->db->join('Departamento' , 'Departamento.departamentoID = Projeto.departamentoID');

		$this->db->join('Unidade' , 'Unidade.unidadeID = Departamento.unidadeID');

		$this->db->join('Usuario' , 'Usuario.usuarioID = Auditoria.auditorID');

		$this->db->join('Status' , 'Status.statusID = Auditoria.statusID');

		$query = $this->db->get();
		
		return $query->result();
	}



	/**
	* Insere a execução da auditoria
	*/ 
	function cadastrarPAS($data) 
	{
		return $this->db->insert('Projeto_Artefato', $data);
	}


	/**
	* Insere a execução da auditoria
	*/ 
	function cadastrarAU($data) 
	{
		return $this->db->insert('Auditoria_Usuario', $data);
	}

	/**
	* Atualiza status da auditoria
	*/ 
	function atualizaAuditoria($id, $data) 
	{
		$this->db->update('Auditoria', $data, "auditoriaID = $id");
	}


	/**
	* Lista dados da auditoria executada
	*/
	function listarExec() 
	{
		$this->db->select('*');
		
		$this->db->from('AuditoriaExec');

		$query = $this->db->get();
		
		return $query->result();
	}

	/**
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('auditoriaID', $id);
	    $this->db->delete('Auditoria');

	}

	/**
	 * Procura e deleta na BD
	 */
    function deletarPA($id)
    {
	    $this->db->where('projetoID', $id);
	    $this->db->delete('Projeto_Artefato');

	}


	function executar($id)
	{
		
		$this->db->select('*');
		
		$this->db->from('Auditoria');

		$this->db->where('auditoriaID', $id);

		$this->db->join('Projeto' , 'Projeto.projetoID = Auditoria.projetoID');
	
		$this->db->join('Usuario' , 'Usuario.usuarioID = Auditoria.auditorID');

		$this->db->join('Departamento' , 'Departamento.departamentoID = Projeto.departamentoID');

		$this->db->join('Unidade' , 'Unidade.unidadeID = Departamento.unidadeID');

		$query = $this->db->get();
		
		return $query->result();		    
	}


	function listarAuditoria($id)
	{
		
		$this->db->select('*');
		
		$this->db->from('Auditoria');

		$this->db->where('auditoriaID', $id);

		$this->db->join('Projeto' , 'Projeto.projetoID = Auditoria.projetoID');
	
		$this->db->join('Usuario' , 'Usuario.usuarioID = Auditoria.auditorID', 'Usuario.usuarioID = Auditoria.acompanhanteID');

		$this->db->join('Departamento' , 'Departamento.departamentoID = Projeto.departamentoID');

		$this->db->join('Unidade' , 'Unidade.unidadeID = Departamento.unidadeID');


		$query = $this->db->get();
		
		return $query->result();		    
	}

	function listarProjeto_Arfetato($id)
	{

		$this->db->select('*');

		$this->db->from('Projeto_Artefato');

		$this->db->where('projetoID', $id);

		$this->db->join('Status' , 'Status.statusID = Projeto_Artefato.statusID');

		$this->db->join('Artefato' , 'Artefato.artefatoID = Projeto_Artefato.artefatoID');

		$query = $this->db->get();
		
		return $query->result();	

	}

}
