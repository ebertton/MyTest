<?php 
// require_once("PHPMailer/class.phpmailer.php");

// $email = new PHPMailer();
// $email->CharSet = 'UTF-8';
// $email->isSMTP();
// $email->Host = 'smtp.gmail.com';
// $email->Port = 587;
// $email->SMTPSecure = 'tls';
// $email->SMTPAuth = true;
// $email->Username = 'myteste.mail.php@gmail.com';
// $email->Password = 'Abc.1234567';

// $titulo = "E-mail de validação MyTeste";
// $mensagem = "Validação de conta MyTeste. Para ativar sua conta clique no link: teste.com";

// $email->setFrom("myteste.mail.php@gmail.com", "MyTeste");
// $email->addAddress('eberttonrodrigues@gmail.com');
// $email->Subject = $titulo;
// $email->msgHTML($mensagem);



// if ($email->send()) {
// 	print_r("e-mail enviado com sucesso");
// }else{
// 	print_r("Fala ao tentat enviar email");
// }

require_once("dao/UsuarioDAO.php");
require_once("dao/ConexaoDAO.php");

$conexao = new ConexaoDAO();
$usuarioDAO = new UsuarioDAO($conexao->getConexao());

$usuarios = $usuarioDAO->listarUsuario();
print_r($usuarios[0]['id']);