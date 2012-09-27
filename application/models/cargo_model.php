<?php

class Cargo_model extends CI_Model {
	
	
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
		return $this->db->insert('Cargo', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');
		$this->db->from('Cargo');
		$query = $this->db->get();
		
		return $query->result();
	}


	/**
	 * Busca um cargo
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT cargoID, cargoNome FROM Cargo WHERE cargoID = '$id' LIMIT 1");
	
		return $query->result();
	
	}
	
	
	/**
	 * Edita
	 */
	function editar($data)
	{
		$id 			= $data['cargoID'];
	
		$nome 			= $data['cargoNome'];
	
		$query = $this->db->query("UPDATE Cargo SET cargoNome='$nome' WHERE cargoID='$id'");
			
	}
	
	
	
	/**
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('cargoID', $id);
	    $this->db->delete('Cargo');

	}
}

?>
