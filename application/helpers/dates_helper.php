<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Funcões para ajudar a trabalhar com datas em php 
 */



/**
 * Converte data do formato mysql para formato dd/mm/aaaa
 */
if ( !function_exists('convert_date'))
{
	function convert_date($array, $objName, $dateName)
	{
		$CI =& get_instance();


		if (!empty($array[$objName]))
		{
			$tamanho = sizeof($array[$objName]);

			for ($i=0; $i < $tamanho; $i++) 
			{
				$dateBD = $array[$objName][$i]->$dateName;
		 		$date_convertida = implode("/",array_reverse(explode("-",$dateBD)));
		 		$array[$objName][$i]->$dateName = $date_convertida;
			}
		}

		return $array;
	}
}



/**
 * Verifica a se a data é maior 
 */
if ( !function_exists('date_is_bigger'))
{
	function date_is_bigger($date)
	{
		$CI =& get_instance();
		date_default_timezone_set('America/Sao_Paulo');

		$data_auditoria = $date;
		$data_atual = date("d/m/Y");


		// Data da auditoria //
		list ($dia,$mes,$ano) = explode ('/', $data_auditoria);

		// Data do sistema //
		list ($d,$m,$y) = explode ('/', $data_atual);

		if( ($dia < $d) or ($mes < $m) or ($ano < $y) )  
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}	
}




/* End of file user_helper.php */
/* Location: ./application/helpers/user_helper.php */