<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 




class Inbox {

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
					
			case MSG::Agendada:

				$name = $CI->getName();

				$data['mensagemBody']	= "A $name foi agendada";  	
				$data['mensagemData']	= time();
				$data['usuarioID']		= 4;

				$CI->cadastrarMsg($data);
				break;
						
			case MSG::Realizada: 

				$name = $CI->getName();

				$data['mensagemBody']	= "A $name foi realizada";	
				$data['mensagemData']	= now();
				$data['usuarioID']		= 4;

				$CI->cadastrarMsg($data);
				break;
						
			case MSG::Aberta:

				$name = $CI->getName(); 
				
				$data['mensagemBody']	= "A $name foi aberta";	
				$data['mensagemData']	= now();
				$data['usuarioID']		= 4;

				$CI->cadastrarMsg($data);
				break;
				
			case MSG::Executada: 
				
				$name = $CI->getName();

				$data['mensagemBody']	= "A $name foi executada";  	
				$data['mensagemData']	= now();
				$data['usuarioID']		= 4;

				$CI->cadastrarMsg($data);
				break;
					
		}
	}


}

/* End of file Inbox.php */
/* Location: ./application/libraries/Inbox.php */