<?php
session_start();
if (!isset($_SESSION['id_adm']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$descricao = $_POST['descricao'];

$sql="insert into cursos (descricao) values ('$descricao')";
echo $sql;
mysqli_query($con,$sql);

header("Location: index.php");

?>