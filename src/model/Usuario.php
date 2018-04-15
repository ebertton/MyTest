<?php 
/**
* 
*/
class Usuario{
	
	private $id;
	private $nome;
	private $usuario;
	private $email;
	private $senha;

	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = md5($senha);
	}

	public function validarEmail(){
		if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}else{
			return false;
		}

	}

	

}