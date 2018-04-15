<?php 

require_once("../dao/ConexaoDAO.php");
require_once("../dao/UsuarioDAO.php");
require_once("../PHPMailer/EnviarEmailConfirmacao.php");



class UsuarioJson{

	private $validacao = array();

	public function gravarUsuario(Usuario $usuario){
		$conexao = new ConexaoDAO();
		$usuarioDAO = new UsuarioDAO($conexao->getConexao());

		if (in_array('', $_POST)) {
			return json_encode($this->validacao = ['error' => 'Todos os campos devem ser preenchidos!']); 
		
		}if($usuario->validarEmail() == false){
			return json_encode($this->validacao = array('error' => 'E-mail inncorreto!'));
		}if($usuarioDAO->verificaUsuario($_POST['usuario']) == true){
			return json_encode($this->validacao = array('error' => 'Nome de usuário já cadstrado!'));		
		}if($usuarioDAO->verificaEmail($_POST['email']) == true){
			return json_encode($this->validacao = array('error' => 'E-mail já cadstrado!'));	
		}if ($usuarioDAO->inserirUsuario($usuario)) {
			$enviarEmailConfirmacao = new EnviarEmailConfirmacao();
			$enviarEmailConfirmacao->enviarEmail($usuario->getEmail(), $usuarioDAO->getIdUsuario($usuario->getEmail()));

			$usuarioCadastrado = array(
				'usuario' => $usuario->getNome(),
				'msg' => "Foi enviado um e-mail para: ".$usuario->getEmail()." acesse e confirme!",
				'email' => $usuario->getEmail());
			return json_encode($usuarioCadastrado);
		}else{
			$usuarioCadastrado = array(
				'usuario' => $usuario->getNome(),
				'msg' => "O usuario não pode ser cadastrado!");
			return json_encode($usuarioCadastrado);
			}
			
		}

	}
	
