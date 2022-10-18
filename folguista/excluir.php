<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: logout.php");
     exit;
}
include '../conexao.php';
$con = getConexao();

$id_profissional = $_GET['id_profissional'];

mysqli_query($con,"delete from profissional where id_profissional=$id_profissional");

header("location: /tcc/logout/");

?>