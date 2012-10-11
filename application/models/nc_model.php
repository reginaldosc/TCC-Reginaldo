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
	 * Procura e deleta na BD
	 */
    	function deletar($id)
    	{
	    $this->db->where('auditoriaID', $id);
	    $this->db->delete('NC');

	}
}
