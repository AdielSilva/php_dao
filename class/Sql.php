<?php

class Sql extends PDO 
{
	private $con;

	public function __construct ()
	{
		$this->con = new PDO ("mysql:host=localhost; dbname=db_php7", "root", ""); //abrindo conexão
	}

	private function setParams($statement, $parametros = array())
	{
		foreach ($parametros as $key => $value) {
			
			$statement->bindParam($key, $value);
		}
	}

	private function setParam($statement, $key, $value)
	{
		$statement->bindParam($key,$value);
	}

	public function query ($rawQuery, $parametros = array())
	{
		$stmt = $this->con->prepare($rawQuery);

		$this->setParams($stmt, $parametros);
		$stmt->execute();

		return $stmt;
	}

	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

