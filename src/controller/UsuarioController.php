<?php

require_once("../model/Usuario.php");
require_once("../json/UsuarioJson.php");
require_once("../dao/ConexaoDAO.php");
require_once("../dao/UsuarioDAO.php");


$usuarioJson = new UsuarioJson();


if (isset($_POST['opcao']) && $_POST['opcao'] == 'cadastrar') {	
		$usuario = new Usuario();
		$usuario->setNome($_POST['nome']);
		$usuario->setEmail($_POST['email']);
		$usuario->setUsuario($_POST['usuario']);
		$usuario->setSenha($_POST['senha']);
	
		print_r($usuarioJson->gravarUsuario($usuario));
}
if (isset($_GET['opcao']) && $_GET['opcao'] == 'ativar') {
	print_r($usuarioJson->ativarConta($_GET['id']));
}	
