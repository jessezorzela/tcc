<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
require "../cabecalho1.php";
?>
<head> 
<title>Cadastro empresa</title> 
</head> 


<div class="card p-3 text-bg-light shadow-lg rounded-3">
<form method="post" action="adicionar.php"> 
<h3 class="text-center">Vaga</h3>

<p class="form-label"> <b>Recrutador:</b>
     <select name="idrecrutador">

<?php
$con = getconexao();

$id_recrutador = $_GET['id_recrutador'];

$rs = mysqli_query($con,"select * from usuarios where id_recrutador=$id_recrutador");
while ($row = mysqli_fetch_array($rs))
{
   $id_recrutador = $row['id_recrutador'];
   $nome = $row['nome'];

   echo "<option value=$id_recrutador>$nome</option>";   
}
?>
</select>  </p>
<label class="form-label">Nome da empresa</label>
    <input type="name" name="nomeemp" class="form-control" placeholder="nome da empresa">
<label class="form-label">Razão Social</label>
    <input type="name" name="razao" class="form-control">
<label class="form-label">Cnpj</label>
    <input type="name" name="cnpj" class="form-control">
<br>
<input name="bt" class="form-control text-white rounded-5" type="submit" value="GRAVAR" style="background-color: #712cf9;" />
</form> 
</div>

