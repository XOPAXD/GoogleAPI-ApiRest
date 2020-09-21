<?php

class EnderecoDAO
{
    private $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function list()
    {
    	$query = "SELECT * FROM enderecos";
    	$stmt=mysqli_prepare($this->db->getConection(), $query);
		
		$bp = $stmt->execute();
		    if ( false===$bp ) {
		        die('Error with execute: ' . htmlspecialchars($stmt->error));
		    }
		$result = $stmt->get_result();
        
        while($row = $result->fetch_assoc()){
            $enderecosArray[] = $row;
        }
        if ( isset($enderecosArray)){
            return $enderecosArray;    
        }
        
		
    }

    public function get($id){
        $query = "SELECT * FROM enderecos WHERE id='$id'";
        $stmt=mysqli_prepare($this->db->getConection(), $query);
        
        $bp = $stmt->execute();
            if ( false===$bp ) {
                die('Error with execute: ' . htmlspecialchars($stmt->error));
            }
        $result = $stmt->get_result();

        $endereco = $result->fetch_assoc();
            
        return $endereco;

       
    }

    public function add(Endereco $endereco)
    {
        $logradouro = $endereco->getLogradouro();
        $numero = $endereco->getNumero();
        $complemento = $endereco->getComplemento();
        $lat = $endereco->getLat();
        $lng = $endereco->getLng();
        $data_reg = $endereco->getData();

        $query = "INSERT INTO enderecos (logradouro, numero, complemento,lat,lng,reg_data) VALUES(?,?,?,?,?,?)";         
        $stmt=mysqli_prepare($this->db->getConection(), $query);

		if(false===$stmt){
			die('Error with prepare: ') . htmlspecialchars($mysqli->error);
		}

		$bp = mysqli_stmt_bind_param($stmt,'ssssss', $logradouro, $numero, $complemento,$lat,$lng,$data_reg);
		    if(false===$bp){
		        die('Error with bind_param: ') . htmlspecialchars($stmt->error);
		    }

		$bp = $stmt->execute();
		    if ( false===$bp ) {
		        die('Error with execute: ' . htmlspecialchars($stmt->error));
		    }

		$stmt->close();
    }

    public function update(Endereco $endereco){
        $logradouro = $endereco->getLogradouro();
        $numero = $endereco->getNumero();
        $complemento = $endereco->getComplemento();
        $data_reg = $endereco->getData();
        $id = $endereco->getId();
        
        $query = "UPDATE enderecos SET logradouro = ?, numero=?, complemento=?,lat=?,lng=?, reg_data=?  WHERE id = ?"; 

        $stmt=mysqli_prepare($this->db->getConection(), $query);

        if(false===$stmt){
            die('Error with prepare: ') . htmlspecialchars($mysqli->error);
        }

        $bp = mysqli_stmt_bind_param($stmt,'sssssss', $logradouro, $numero, $complemento,$lat,$lng,$data_reg,$id);
            if(false===$bp){
                die('Error with bind_param: ') . htmlspecialchars($stmt->error);
            }

        $bp = $stmt->execute();
            if ( false===$bp ) {
                die('Error with execute: ' . htmlspecialchars($stmt->error));
            }

        $stmt->close();
    }

    public function delete(Endereco $endereco){
        $id = $endereco->getId();

        $query = "DELETE FROM enderecos  WHERE id = ?"; 
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
