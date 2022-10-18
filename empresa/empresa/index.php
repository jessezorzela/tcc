
<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: logout.php");
     exit;
}
$email = $_SESSION['email'];
require '../../cabecalho.php';
require '../../conexao.php';
?>

<link rel="stylesheet" href="../css/1.css">
<div class="card p-3 border rounded-3 shadow-lg" style="background-color: #fff;">
  <div class="container-fluid">

    <form method="post" action="index.php">
      <form class="form-inline">
        <div class="row">
          <div class="col-md-10">
            <input name="pchave" class="form-control mr-sm-2 rounded-4" type="search" aria-label="Search">
          </div>
          <br>
          <div class="col-md-2">
          <button name="bt" class="form-control text-white rounded-4" type="submit" style="background-color: #4169E1;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
          </div>
        </div>
      </form>
    </form>
  </div>
</div>

<h3 class="text-center">EMPRESAS CADASTRADAS</h3>

<div class="card p-3 border rounded-3 shadow-lg">
<div class="row">
<?php
    $pchave = "";
    if ($_POST) {$pchave = $_POST['pchave'];}
    // Estabelece a conexao com o banco de dados e o database
    $con = getConexao();
    //Buscador
    if ($_POST) {$pchave = $_POST['pchave'];}
    if ($pchave==null) {
      $rs = mysqli_query($con, "select * from empresa order by nomeemp");
    } else {      
      $rs = mysqli_query($con, "select * from empresa where nomeemp like '%$pchave%' or razao like '%$pchave%' or cnpj like '%$pchave%' order by nomeemp");
    }
    // Cria o resultset
while ($row = mysqli_fetch_array($rs)) {
    $id_empresa = $row['id_empresa'];
    $nomeemp = $row['nomeemp'];
    $razao = $row['razao'];
    $cnpj = $row['cnpj'];

    echo "
    <div class='col-md-12 align-self-center'>
    <div class='card p-3 text-bg-light rounded-3'>  
        <h5>$nomeemp</h5>
        <div class='row'>
        <div class='col-md-6'>
        <label class='form-label'><small><b>Razão social:</b> $razao</small></label>
        </div>
        <div class='col-md-6 text-end'>
        <label class='form-label'><small><b>CNPJ:</b> $cnpj</small></label>
        </div>
        </div>
        
        
    </div>
    </div>
     ";
}
?>
  </div>
</div>
</div>
<?php require "../../rodape.php"; ?>