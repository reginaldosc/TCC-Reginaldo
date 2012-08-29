<?php

class Role_model extends CI_Model {
	
	
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
		return $this->db->insert('Role', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');
		$this->db->from('Role');
		$query = $this->db->get();
		
		return $query->result();
	}


	/**
	 * Procura e deleta na BD
	 */
    function delete($id)
    {
	    $this->db->where('roleID', $id);
	    $this->db->delete('Role');

	}
}

?>