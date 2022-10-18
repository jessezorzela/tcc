<?php
session_start();
if (!isset($_SESSION['id_adm']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_curso = $_POST['id_curso'];
$descricao = $_POST['descricao'];

mysqli_query($con,"update cursos set descricao='$descricao' where id_curso=$id_curso");

header("Location: index.php");

?>