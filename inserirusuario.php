<?php
include 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$end = $_POST['endereco'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];

/* testando variaveis
echo $nome . '<br>';
echo $email . '<br>';
echo $senha . '<br>';
echo $end . '<br>';
echo $cidade . '<br>';
echo $cep . '<br>';
*/ 

$consulta = $cn->query("select ds_email from usuario where ds_email = '$email' ");
$exibe = $consulta ->fetch(PDO::FETCH_ASSOC);

if($consulta->rowCount() == 1){
    //echo "Email-já cadastrado, tente novamente!";

    header('location:erro1.php');
}
else {
   // echo 'usuario pode ser cadastrado.';
   $incluir = $cn->query("insert into usuario(nm_usuario,ds_email,ds_senha,ds_status,ds_endereco,ds_cidade,no_cep)
                         values('$nome','$email','$senha','0','$end','$cidade','$cep')");
    header('location:ok.php');
}





?>