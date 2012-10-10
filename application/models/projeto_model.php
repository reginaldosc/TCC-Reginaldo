<?php


class Projeto_model extends CI_Model {
	
	
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
		return $this->db->insert('Projeto', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');

		$this->db->from('Projeto');

		$this->db->join('Departamento', 'Projeto.departamentoID = Departamento.departamentoID');

		$query = $this->db->get();
		
		return $query->result();
	}

	
	/**
	 * Busca um projeto
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT projetoID, projetoNome, departamentoID
				FROM Projeto WHERE projetoID = '$id' LIMIT 1");
		
		return $query->result();
				
	}
	
	
	/**
	* Edita
	 */
	 function editar($data)
	 {
	 $id 			= $data['projetoID'];
	
	 $nome 			= $data['projetoNome'];
	
	 $departamento 	= $data['departamentoID'];
	
	 $query = $this->db->query("UPDATE Projeto SET projetoNome='$nome', departamentoID='$departamento'
	 		WHERE projetoID='$id'");
	 			
	 }
	

	/**
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('projetoID', $id);
	    $this->db->delete('Projeto');

	}

	/**
	 * 
	 */
	function getProjetoFromAuditoria($id)
	{
		$this->db->select('projetoID')->from('Auditoria')->where('auditoriaID', $id);

		$query = $this->db->get();
		
		return $query->result();

	}


	/**
	 * Verifica se o projeto está associado a alguma auditoria.
	 */
	function projetoAuditado($id)
	{
		$this->db->select('projetoID')->from('Auditoria')->where('projetoID', $id);

		$query = $this->db->get();
		
		return $query->result();

	}
}
