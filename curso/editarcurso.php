<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
require "../cabecalho.php";
?>
<div class= "container">

<head> 
<title>Editar curso</title> 
</head> 
<body> 
<h3>Editar curso</h3>

<?php

$con = getConexao();

$id_curso = $_GET['id_curso'];

// Cria o resultset
$rs = mysqli_query($con,"select * from cursos where id_curso=$id_curso");

while ($row = mysqli_fetch_array($rs))
{
    $id_curso = $row['id_curso'];
    $descricao = $row['descricao'];
}

?>

<form method="post" action="editar.php"> 

<input type="hidden" name="id_curso" value="<?php echo $id_curso;?>">
Descricao: <input type="text" name="descricao" maxlength="150" size="15" value="<?php echo $descricao;?>"><br>
<br>

<input type="submit" value="GRAVAR"><br>

</form> 
<a href="index.php">Voltar</a>
</div>
</body> 
