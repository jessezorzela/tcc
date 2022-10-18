<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
require '../conexao.php';

$con = getConexao();

$id_recrutador = $_POST['id_recrutador'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
mysqli_query($con,"update usuarios set nome='$nome', email='$email', senha=md5($senha) where id_recrutador=$id_recrutador");

header("Location:../logout/");

?>