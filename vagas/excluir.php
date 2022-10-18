<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_vaga = $_GET['id_vaga'];

mysqli_query($con,"delete from vaga where id_vaga=$id_vaga");

header("location: /tcc/folguista/");