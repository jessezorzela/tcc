<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_empresa = $_POST['id_empresa'];
$nomeemp = $_POST['nomeemp'];
$razao = $_POST['razao'];
$cnpj = $_POST['cnpj'];
mysqli_query($con,"update empresa set nomeemp='$nomeemp', razao='$razao', cnpj='$cnpj' where id_empresa=$id_empresa");
header("Location: /tcc/empresa/");
?>