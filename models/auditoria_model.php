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

		$query = $this->db->get();
		
		return $query->result();
	}




	/**
	* Insere a execução da auditoria
	*/ 
	function cadastrarExec($data) 
	{
		//$data['auditoriaStatus'] = 'teste';

		$data['auditoriaID'] = '1';

		//$this->db->update('Auditoria', 'auditoriaStatus'); 		
		
		$data['auditoriaAcompanhante'] = '3';

		$data[artefatoNome] = '1';

		$data[artefatoStatus] = 'Conforme';

		//UPDATE `Auditoria` SET `auditoriaStatus`='realizada' WHERE  `auditoriaID`=1		
//		$this->db->where('auditoriaID', $data[auditoriaID]);
		
		return $this->db->insert('AuditoriaExec', $data);
		
	}

	/**
	* Lista dados da auditoria executada
	*/
	function listarExec() 
	{
		$this->db->select('*');
		
		$this->db->from('AuditoriaExec');

		$this->db->join('Auditoria', 'Auditoria.auditoriaID = AuditoriaExec.auditoriaID');

		$this->db->join('Projeto' , 'Projeto.projetoID = Auditoria.projetoID');
	
		$this->db->join('Departamento', 'Departamento.departamentoID = AuditoriaExec.auditoriaID');

		//$this->db->join('Auditoria', 'Auditoria.auditoriaDataFinal = AuditoriaExec.auditoriaID');

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
}
