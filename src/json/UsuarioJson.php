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

		public function ativarConta($id){
			$conexao = new ConexaoDAO();
			$usuarioDAO = new UsuarioDAO($conexao->getConexao());
			if ($usuarioDAO->ativarConta($id)) {
				$this->validacao = array('msg' => 'Conta ativada com sucesso');
				return json_encode($this->validacao);
			}else{
				$this->validacao = array('msg' => 'Link invalido!');
				return json_encode($this->validacao);
			}
		}
		public function autenticaUsuario($usuario, $senha){
			$conexao = new ConexaoDAO();
			$usuarioDAO = new UsuarioDAO($conexao->getConexao());
			$usuario = $usuarioDAO->verificaUsuarioCadastrado($usuario, $senha);
			
			if (isset($usuario['id'])) {
				$this->validacao = array('validar' => 'true', 'id' => $usuario['id']);
				return json_encode($this->validacao);

			}else{
				$this->validacao = array('validar' => 'false');
				return json_encode($this->validacao);
			}
		}

		public function getPerfil($id){
			$conexao = new ConexaoDAO();
			$usuarioDAO = new UsuarioDAO($conexao->getConexao());
			$usuario = array();
			$usuario = $usuarioDAO->carregarDadosPerfil($id);
			$img = UsuarioJson::getAvatar($usuario['email']);
			$usuario['img'] = $img;
		
			return json_encode($usuario);
			
		}
		public	function getAvatar($email) {
		    $email   = $email; 
		    $default = ''; 
		    $size    = 200; 
		    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) .
		    "?d=" . urlencode( $default ) . "&s=" . $size;
		
		    return $grav_url;
		}

	}
	
