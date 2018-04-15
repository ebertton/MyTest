<?php 

require_once("../dao/ConexaoDAO.php");
require_once("../dao/UsuarioDAO.php");



class UsuarioJson{

	private $validacao = array();

	public function gravarUsuario(Usuario $usuario){
		$conexao = new ConexaoDAO();
		$usuarioDAO = new UsuarioDAO($conexao->getConexao());

		if (in_array('', $_POST)) {
			return $this->validacao = ['error' => 'Todos os campos devem ser preenchidos!'];
		
		}if($usuario->validarEmail() == false){
			return $this->validacao = array('error' => 'E-mail inncorreto!');
		}if($usuarioDAO->verificaUsuario($_POST['usuario']) == true){
			return $this->validacao = array('error' => 'Nome de usuário já cadstrado!');		
		}if($usuarioDAO->verificaEmail($_POST['email']) == true){
			return $this->validacao = array('error' => 'E-mail já cadstrado!');	
		}if ($usuarioDAO->inserirUsuario($usuario)) {
			$usuarioCadastrado = array(
				'usuario' => $usuario->getNome(),
				'msg' => "Foi enviado um e-mail para: ".$usuario->getEmail()." acesse e confirme!");
			return $usuarioCadastrado;
		}else{
			$usuarioCadastrado = array(
				'usuario' => $usuario->getNome(),
				'msg' => "O usuario não pode ser cadastrado!");
			return $usuarioCadastrado;
			}
			
		}

	}
	
