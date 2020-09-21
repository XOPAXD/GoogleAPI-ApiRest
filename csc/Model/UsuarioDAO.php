<?php

class UsuarioDAO
{
    private $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function list()
    {
    	$query = "SELECT * FROM usuarios";
    	$stmt=mysqli_prepare($this->db->getConection(), $query);
		
		$bp = $stmt->execute();
		    if ( false===$bp ) {
		        die('Error with execute: ' . htmlspecialchars($stmt->error));
		    }
		$result = $stmt->get_result();
        
        while($row = $result->fetch_assoc()){
            $usuariosArray[] = $row;
        }
        if ( isset($usuariosArray)){
            return $usuariosArray;    
        }
        
		
    }

    public function getAuthorization($nome,$email){
        $query = "SELECT * FROM usuarios WHERE nome='$nome' AND email='$email'";
        $stmt=mysqli_prepare($this->db->getConection(), $query);
        
        $bp = $stmt->execute();
            if ( false===$bp ) {
                die('Error with execute: ' . htmlspecialchars($stmt->error));
            }
        $result = $stmt->get_result();

        $usuario = $result->fetch_assoc();
            
        return $usuario;

       
    }

    public function get($id){
        $query = "SELECT * FROM usuarios WHERE id='$id'";
        $stmt=mysqli_prepare($this->db->getConection(), $query);
        
        $bp = $stmt->execute();
            if ( false===$bp ) {
                die('Error with execute: ' . htmlspecialchars($stmt->error));
            }
        $result = $stmt->get_result();

        $usuario = $result->fetch_assoc();
            
        return $usuario;

       
    }

    public function add(Usuario $usuario)
    {
        $enderecoid = $usuario->getEnderecoId();
        $nome = $usuario->getNome();
        $telefone = $usuario->getTelefone();
        $email = $usuario->getEmail();
        $data_reg = $usuario->getData();
        
        $query = "INSERT INTO usuarios (enderecoid,nome, telefone, email,reg_data) VALUES(?,?,?,?,?)";         
        $stmt=mysqli_prepare($this->db->getConection(), $query);

		if(false===$stmt){
			die('Error with prepare: ') . htmlspecialchars($mysqli->error);
		}

		$bp = mysqli_stmt_bind_param($stmt,'sssss',$enderecoid, $nome, $telefone, $email,$data_reg);
		    if(false===$bp){
		        die('Error with bind_param: ') . htmlspecialchars($stmt->error);
		    }

		$bp = $stmt->execute();
		    if ( false===$bp ) {
		        die('Error with execute: ' . htmlspecialchars($stmt->error));
		    }

		$stmt->close();
    }

    public function update(Usuario $usuario){
        $enderecoid = $usuario->getEnderecoId();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $telefone = $usuario->getTelefone();
        $data_reg = $usuario->getData();
        $id = $usuario->getId();
        
        $query = "UPDATE usuarios SET enderecoid = ?,nome = ?, email=?, telefone=?, reg_data=?  WHERE id = ?"; 

        $stmt=mysqli_prepare($this->db->getConection(), $query);

        if(false===$stmt){
            die('Error with prepare: ') . htmlspecialchars($mysqli->error);
        }

        $bp = mysqli_stmt_bind_param($stmt,'ssssss',$endercoid,$nome, $email, $telefone,$data_reg,$id);
            if(false===$bp){
                die('Error with bind_param: ') . htmlspecialchars($stmt->error);
            }

        $bp = $stmt->execute();
            if ( false===$bp ) {
                die('Error with execute: ' . htmlspecialchars($stmt->error));
            }

        $stmt->close();
    }

    public function delete(Usuario $usuario){
        $id = $usuario->getId();

        $query = "DELETE FROM usuarios  WHERE id = ?"; 
        $stmt=mysqli_prepare($this->db->getConection(), $query);

        if(false===$stmt){
            die('Error with prepare: ') . htmlspecialchars($mysqli->error);
        }

        $bp = mysqli_stmt_bind_param($stmt,'s',$id);
            if(false===$bp){
                die('Error with bind_param: ') . htmlspecialchars($stmt->error);
            }

        $bp = $stmt->execute();
            if ( false===$bp ) {
                die('Error with execute: ' . htmlspecialchars($stmt->error));
            }

        $stmt->close();
    }
}
