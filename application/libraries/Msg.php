<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 




class Msg {

	const AcExecutada			= 'Acão Corretiva foi executada';
	const AcAgendada			= 'Acão Corretiva foi agendada';
	const AuditoriaAgendada		= 'Auditoria foi agendada';
	const AuditoriaRealizada	= 'Auditoria foi realizada';


	// Status do sistema //

	const Agendada 		= 1;
	const Realizada 	= 2;
	const Andamento		= 3;
	const NaoAplicavel	= 4;
	const Conforme 		= 5;
	const NaoConforme 	= 6;
	const Aberta 		= 7;
	const Fechada 		= 8;
	const Executada 	= 9;
	
}

/* End of file Msg.php */
/* Location: ./application/libraries/Msg.php */