<?php

class ConexaoDAO {

 private $conexao;

public function getConexao(){

	$conexao = mysqli_connect('localhost', 'root', '','mytest');

	if (!$conexao) {
		die('Erro de conexão');
	}
	return $conexao;

}
}
