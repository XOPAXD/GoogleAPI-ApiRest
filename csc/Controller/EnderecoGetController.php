<?php
require_once ('../Model/EnderecoDAO.php');
require_once ('../config/DataBase.php');


$db      = new Database();

$dao     = new EnderecoDAO($db);

$endereco = $dao->get($_GET["id"]); 
