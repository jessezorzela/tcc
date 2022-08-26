<?php
include '../conexao.php';

$con = getConexao();
$pFoto = $_FILES["txtFoto"]["tmp_name"];   
$pTipo = $_FILES["txtFoto"]["type"];  
                 move_uploaded_file($pFoto, "../temp/temp.img");  
		 $pont = fopen("../temp/temp.img", "rb");   
                 $dados = addslashes(fread($pont, filesize("../temp/temp.img"))); 
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql="insert into usuarios (nome, email, senha, foto, tipo) values ('$nome', '$email', md5($senha), '$dados','$pTipo')";
mysqli_query($con,$sql);
header("Location: /login/");
?>