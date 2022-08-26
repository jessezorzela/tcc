<?php
session_start();
if (!isset($_SESSION['id_usuario']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
require "../cabecalho.php";
?>
<div class= "container">

<head> 
<title>Editar Profissão</title> 
</head> 
<body> 
<h3>Editar Profissão</h3>

<?php

$con = getConexao();

$id_profissao = $_GET['id_profissao'];

// Cria o resultset
$rs = mysqli_query($con,"select * from profissao where id_profissao=$id_profissao");

while ($row = mysqli_fetch_array($rs))
{
    $id_profissao = $row['id_profissao'];
    $descricao = $row['descricao'];
}

?>

<form method="post" action="editar.php"> 

<input type="hidden" name="id_profissao" value="<?php echo $id_profissao;?>">
Descricao: <input type="text" name="descricao" maxlength="150" size="15" value="<?php echo $descricao;?>"><br>
<br>

<input type="submit" value="GRAVAR"><br>

</form> 
<a href="index.php">Voltar</a>
</div>
</body> 
