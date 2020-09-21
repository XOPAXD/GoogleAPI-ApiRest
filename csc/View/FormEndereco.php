<?php 
	if($_GET["mode"] != "INS"){
		require_once ('../Controller/EnderecoGetController.php');
	}
	
	 
?>

<html>
<head>
	<title>Cadastro de Endereço</title>
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/Maps.js" type="text/javascript"></script>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">

</head>
<body>
	<div class="title-page">
		<h1>Cadastro de Endereços</h1>
	</div>
	<div class="container">
		<form method="post" action="../Controller/EnderecoController.php">
			<input type="hidden" name="mode" value="<?php echo $_GET["mode"]  ?>"/>
			<input type="hidden" name="id" value="<?php echo ( $_GET["mode"] != "INS"  ? $endereco["id"] : "" )  ?>"/>
			<div class="form-group">
				<label>Logradouro</label>
				<input class="form-control" id="txtEndereco" name="logradouro" type="text" value="<?php echo ( $_GET["mode"] != "INS"  ? $endereco["logradouro"] : "" )  ?>"  <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			
			<div id="map"></div>

			
		   
		    <script defer
		    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu5_2dX5oRJoRbFZfAbk8Do1mhOYuoXVo&callback=initMap">
		    </script>
			<div class="form-group">
				<label>Número</label>
				<input class="form-control" name="numero" type="number" value="<?php echo  ( $_GET["mode"] != "INS" ? $endereco["numero"] : "" ) ?>" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group">
				<label>Complemento</label>
				<input class="form-control" name="complemento" type="text" value="<?php echo ( $_GET["mode"] != "INS" ? $endereco["complemento"] : "" )  ?>" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group">
				<label>Latitude</label>
				<input class="form-control" id="txtLatitude" name="txtLatitude"  type="text" value="<?php echo ( $_GET["mode"] != "INS" ? $endereco["lat"] : "" )  ?>" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group" >
				<label>Longitude</label>
				<input class="form-control" id="txtLongitude" name="txtLongitude" type="text" value="<?php echo ( $_GET["mode"] != "INS" ? $endereco["lng"] : "" )  ?>" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group">
				<label>Data</label>
				<input class="form-control" name="data_reg" type="date" value="<?php echo ( $_GET["mode"] != "INS" ? $endereco["reg_data"] : "" )  ?>" <?php echo ( $_GET["mode"] == "VS" || $_GET["mode"] == "DLT" ? "disabled" : "required" ); ?>/>
			</div>
			<div class="form-group">		
				<a href="../View/ListaEndereco.php" type="button" class="btn btn-danger">Voltar</a>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
	</form>
	</div>
	
</body>
</html>
