<?php


require_once("PHPMailerAutoload.php");


class EnviarEmailConfirmacao{

	public function enviarEmail($email_usuario, $id){
		$mail = new PHPMailer();
		$mail->CharSet = 'UTF-8';
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = 'myteste.mail.php@gmail.com';
		$mail->Password = 'Abc.1234567';
		$titulo = "E-mail de validação MyTeste";
		$mensagem = "Validação de conta MyTeste. Para ativar sua conta clique no link: http://177.135.176.186/?id=" . $id;
		$mail->setFrom("myteste.mail.php@gmail.com", "MyTeste");
		$mail->addAddress($email_usuario);
		$mail->Subject = $titulo;
		$mail->msgHTML($mensagem);
		$mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		);
				if ($mail->send()) {
			return "e-mail enviado com sucesso";
		}else{
			return "Fala ao tentar enviar email";
		}
	}

}









