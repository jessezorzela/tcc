<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();
$idrecrutador = $_POST['idrecrutador'];
$nome = $_POST['nome'];
$idempresa = $_POST['idempresa'];
$idprofissao = $_POST['idprofissao'];
$descricaoo = $_POST['descricaoo'];
$sql = "INSERT INTO vaga (idrecrutador, nome, idempresa, idprofissao, descricaoo) VALUES ('$idrecrutador', '$nome', '$idempresa', '$idprofissao', '$descricaoo')";
mysqli_query($con,$sql);
header("Location: /tcc/empresa/");

?>