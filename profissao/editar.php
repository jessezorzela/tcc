<?php
session_start();
if (!isset($_SESSION['id_usuario']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_profissao = $_POST['id_profissao'];
$descricao = $_POST['descricao'];

mysqli_query($con,"update profissao set descricao='$descricao' where id_profissao=$id_profissao");

header("Location: index.php");

?>