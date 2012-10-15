<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 




class Mensagem {

	public function __construct()
	{

	}
	

    /**
	 * Envia mensagem ao usuário
	 */
	public function sendMsg($id, $status) 
	{
		$CI =& get_instance();

		switch ($status)
		{
					
			case STATUS_AGENDADA:

				$name = $CI->getName();

				$data['mensagemBody']	= "A $name foi agendada";
				$data['usuarioID']		= $id;

				$CI->cadastrarMsg($data);
				break;
						
			case STATUS_REALIZADA: 

				$name = $CI->getName();

				$data['mensagemBody']	= "A $name foi realizada";	
				$data['usuarioID']		= $id;

				$CI->cadastrarMsg($data);
				break;
						
			case STATUS_ABERTA:

				$name = $CI->getName(); 
				
				$data['mensagemBody']	= "A $name foi aberta";	
				$data['usuarioID']		= $id;

				$CI->cadastrarMsg($data);
				break;


			case STATUS_FECHADA:

				$name = $CI->getName(); 
				
				$data['mensagemBody']	= "A $name foi fechada";
				$data['usuarioID']		= $id;

				$CI->cadastrarMsg($data);
				break;
				
			case STATUS_EXECUTADA: 
				
				$name = $CI->getName();

				$data['mensagemBody']	= "A $name foi executada";  	
				$data['usuarioID']		= $id;

				$CI->cadastrarMsg($data);
				break;
					
		}
	}


}

/* End of file Inbox.php */
/* Location: ./application/libraries/Inbox.php */