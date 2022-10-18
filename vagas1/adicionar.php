<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();
$idvaga = $_POST['idvaga'];
$idprofissional = $_POST['idprofissional'];

$sql="insert into aplicar (idvaga, idprofissional) values ('$idvaga', '$idprofissional')";
echo $sql;
mysqli_query($con,$sql);
header("Location: /tcc/vagas1/");

?>