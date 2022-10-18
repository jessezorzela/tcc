<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_recrutador = $_GET['id_recrutador'];

mysqli_query($con,"delete from usuarios where id_recrutador=$id_recrutador");

header("location: /tcc/logout/");