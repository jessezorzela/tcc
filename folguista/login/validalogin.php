<?php
session_start();

include '../../conexao.php';

$con = getConexao();

$email = $_POST['email'];
$senha = $_POST['senha'];
$senhamd = md5($senha);
///echo $senhamd;
///exit;

$rs = mysqli_query($con,"select id_profissional, email, nome from profissional where email='$email' and senha='$senhamd'");
if (mysqli_num_rows($rs)>0)
{
    $row = mysqli_fetch_array($rs);
    $id_profissional = $row['id_profissional'];
    $email = $row['email'];

    $_SESSION['id_profissional'] = $id_profissional;
    $_SESSION['email'] = $email;
    $_SESSION['nome']= $row['nome'];
    header("Location: ../../vagas1/");

}
else
{
    header("Location: /tcc/folguista/login");
}
function geralog($email)
{
    $ip        = $_SERVER['REMOTE_ADDR'];
    $hora      = date("H:i:s");
    $data      = date("Y-m-d");
    $linha     = $ip." - ".$data." - ".$hora." - ".$email.PHP_EOL;

    file_put_contents('../../temp/acessolog.txt', $linha, FILE_APPEND);
}
function geralogBco($email,$con)
{
    $ip        = $_SERVER['REMOTE_ADDR'];
    $datahora  = date("Y-m-d H-i-s");

    mysqli_query($con,"insert into acessolog (email,datahora,ip) values ('$email','$datahora','$ip')");

}
?>