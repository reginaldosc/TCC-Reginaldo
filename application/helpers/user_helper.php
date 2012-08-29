<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter User Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/number_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Usa o nome do usuario e matricula para criar o username;
 *
 * @access	public
 * @param	nome, matricula
 * @return	string
 */
if ( ! function_exists('create_username'))
{
	function create_username($nome, $matricula)
	{
		$CI =& get_instance();

		$nome = substr($nome,0,2);
		$matricula = substr($matricula, 0, 6);		
		 
		return strtolower($nome).$matricula;
	}
}


/* End of file user_helper.php */
/* Location: ./application/helpers/user_helper.php */