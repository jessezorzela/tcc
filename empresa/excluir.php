<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_empresa = $_GET['id_empresa'];

mysqli_query($con,"delete from empresa where id_empresa=$id_empresa");

header("location: /tcc/empresa/");