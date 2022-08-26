<?php
include '../conexao.php';

$con = getConexao();
$pFoto = $_FILES["txtFoto"]["tmp_name"];   
$pTipo = $_FILES["txtFoto"]["type"]; 
                 move_uploaded_file($pFoto, "../temp/temp.img");  
		 $pont = fopen("../temp/temp.img", "rb");   
                 $dados = addslashes(fread($pont, filesize("../temp/temp.img"))); 
$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];
$sexo = $_POST['sexo'];
$endereço = $_POST['endereço'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$idcurso = $_POST['idcurso'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$senha = $_POST['senha'];
$sql="insert into profissional(nome, data_nasc, sexo, endereço, email, cidade, estado, telefone, celular, idcurso, senha, foto, tipo) values ('$nome', '$data_nasc', '$sexo', '$endereço', '$email', '$cidade', '$estado','$telefone', '$celular', '$idcurso', md5($senha), '$dados','$pTipo')";
mysqli_query($con,$sql);
header("Location: /login/");
?>