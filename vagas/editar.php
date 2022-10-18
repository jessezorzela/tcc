<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: logout.php");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_vaga = $_POST['id_vaga'];
$nome = $_POST['nome'];
$descricaoo = $_POST['descricaoo'];
$idempresa = $_POST['idempresa'];
$idprofissao = $_POST['idprofissao'];
$idstatus = $_POST['idstatus'];
mysqli_query($con,"update vaga set nome='$nome', descricaoo='$descricaoo', idempresa='$idempresa', idprofissao='$idprofissao', idstatus='$idstatus' where id_vaga=$id_vaga");
header("Location: /tcc/folguista/");
?>