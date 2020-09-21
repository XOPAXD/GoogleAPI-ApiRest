<?php 
require_once('Controller/EnderecoListaController.php');


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );



if ($uri[1] !== 'csc') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$id = null;
if (isset($uri[3])) {
    $id = (int) $uri[3];
}

if(isset($_GET["usuario"]))
{
	$usuario = $_GET["usuario"];
	$senha	 = $_GET["senha"];	
}


$requestMethod = $_SERVER["REQUEST_METHOD"];


$controller = new EnderecoListaController($requestMethod, $id,@$usuario,@$senha);
$controller->processRequest();



$headers = headers_list();


$header = trim(isset($headers[6]),': ');

if(!$header){
	header('HTTP/1.0 401 Unauthorized');
}
else
{
	print_r(json_encode($controller->get()));
}

