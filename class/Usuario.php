<?php
class Usuario
{
	private $idusuario;
	private $descrilogin;
	private $dessenha;
	private $dtCadastro;

	//=============METODOS GETTERS E SETTERS ===============

	//--------------------IDUSUARIO-------------------------
	public function getIdUsuario()
	{
		return $this->idusuario;
	}

	public function setIdUsuario($value)
	{
		$this->idusuario = $value;
	}

	//--------------------DESCRILOGIN-------------------------
	public function getDescrilogin()
	{
		return $this->descrilogin;
	}

	public function setDescrilogin($value)
	{
		$this->descrilogin = $value;
	}

	//--------------------DESSENHA-------------------------
	public function getDessenha()
	{
		return $this->dessenha;
	}

	public function setDessenha($value)
	{
		$this->dessenha = $value;
	}

	//--------------------IDUSUARIO-------------------------
	public function getDtcadastro()
	{
		return $this->dtCadastro;
	}

	public function setDtcadastro($value)
	{
		$this->dtCadastro = $value;
	}
	//=============FIM=GETTERS=E=SETTERS=====================

	//=============MÉTODO=DE=LISTAR=POR=ID===================
	public function loadById($id)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID" => $id )); //Fazendo a procura no banco pelo :ID

		if(count($results) > 0)	//se o resultado da procura anterior for maior que 0, ele seta os valores
		{

			$row = $results[0];
			$this->setIdUsuario($row['idusuario']);//"idusuario" seria o campo de identificação no banco de dados :  idusario = $id 
			$this->setDescrilogin($row['descrilogin']); //descrilogin = Tatyane
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}

	public function __toString()
	{
		return json_encode(array(
			"idusuario"=> $this->getIdUsuario(),
			"descrilogin" => $this->getDescrilogin(),
			"dessenha" => $this->getDessenha(),
			"dtCadastro"=> $this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}
?>