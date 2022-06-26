<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Minha Loja</title>
        <meta name="viewport" content="width=divice-width,intial-scale=1">

        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery livraria -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- JavaScript compilado-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type = "text/css">
            .navbar{margin-bottom: 0;}
        </style>
    </head>
    <body>
    
    <?php 

    session_start();
    include 'conexao.php';
    include 'nav.php'; 
    include 'cabecario.html';
     
    
    $consulta = $cn->query('select cd_livro, nm_livro, vl_preco, ds_capa, qt_estoque from vw_livro');
    
    ?>

    <div class="container-fluid">
          <div class="row">
            <?php while ($exibe = $consulta->fetch (PDO::FETCH_ASSOC)){ ?>
            <div class="col-sm-2">
              <img src="imagens/<?php echo $exibe['ds_capa']; ?>" class ="img-responsive" style="width:100%">
              <div><h4><b><?php echo mb_strimwidth( $exibe['nm_livro'], 0,20,'...'); ?></b></h4></div>
              <div><h5>R$ <?php echo number_format( $exibe['vl_preco'],2,',','.'); ?></h5></div>

              <div class="text-center">
             
                  <button class="btn btn-lg btn-block btn-default" >
                  <a href="detalhes.php?cd=<?php echo $exibe['cd_livro']; ?>">
                    <span class = "glyphicon glyphicon-info-sign"> Detalhes </span>
                  </button>
            </a>
            </div>
            <div class="text-center" style="margin-top:5px; margin-botton:5px;" >
            <?php if ($exibe['qt_estoque'] > 0) {?>
                  <button class="btn btn-lg btn-block btn-info" >
                  <a href="carrinho.php?cd=<?php echo $exibe['cd_livro']; ?>">
                    <span class = "glyphicon glyphicon-usd"> Comprar </span>
                  </button>
                  </a>

                   <?php } else { ?>
                    <button class="btn btn-lg btn-block btn-danger" disabled >
                    <span class = "glyphicon glyphicon-remove-circle"> indisponivel </span>
                  </button>
                  <?php } ?>
            </div>
            </div>
            <?php } ?>
            </div>
    <?php include 'rodape.html'; ?>

    </body>
</html>