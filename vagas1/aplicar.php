<?php session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
?>
<?php require "../cabecalho.php";?>
<head> 
<title>Cadastro empresa</title> 
</head> 


<div class="card p-3 shadow-lg rounded-3">
<form method="post" action="adicionar.php"> 
<h3 class="text-center"></h3>

<p class="form-label">
     <select  name="idprofissional">
<option value="<?php echo $id_profissional ?>" ></option> 

</select>  </p>

<br>
<input name="bt" class="form-control text-white rounded-5" type="submit" value="Aplicar" style="background-color: #4169E1;" />
</form> 
</div>
