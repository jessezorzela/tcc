<?php
session_start();
if (!isset($_SESSION['id_adm']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_aplicar = $_GET['id_aplicar'];

mysqli_query($con,"delete from aplicar where id_aplicar=$id_aplicar");

header("location: /tcc/relatorio/");