<?php
include '../conexao.php';

$con = getConexao();
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql="INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', md5($senha))";
mysqli_query($con,$sql);
header("Location: ../recrutador/login/");
?>