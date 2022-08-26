<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$nomeemp = $_POST['nomeemp'];
$razao = $_POST['razao'];
$cnpj = $_POST['cnpj'];
$idrecrutador = $_POST['idrecrutador'];
$sql="insert into empresa (nomeemp, razao, cnpj, idrecrutador) values ('$nomeemp', '$razao', '$cnpj', '$idrecrutador')";
echo $sql;
mysqli_query($con,$sql);
header("Location: ../empresa/");

?>