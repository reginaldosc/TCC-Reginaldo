<?php

class Departamento_model extends CI_Model {
	
	
	/**
	 * Inicia construtor do model
	 */
	function __construct() 
	{
		parent::__construct();
	}


	/**
	* valida usuario
	*/
	function validar()
	{
		 $this->db->where('usuarioLogin', $this->input->post('login'));
		 $this->db->where('usuarioPassword',$this->input->post('password'));
		 $query = $this->db->get('Usuario');

		 if ($query->num_rows == 1)
		 {
		 	return true;
		 }

	}


	/**
	  * Insere 
	  */ 
	function cadastrar($data) 
	{
		return $this->db->insert('Departamento', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');

		$this->db->from('Departamento');

		$this->db->join('Unidade', 'Departamento.unidadeID = Unidade.unidadeID');

		$query = $this->db->get();
		
		return $query->result();
	}

	
	/**
	 * Busca um departamento
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT departamentoID, departamentoNome, unidadeID FROM Departamento
				 WHERE departamentoID = '$id' LIMIT 1");
	
		return $query->result();
	
	}
	
	
	/**
	 * Edita
	 */
	function editar($data)
	{
		$id 			= $data['departamentoID'];
	
		$nome 			= $data['departamentoNome'];
		
		$unidade		= $data['unidadeID'];
	
		$query = $this->db->query("UPDATE Departamento SET departamentoNome='$nome', unidadeID='$unidade'
				 WHERE departamentoID='$id'");
			
	}
	

	/**
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('departamentoID', $id);
	    $this->db->delete('Departamento');

	}
}

?>
