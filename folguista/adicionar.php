<?php
include '../conexao.php';

$con = getConexao();
$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];
$sexo = $_POST['sexo'];
$endereço = $_POST['endereço'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$edu = $_POST['edu'];
$idcurso = $_POST['idcurso'];
$infcurso = $_POST['infcurso'];
$curso = $_POST['curso'];
$expe = $_POST['expe'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$senha = $_POST['senha'];
$sql = "INSERT INTO profissional (nome, data_nasc, sexo, endereço, email, cidade, estado, telefone, celular, edu, idcurso, infcurso, curso, expe, senha) VALUES ('$nome', '$data_nasc', '$sexo', '$endereço', '$email', '$cidade', '$estado', '$telefone', '$celular', '$edu', '$idcurso', '$infcurso', '$curso', '$expe', md5($senha))";
mysqli_query($con,$sql);
header("Location: ../folguista/login/");
?>