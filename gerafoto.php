<?php
session_start();
include 'conexao.php';
$con = getConexao();
$id = $_GET["id"];  

$rs = mysqli_query($con,"select foto, tipo from profissional where Id_profissional = ".$id."");         
$row = mysqli_fetch_array($rs); 
$tipo   = $row["tipo"];                        
$bytes  = $row["foto"];                        
// ecoa o cabecalho da imagem e depois os dados                               
header("Content-type: ".$tipo."");             
echo $bytes;                                   
?>