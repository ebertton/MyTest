<?php

require_once("../model/Usuario.php");
require_once("../json/UsuarioJson.php");
require_once("../dao/ConexaoDAO.php");
require_once("../dao/UsuarioDAO.php");

$conexao = new ConexaoDAO();

$usuarioDAO = new UsuarioDAO($conexao->getConexao());
$usuarioJson = new UsuarioJson();
$validacao = array();

if ($_POST['opcao'] == 'cadastrar') {

	if (in_array('', $_POST)) {
		$validacao['error'] = 'Todos os campos devem ser preenchidos!';
		
	}else if($usuario->validarEmail() == false){
		$validacao['error'] = 'E-mail inncorreto!';
	}else if($usuarioDAO->verificaUsuario($_POST['usuario']) == true){
			$validacao['error'] = 'Nome de usuário já cadstrado!';		
	}else if($usuarioDAO->verificaEmail($_POST['email']) == true){
			$validacao['error'] = 'E-mail já cadstrado!';	
	} else{	
		$usuario = new Usuario();
		$usuario->setNome($_POST['nome']);
		$usuario->setEmail($_POST['email']);
		$usuario->setUsuario($_POST['usuario']);
		$usuario->setSenha($_POST['senha']);

		$validacao = $usuarioJson->gravarUsuario($usuario);
	}
		print_r(json_encode($validacao));
		
	
	
}
