<?php 

class UsuarioDAO{
	private $conexao;


	function __construct($conexao){
		$this->conexao = $conexao;

	}

	public function inserirUsuario(Usuario $usuario){
		$query = "insert into tb_usuario(nome_completo, usuario, email, senha) values('{$usuario->getNome()}', '{$usuario->getUsuario()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}')";

		return mysqli_query($this->conexao,$query);
	}
	public function listarUsuario(){
		$resultado = mysqli_query($this->conexao, 'select * from tb_usuario');
		$usuarios = array();
		while ($usuario  = mysqli_fetch_assoc($resultado)) {
			array_push($usuarios, $usuario);
		}
		return $usuarios;
	}

	public function verificaUsuario($usuario){
		$query = "select * from tb_usuario";
		$resultado = mysqli_query($this->conexao, $query);
		$existe = false;
		$usuarios = array();
		while ($usuarioResultado = mysqli_fetch_assoc($resultado)) {
			if (strtolower($usuarioResultado['usuario']) == strtolower($usuario)) {
				$existe = true;
			}	
		}
		return $existe;
	}
	public function verificaEmail($email){
		$query = "select * from tb_usuario";
		$resultado = mysqli_query($this->conexao, $query);
		$existe = false;
		$usuarios = array();
		while ($usuarioResultado = mysqli_fetch_assoc($resultado)) {
			if ($usuarioResultado['email'] == $email) {
				$existe = true;
			}	
		}
		return $existe;
	}
	public function getIdUsuario($email){
		$query = "select id from tb_usuario where email = '{$email}'";
		$resultado = mysqli_fetch_assoc(mysqli_query($this->conexao, $query));
		return md5($resultado['id']);
	}



}