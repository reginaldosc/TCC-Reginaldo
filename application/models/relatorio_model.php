<?php

class Relatorio_model extends CI_Model {
	
	
	/**
	 * Inicia construtor do model
	 */
	function __construct() 
	{
		parent::__construct();
	}


	// Relatorio de auditorias //
	function listaAuditorias($status)
	{


		if ($status == 'agendada')
		{

			$this->db->select('*');
			
			$this->db->from('Auditoria');

			$this->db->join('Projeto' , 'Projeto.projetoID = Auditoria.projetoID');

			$this->db->join('Departamento' , 'Departamento.departamentoID = Projeto.departamentoID');

			$this->db->join('Unidade' , 'Unidade.unidadeID = Departamento.unidadeID');

			$this->db->join('Status' , 'Status.statusID = Auditoria.statusID');

			$this->db->where('Status.statusID', STATUS_AGENDADA);

			$consulta = $this->db->get();

			return $consulta->result();

		}
		
		elseif ($status == 'executada') 
		{

			$this->db->select('*');
			
			$this->db->from('Auditoria');

			$this->db->join('Projeto' , 'Projeto.projetoID = Auditoria.projetoID');

			$this->db->join('Departamento' , 'Departamento.departamentoID = Projeto.departamentoID');

			$this->db->join('Unidade' , 'Unidade.unidadeID = Departamento.unidadeID');

			$this->db->join('Status' , 'Status.statusID = Auditoria.statusID');

			$this->db->where('Status.statusID', STATUS_EXECUTADA);

			$consulta = $this->db->get();

			return $consulta->result();
		}
		
		else
		{

			$this->db->select('*');
			
			$this->db->from('Auditoria');

			$this->db->join('Projeto' , 'Projeto.projetoID = Auditoria.projetoID');

			$this->db->join('Departamento' , 'Departamento.departamentoID = Projeto.departamentoID');

			$this->db->join('Unidade' , 'Unidade.unidadeID = Departamento.unidadeID');

			$this->db->join('Status' , 'Status.statusID = Auditoria.statusID');

			$consulta = $this->db->get();

			return $consulta->result();

		}
	}


	// Relatorio de NC //
	function listaNCs()
	{
		# code...
	}


	// Relatorio de NC //
	function listaACs()
	{
		# code...
	}
}