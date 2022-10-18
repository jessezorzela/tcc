<?php session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
?>
<?php require "../cabecalho1.php";?>
<head> 
<title>Cadastro empresa</title> 
</head> 
<?php

$con = getConexao();

$id_empresa = $_GET['id_empresa'];

// Cria o resultset
$rs = mysqli_query($con,"select * from empresa where id_empresa=$id_empresa");

while ($row = mysqli_fetch_array($rs))
{
    $id_empresa = $row['id_empresa'];
    $nomeemp = $row['nomeemp'];
    $razao = $row['razao'];
    $cnpj = $row['cnpj'];
}

?>

<div class="card p-3 shadow-lg rounded-3">
<form method="post" action="editar.php"> 
<input type="hidden" name="id_empresa" value="<?php echo $id_empresa;?>">
<h3 class="text-center">Editar Empresa</h3>

<label class="form-label">Nome da empresa</label>
    <input type="name" name="nomeemp" class="form-control" value="<?php echo $nomeemp ?>">
<label class="form-label">Razão Social</label>
    <input type="name" name="razao" class="form-control" value="<?php echo $razao ?>">
<label class="form-label">Cnpj</label>
    <input type="name" name="cnpj" class="form-control" value="<?php echo $cnpj ?>">
<br>
<input name="bt" class="form-control text-white rounded-5" type="submit" value="GRAVAR" style="background-color: #4169E1;" />
</form> 
</div>
