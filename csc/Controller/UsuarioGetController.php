<?php
require_once ('../Model/UsuarioDAO.php');
require_once ('../Model/EnderecoDAO.php');
require_once ('../config/DataBase.php');


$db      = new Database();

$dao     = new UsuarioDAO($db);
$daoendereco     = new EnderecoDAO($db);

$enderecoArray = $daoendereco->list();

if(isset($_GET["mode"]) and $_GET["mode"] != "INS"){
	$usuario = $dao->get($_GET["id"]); 
}


