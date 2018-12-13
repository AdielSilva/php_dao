<?php

require_once("config.php");

//$sql = new Sql();

//$sql->select("SELECT * FROM tb_usuarios");
$usuario = new Usuario();

$usuario->loadById(2);

echo $usuario;
?>