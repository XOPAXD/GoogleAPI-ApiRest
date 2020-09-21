<?php
require_once ('../Model/UsuarioDAO.php');
require_once ('../config/DataBase.php');


$db      = new Database();

$dao     = new UsuarioDAO($db);

$usuariosArray = $dao->list(); 
