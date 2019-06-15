<?php 

class Usuario{

	private $idusuario;
	private $desslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($valor){
		$this->idusuario = $valor;
	}

	public function getDeslogin(){
		return $this->desslogin;
	}

	public function setDeslogin($valor){
		$this->desslogin = $valor;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($valor){
		$this->dessenha = $valor;
	}	

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($valor){
		$this->dtcadastro = $valor;
	}

	//Método para carregar as informações pelo ID
	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID" => $id
		));

		//Verificando se a consulta retornou dados
		if (count($results) > 0){
			//variável que recebe o valor de $results na posição ZERO
			$row = $results[0];

			//pegando os dados que voltaram associativos e mandando para os setters
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}

	}

	//Método estático para listar todos os usuários da tabela
	public static function getLista(){
		
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}

	//Método estático para procurar um registro no banco pelo login
	public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH' => "%".$login."%"  //a porcentagem insere as aspas simples no banco, evitando o SQL Injection
 		));
	}

	//Método para trazer usuários autenticados, ou seja, tem que informar o login e senha
	public function login($login, $senha){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA", array(
			":LOGIN" => $login,
			":SENHA" => $senha
		));

		//Verificando se a consulta retornou dados
		if (count($results) > 0){
			//variável que recebe o valor de $results na posição ZERO
			$row = $results[0];

			//pegando os dados que voltaram associativos e mandando para os setters
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		} else {
			throw new Exception("Login e/ou senha inválidos.");
			
		}

	}

	//Método para trazer as informações do banco em String usando o método mágico __toString()	
	public function __toString(){
		return json_encode(array(
			"idusuario" => $this->getIdusuario(),
			"deslogin" => $this->getDeslogin(),
			"dessenha" => $this->getDessenha(),
			"dtcadastro" => $this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}

}














