<?php

class User_model extends CI_Model {
	
	
	/**
	 * Inicia construtor do model
	 */
	function __construct() 
	{
		parent::__construct();
	}


	function validar()
	{
		 $this->db->where('userLogin', $this->input->post('login'));
		 $this->db->where('userPassword',$this->input->post('password'));
		 $query = $this->db->get('User');

		 if ($query->num_rows == 1)
		 {
		 	return true;
		 }

	}


	/**
	  * Insere usuario no banco de dados
	  */ 
	function cadastrar($data) 
	{
		return $this->db->insert('User', $data);
	}


	/**
	 * Lista usuarios do banco de dados
	 */
	function listar() 
	{

		$this->db->select('*');

		$this->db->from('User');
		
		$this->db->join('Role', 'roleID = Role_roleID');
		
		$this->db->join('EAG', 'EAG_eagID = eagID');
		
		$this->db->join('Type', 'typeID = Type_typeID');
		
		$this->db->join('Department', 'departmentID = Department_departmentID');
		
		$query = $this->db->get();
		
		return $query->result();
	}


	/**
	 * Procura e deleta usuario do BD 
	 */
    function deletar($id)
    {
	    $this->db->where('userID', $id);
	    $this->db->delete('User');

	}
}