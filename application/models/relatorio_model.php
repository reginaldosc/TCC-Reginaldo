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
	function listaNCs($status)
	{

		if ($status == 'aberta')
		{
			$this->db->select('*');
			
			$this->db->from('NC');

			$this->db->join('Status' , 'Status.statusID = NC.statusID');
			$this->db->join('Artefato' , 'Artefato.artefatoID = NC.artefatoID');
			$this->db->join('Auditoria', 'Auditoria.auditoriaID = NC.auditoriaID');
			$this->db->join('Projeto', 'Projeto.projetoID = Auditoria.projetoID');

			$this->db->where('Status.statusID', STATUS_ABERTA);

			$query = $this->db->get();
			
			return $query->result();

		}
		
		elseif ($status == 'fechada') 
		{
			$this->db->select('*');
			
			$this->db->from('NC');

			$this->db->join('Status' , 'Status.statusID = NC.statusID');
			$this->db->join('Artefato' , 'Artefato.artefatoID = NC.artefatoID');
			$this->db->join('Auditoria', 'Auditoria.auditoriaID = NC.auditoriaID');
			$this->db->join('Projeto', 'Projeto.projetoID = Auditoria.projetoID');
			
			$this->db->where('Status.statusID', STATUS_FECHADA);

			$query = $this->db->get();
			
			return $query->result();

		}
		
		else
		{

			$this->db->select('*');
			
			$this->db->from('NC');

			$this->db->join('Status' , 'Status.statusID = NC.statusID');
			$this->db->join('Artefato' , 'Artefato.artefatoID = NC.artefatoID');
			$this->db->join('Auditoria', 'Auditoria.auditoriaID = NC.auditoriaID');
			$this->db->join('Projeto', 'Projeto.projetoID = Auditoria.projetoID');
			
			$query = $this->db->get();
			
			return $query->result();

		}
	}


	// Relatorio de AC //
	function listaACs($status)
	{
		if ($status == 'agendada')
		{
			
			$this->db->select('*');
		
			$this->db->from('AC');

			$this->db->join('Status' , 'Status.statusID = AC.statusID');
			$this->db->join('NC','NC.ncID = AC.ncID');

			$this->db->where('Status.statusID', STATUS_AGENDADA);

			$query = $this->db->get();
			
			return $query->result();

		}
		
		elseif ($status == 'executada') 
		{
			
			$this->db->select('*');
		
			$this->db->from('AC');

			$this->db->join('Status' , 'Status.statusID = AC.statusID');		
			$this->db->join('NC','NC.ncID = AC.ncID');
				
			$this->db->where('Status.statusID', STATUS_EXECUTADA);

			$query = $this->db->get();
			
			return $query->result();

		}

		elseif ($status == 'retornada') 
		{
			
			$this->db->select('*');
		
			$this->db->from('AC');

			$this->db->join('Status' , 'Status.statusID = AC.statusID');
			$this->db->join('NC','NC.ncID = AC.ncID');
				
			$this->db->where('Status.statusID', STATUS_RETORNADA);

			$query = $this->db->get();
			
			return $query->result();

		}

		elseif ($status == 'fechada') 
		{

			$this->db->select('*');
		
			$this->db->from('AC');

			$this->db->join('Status' , 'Status.statusID = AC.statusID');
			$this->db->join('NC','NC.ncID = AC.ncID');
				
			$this->db->where('Status.statusID', STATUS_FECHADA);

			$query = $this->db->get();
			
			return $query->result();

		}
		
		else
		{

			$this->db->select('*');
		
			$this->db->from('AC');

			$this->db->join('Status' , 'Status.statusID = AC.statusID');
			$this->db->join('NC','NC.ncID = AC.ncID');
				
			$query = $this->db->get();
			
			return $query->result();

		}
	}

}