<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	
	
	</style>
	
	
	
</head>

<body>	
	
	<?php
	
	session_start();
    if(empty($_SESSION['STATUS']) || $_SESSION['STATUS'] != 1)
    {
        header('location:index.php');
    }	
	
// se a sessão id estiver vazia ou se a sessão estatus for diferente de adm entao execute
	
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecario.html';
	
	
	$consulta = $cn->query("SELECT * from tbl_livro");
	
	
	?>
	
<div class="container-fluid">
	
	
	<?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
	?>
	
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><img src="imagens/<?php echo $exibe['ds_capa']; ?>" class="img-responsive"></div>
		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $exibe['nm_livro']; ?></h4></div>
		<div class="col-sm-2" style="padding-top:20px">
		
			
		<a href="frmAlterar.php?id=<?php echo $exibe['cd_livro'];?>&id2=<?php echo $exibe['cd_categoria'];?>&id3=<?php echo $exibe['cd_autor'];?>">
		<button class="btn btn-lg btn-block btn-default">
		<span class="glyphicon glyphicon-pencil"> Alterar</span>
		</button>
		</a>
		</div>
		
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
		<a href="excluir.php?id=<?php echo $exibe['cd_livro']; ?>">	
		<button class="btn btn-lg btn-block btn-danger">
		<span class="glyphicon glyphicon-remove"> Excluir</span>		
		</button>
		</a>
		
		
		</div> 
				
	</div>		
	
	
	<?php } ?>
	

	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>