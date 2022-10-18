<?php
session_start();
if (!isset($_SESSION['id_adm']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';

$con = getConexao();

$id_curso = $_GET['id_curso'];

mysqli_query($con,"delete from cursos where id_curso=$id_curso");

header("location: index.php");
?>