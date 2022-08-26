<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
$con = getConexao();
$id_profissional = $_GET["id_profissional"];  

$rs = mysqli_query($con,"select foto, tipo from profissional where id_profissional = ".$id_profissional."");         
$row = mysqli_fetch_array($rs); 
$tipo   = $row["tipo"];                        
$bytes  = $row["foto"];                        
// ecoa o cabecalho da imagem e depois os dados                               
header("Content-type: ".$tipo."");             
echo $bytes;                                   
?>
