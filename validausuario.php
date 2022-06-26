<?php
include 'conexao.php';

session_start(); //iniciando uma seção
$vemail = $_POST['txtemail'];
$vsenha = $_POST['txtsenha'];


$consulta = $cn->query("select cd_usuario,nm_usuario, ds_email, ds_senha, ds_status from usuario where ds_email = '$vemail' and ds_senha = '$vsenha' ");

if($consulta->rowCount () == 1)
{
    // echo 'usuario está cadastrado';
    $exibeusuario = $consulta->fetch(PDO::FETCH_ASSOC);
    if($exibeusuario['ds_status'] == 0)
    {
        $_SESSION['ID'] = $exibeusuario['cd_usuario'];
        $_SESSION['STATUS'] =0;
        header('location:Index.php');
    }
    else 
    {
        $_SESSION['ID'] = $exibeusuario['cd_usuario'];
        $_SESSION['STATUS'] =1;
        header('location:Index.php');
    }
}
else 
{
    header('location:erro.php');
}

?>