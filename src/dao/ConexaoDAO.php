<?php

class ConexaoDAO {

 private $conexao;

public function getConexao(){

	$conexao = mysqli_connect('localhost', 'root', '','myteste');

	if (!$conexao) {
		die('Erro de conexão');
	}
	return $conexao;

}
}
