<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: logout.php");
     exit;
}
include '../conexao.php';

$con = getConexao();
$pFoto = $_FILES["txtFoto"]["tmp_name"];   
$pTipo = $_FILES["txtFoto"]["type"]; 
 
                 move_uploaded_file($pFoto, "../temp/temp.img");  
		 $pont = fopen("../temp/temp.img", "rb");   
                 $dados = addslashes(fread($pont, filesize("../temp/temp.img"))); 
$id_profissional = $_POST['id_profissional'];
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
mysqli_query($con,"update profissional set nome='$nome', email='$email', data_nasc='$data_nasc', sexo='$sexo', endereço='$endereço', celular='$celular', telefone='$telefone', cidade='$cidade', estado='$estado', foto='$dados', tipo='$pTipo', idcurso='$idcurso' where id_profissional=$id_profissional");
header("Location: ../folguista/");
?>