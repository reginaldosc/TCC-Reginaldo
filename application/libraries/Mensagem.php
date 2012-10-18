<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 




class Mensagem {

	public function __construct()
	{

	}
	

    /**
	 * Envia mensagem ao usuário
	 */
	public function sendMsg($remetente, $destinatario, $assunto, $mensagem, $status) 
	{
		$CI =& get_instance();

		switch ($status)
		{
					
			case STATUS_AGENDADA:

				$name = $CI->getName();

				$data['remetenteID']		= $remetente;
				$data['destinatarioID']		= $destinatario;
				$data['mensagemAssunto']	= "A $name foi agendada"; 
				$data['mensagemBody']		= MSG01;

				$CI->cadastrarMsg($data);
				break;
						

			case STATUS_REALIZADA: 

				$name = $CI->getName();
	
				$data['remetenteID']		= $remetente;
				$data['destinatarioID']		= $destinatario;
				$data['mensagemAssunto']	= "A $name foi realizada"; 
				$data['mensagemBody']		= MSG01;

				$CI->cadastrarMsg($data);
				break;
						

			case STATUS_ABERTA:

				$name = $CI->getName(); 
				
				$data['remetenteID']		= $remetente;
				$data['destinatarioID']		= $destinatario;
				$data['mensagemAssunto']	= "A $name foi aberta";	 
				$data['mensagemBody']		= MSG01;

				$CI->cadastrarMsg($data);
				break;


			case STATUS_FECHADA:

				$name = $CI->getName(); 
				
				$data['remetenteID']		= $remetente;
				$data['destinatarioID']		= $destinatario;
				$data['mensagemAssunto']	= "A $name foi fechada"; 
				$data['mensagemBody']		= MSG01;

				$CI->cadastrarMsg($data);
				break;
				

			case STATUS_EXECUTADA: 
				
				$name = $CI->getName();

				$data['remetenteID']		= $remetente;
				$data['destinatarioID']		= $destinatario;
				$data['mensagemAssunto']	= "A $name foi executada"; 
				$data['mensagemBody']		= MSG01;

				$CI->cadastrarMsg($data);
				break;


			case STATUS_RETORNADA: 
				
				$name = $CI->getName();

				$data['remetenteID']		= $remetente;
				$data['destinatarioID']		= $destinatario;
				$data['mensagemAssunto']	= "A $name foi retornada"; 
				$data['mensagemBody']		= MSG01;

				$CI->cadastrarMsg($data);
				break;


			case STATUS_DIRETA: 
				
				$data['remetenteID']		= $remetente;
				$data['destinatarioID']		= $destinatario;
				$data['mensagemAssunto']	= $assunto;
				$data['mensagemBody']		= $mensagem;

				$CI->cadastrarMsg($data);
				break;
					
		}
	}


}

/* End of file Inbox.php */
/* Location: ./application/libraries/Inbox.php */