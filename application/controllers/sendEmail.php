<?php
function sendMail()
{
	echo("chamou o send email");
	
	$to = "reginaldo.goncalves.sc@gmail.com";
	$subject = "TESTE!";
	$body = "Hi,\n\nHow are you?";
	if (mail($to, $subject, $body, "teste@teste.com")) {
		echo("<p>Message successfully sent!</p>");
	} else {
		echo("<p>Message delivery failed...</p>");
	}
}
?>