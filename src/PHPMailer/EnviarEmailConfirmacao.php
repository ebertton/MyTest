<?php 
require_once("class.phpmailer.php");

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
		$mensagem = "Validação de conta MyTeste. Para ativar sua conta clique no link: http://localhost/teste?id=" . $id;
		$mail->setFrom("myteste.mail.php@gmail.com", "MyTeste");
		$mail->addAddress($email_usuario);
		$mail->Subject = $titulo;
		$mail->msgHTML($mensagem);

		if ($mail->send()) {
			return "e-mail enviado com sucesso";
		}else{
			return "Fala ao tentar enviar email";
		}
	}

}









