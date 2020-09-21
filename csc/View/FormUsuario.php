<?php 
	// if($_GET["mode"] != "INS"){
		require_once ('../Controller/UsuarioGetController.php');
	// }
	
	 require_once ('../Controller/EnderecoListaController.php');


?>

<html>
<head>
	<title>Cadastro de Endereço</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
	<script src="../js/Mask.js" type="text/javascript"></script>
  
</head>
<body>
	<div class="title-page">
		<h1>Cadastro de Usuários</h1>
	</div>
	<div class="container">
		<form method="post" action="../Controller/UsuarioController.php">
			<input type="hidden" name="mode" value="<?php echo $_GET["mode"]  ?>"/>
			<input type="hidden" name="id" value="<?php echo ( $_GET["mode"] != "INS"  ? $usuario["id"] : "" )  ?>"/>
			<div class="form-group">
				<label>Nome</label>
				<input class="form-control" name="nome" type="text" value="<?php echo ( $_GET["mode"] != "INS"  ? $usuario["nome"] : "" )  ?>"  <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" name="email" type="email" value="<?php echo  ( $_GET["mode"] != "INS" ? $usuario["email"] : "" ) ?>" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group">
				<label>Telefone</label>
				<input class="form-control" name="telefone" type="text" id="phone" data-inputmask="'mask': '+33 9 99 99 99 99'" value="<?php echo ( $_GET["mode"] != "INS" ? $usuario["telefone"] : "" )  ?>" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group">
				<label>Endereço</label>
				<select class="form-control" name="enderecoid" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>>
					<?php
				  		if (is_array($enderecoArray) || is_object($enderecoArray)) { 
				  		foreach ($enderecoArray as $value) { ?>
							<option value="<?php echo $value["id"] ?>" <?php echo ( $value["id"] == ISSET($usuario["enderecoid"]) ? "selected": "") ?>><?php echo $value["logradouro"]." - ".$value["numero"]." - ".$value["complemento"] ?></option>
					<?php }} ?>
				</select>
			</div>
			<div class="form-group">
				<label>Data</label>
				<input class="form-control" name="data_reg" type="date" value="<?php echo ( $_GET["mode"] != "INS" ? $usuario["reg_data"] : "" )  ?>" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group">		
				<a href="../View/ListaUsuarios.php" type="button" class="btn btn-danger">Voltar</a>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
	</form>
	</div>
	
</body>
</html>
