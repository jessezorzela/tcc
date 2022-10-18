<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: logout.php");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_profissional = $_SESSION['id_profissional'];
print($id_profissional);
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$data_nasc = $_POST['data_nasc'];
$sexo = $_POST['sexo'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereço = $_POST['endereço'];
$idcurso = $_POST['idcurso'];
$senha = $_POST['senha'];
mysqli_query($con,"update profissional set nome='$nome', email='$email', data_nasc='$data_nasc', sexo='$sexo', endereço='$endereço', celular='$celular', telefone='$telefone', cidade='$cidade', estado='$estado', idcurso='$idcurso', senha=md5($senha) where id_profissional=$id_profissional");
header("Location:../logout/");
?>