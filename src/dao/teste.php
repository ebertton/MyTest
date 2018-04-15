<?php 
require_once("ConexaoDAO.php");
$conexaoDao = new ConexaoDAO();


$resultado = mysqli_query($conexaoDao->getConexao(), 'select * from tb_usuario');
$usuarios = array();
while ($usuario  = mysqli_fetch_assoc($resultado)) {
	array_push($usuarios, $usuario);
}
print_r($usuarios);