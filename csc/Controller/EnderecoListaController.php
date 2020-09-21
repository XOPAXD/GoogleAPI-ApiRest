<?php
require_once ('Model/EnderecoDAO.php');
require_once ('Model/UsuarioDAO.php');
require_once ('config/DataBase.php');

class EnderecoListaController {

	

	public function __construct($requestMethod, $id,$usuario,$senha)
    {
		$this->id = $id;
		$this->usuario = $usuario;
		$this->senha = $senha;


    }

    public function get()
   	{
   		$db      = new Database();
		
		$dao     = new EnderecoDAO($db);

	    if ($this->id) {
	        $response = $dao->get($this->id);
	        return $response;
	    } else {
	        $response = $dao->list();
	        return $response;
	    }
   	}

	public function processRequest()
	{
		$db      = new Database();
		$daousuario     = new UsuarioDAO($db);	
		

		$usuario = $daousuario->getAuthorization( $this->usuario,$this->senha);


		if(isset($usuario))
		{

			$key = "csc";
			$header = [
				'typ' => 'JWT',
				'alg' => 'HS256'
			];

			$payload = [
				'exp' 	=> (new DateTime("now"))->getTimestamp(),
				'id' 	=> $usuario['id'],
				'email' => $usuario['email'],
			];

			$header  = json_encode($header);
			

			$payload = json_encode($payload);

			$header  = base64_encode($header);
			$payload = base64_encode($payload);

			$sign = hash_hmac('sha256', $header.".".$payload, $key,true);
			$sign = base64_encode($sign);

			$token = $header.".".$payload.".".$sign;

			header('Authorization: Bearer '.$token);
		}
	}
}