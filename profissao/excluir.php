<?php
session_start();
if (!isset($_SESSION['id_adm']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_profissao = $_GET['id_profissao'];

mysqli_query($con,"delete from profissao where id_profissao=$id_profissao");

header("location: index.php");
?>