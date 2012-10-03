<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Funcões para ajudar a trabalhar com datas em php 
 */



/**
 * Converte data do formato mysql para formato dd/mm/aaaa
 */
if ( !function_exists('convert_date'))
{
	function convert_date($array)
	{
		$CI =& get_instance();

		if (!empty($array['auditorias']))
		{
			$tamanho = sizeof($array['auditorias']);

			for ($i=0; $i < $tamanho; $i++) 
			{
				$dateBD = $array['auditorias'][$i]->auditoriaDataInicio;
		 		$date_convertida = implode("/",array_reverse(explode("-",$dateBD)));
		 		$array['auditorias'][$i]->auditoriaDataInicio = $date_convertida;
			}
		}

		return $array;
	}
}




/* End of file user_helper.php */
/* Location: ./application/helpers/user_helper.php */