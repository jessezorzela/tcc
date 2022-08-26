<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
?>
<?php require "../cabecalho.php";?>
<head> 
<title>Incluir novo curso</title> 
</head> 
<body> 
<h3>Incluir novo curso</h3>


<form method="post" action="adicionar.php"> 
Descricao: <input type="text" name="descricao" maxlength="100" size="15" value=""><br>
<br>
<input type="submit" value="GRAVAR"><br>

</form> 
<a href="index.php">Voltar</a>
</body> 
