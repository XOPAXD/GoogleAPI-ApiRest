<?php
require_once ('../Model/Usuario.php');
require_once ('../Model/UsuarioDAO.php');
require_once ('../config/DataBase.php');


$db      = new Database();

$dao     = new UsuarioDAO($db);



if($_POST["mode"] != "DLT"){
  $enderecoid = $_POST['enderecoid'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$data_reg = date('Y-m-d',strtotime($_POST['data_reg']));

} 

$id =  $_POST['id'];

$usuario = new Usuario();


switch ($_POST["mode"]) {
  case "INS":
    $usuario->setEnderecoId($enderecoid);
    $usuario->setNome($nome);
    $usuario->setTelefone($telefone);
    $usuario->setEmail($email);
    $usuario->setData($data_reg);
    $usuario->setId($id);
    $dao->add($usuario); 
    break;
  case "UPD":
    $usuario->setEnderecoId($enderecoid);
    $usuario->setNome($nome);
    $usuario->setTelefone($telefone);
    $usuario->setEmail($email);
    $usuario->setData($data_reg);
    $usuario->setId($id);
    $dao->update($usuario); 
    break;
  case "DLT":  
    $usuario->setEnderecoId($enderecoid);
    $usuario->setId($id);
  	$dao->delete($usuario); 
    break;
}


header('Location: ../View/ListaUsuarios.php');


