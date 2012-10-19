<?php

class NC_model extends CI_Model {
	
	
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
		return $this->db->insert('NC', $data);
	}

	
	
	public function buscaStatus($id)
	{
		$this->db->select('statusID');
	
		$this->db->from('NC');
	
		$this->db->where('ncID', $id);
	
		$query = $this->db->get();
	
		return $query->result();
	}
	
	
	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');
		
		$this->db->from('NC');

		$this->db->join('Status' , 'Status.statusID = NC.statusID');
		$this->db->join('Artefato' , 'Artefato.artefatoID = NC.artefatoID');

		$query = $this->db->get();
		
		return $query->result();
	}
	
	
	/**
	 * Lista dados
	 */
	function listarNc($id)
	{
		$this->db->select('*');
		
		$this->db->from('NC');
	
		$this->db->where('ncID', $id);
	
		$this->db->join('Status' , 'Status.statusID = NC.statusID');
		$this->db->join('Artefato' , 'Artefato.artefatoID = NC.artefatoID');
	
		$query = $this->db->get();
	
		return $query->result();
	}

	/**
	 * Lista Auditorias com status = Agendadas 
	 */
	function listarAbertas($id) 
	{
		$this->db->select('*');
		
		$this->db->from('NC');

		$this->db->where('statusID', $id);

		$this->db->join('Usuario' , 'Usuario.usuarioID = ncResponsavel');

		$query = $this->db->get();
		
		return $query->result();
	}
	
	
	public function setStatus($id, $data)
	{
		$status = $data['statusID'];
		$date = $data['acDataFinal'];
		$query = $this->db->query("UPDATE NC SET StatusID='$status', ncDataFinal='$date' WHERE ncID='$id'");
	}
	
	
	function editar($data)
	{
		$id 			= $data['ncID'];
		
		$descricao		= $data['ncDescricao'];
		
		$date			= $data['ncDataFinalprev'];
		
		$comentario		= $data['ncComentario'];
		
		$query = $this->db->query("UPDATE NC SET ncDescricao='$descricao', ncDataFinalprev='$date',
				ncComentario='$comentario' WHERE ncID='$id'");
	}
	
	/**
	 * Lista dados
	 */
	function listarNcFromAuditoria($id)
	{
		$this->db->select('ncID');
	
		$this->db->from('NC');
	
		$this->db->where('auditoriaID', $id);
	
		$query = $this->db->get();
	
		return $query->result();
	}


	/**
	 * Buscar NC
	 */
	function buscarNC($id) 
	{
		$this->db->select('*');
		
		$this->db->from('NC');

		$this->db->where('ncID', $id);

		$query = $this->db->get();
		
		return $query->result();
	}


	/**
	 * Procura e deleta na BD
	 */
    	function deletar($id)
    	{
	    $this->db->where('auditoriaID', $id);
	    $this->db->delete('NC');

	}
}
