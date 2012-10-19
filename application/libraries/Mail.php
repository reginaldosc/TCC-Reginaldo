<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 




class Mail {

	public function __construct()
	{

	}
	


	// Envia E-mail //
	public function envia_email($emailTo, $assunto , $mensagem, $nomeFrom)
	{

		$CI =& get_instance();

		// configs //	
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'mensagemquality@gmail.com',
		    'smtp_pass' => 'intelbras',
		);

		$CI->load->library('email', $config);
		$CI->email->set_newline("\r\n");

		$CI->email->from("", $nomeFrom);
		$CI->email->to($emailTo);

		$CI->email->subject($assunto);
		$CI->email->message($mensagem);

		return $CI->email->send();

	}


}

/* End of file Mail.php */
/* Location: ./application/libraries/Mail.php */