<?php
include '../conexao.php';

$con = getConexao();
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql="INSERT INTO adm (nome, email, senha) VALUES ('$nome', '$email', md5($senha))";
mysqli_query($con,$sql);
header("Location: ../adm/");
?>