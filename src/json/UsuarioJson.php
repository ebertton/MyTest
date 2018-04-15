<?php 

require_once("../dao/ConexaoDAO.php");
require_once("../dao/UsuarioDAO.php");



class UsuarioJson{

	public function gravarUsuario(Usuario $usuario){
		$conexao = new ConexaoDAO();
		$usuarioDAO = new UsuarioDAO($conexao->getConexao());
	
		if ($usuarioDAO->inserirUsuario($usuario)) {
			$usuarioCadastrado = array(
				'usuario' => $usuario->getNome(),
				'msg' => "Foi enviado um e-mail para: ".$usuario->getEmail()." acesse e confirme!");
		}else{
			$usuarioCadastrado = array(
				'usuario' => $usuario->getNome(),
				'msg' => "O usuario não pode ser cadastrado!");
			}
			return $usuarioCadastrado;
		}

	}
	
