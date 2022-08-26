
<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: logout.php");
     exit;
}
$email = $_SESSION['email'];
$direito = $_SESSION['direito'];
require '../../cabecalho.php';
require '../../conexao.php';
?>

<link rel="stylesheet" href="../css/1.css">
<div class="card p-3 border rounded-3 shadow-lg" style="background-color: #fff;">
  <div class="container-fluid">
    <h3 class="text-center">Empresas</h3>
    <form method="post" action="index.php">
      <form class="form-inline">
        <div class="row">
          <div class="col-md-12">
            <input name="pchave" class="form-control mr-sm-2 rounded-5" type="search" aria-label="Search">
          </div>
          <br><br>
          <div class="col-md-12">
          <input name="bt" class="form-control text-white rounded-5" type="submit" value="Buscar" style="background-color: #712cf9;" />
          </div>
        </div>
      </form>
    </form>
  </div>
</div>
<br>
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

      $rs = mysqli_query($con, "select empresa.*, usuarios.nome from empresa, usuarios where empresa.idrecrutador=usuarios.id_recrutador order by empresa.nomeemp");
 
    } else {
        
      $rs = mysqli_query($con, "select empresa.*, usuarios.nome from empresa, usuarios where empresa.idrecrutador=usuarios.id_recrutador and (nomeemp like '%$pchave%' or razao like '%$pchave%' or cnpj like '%$pchave%' or nome like '%$pchave%') order by nomeemp");
    }
    // Cria o resultset
while ($row = mysqli_fetch_array($rs)) {
    $id_empresa = $row['id_empresa'];
    $nomeemp = $row['nomeemp'];
    $razao = $row['razao'];
    $cnpj = $row['cnpj'];
    $nome = $row['nome'];

    echo "
    <div class='col-md-12 align-self-center'>
    <div class='card p-3 text-bg-light rounded-3'>  
        <h5>$nomeemp</h5>
        <div class='row'>
        <div class='col-md-6'>
        <label class='form-label'><small><b>Razão social:</b> $razao</small></label>
        </div>
        <div class='col-md-6'>
        <label class='form-label'><small><b>CNPJ:</b> $cnpj</small></label>
        </div>
        <div class='col-md-6'>
        <label class='form-label'><small><b>Recrutador:</b> $nome</small></label>
        </div>
        </div>
        <a class='btn text-white rounded-5' href='/tcc/empresa/ver.php?id_empresa=$id_empresa' style='background-color: #712cf9;'>Ver Vagas</a>
        
    </div>
    </div>
     ";

    if ($direito =="1") {
        echo "
        <div class='col-md-12 align-self-center'>
        <div class='card p-1 text-center bg-light rounded-3'>
        <button type='button' class='btn btn-danger rounded-5' data-bs-toggle='modal' data-bs-target='#exampleModal'>EXCLUIR</button>
      <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>Deseja excluir empresa?</h5>
        <button type='button' class='btn-close rounded-5' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger rounded-5' data-bs-dismiss='modal'>NÃO</button>
        <a class='btn btn-success rounded-5' href='/tcc/empresa/excluir.php?id_empresa=$id_empresa' role='button'>SIM</a>
      </div>
    </div>
  </div>
</div>
        <a class='btn btn-warning text-white rounded-5' href='/tcc/empresa/editarempresa.php?id_empresa=$id_empresa'role='button'>EDITAR</a>
        </div>
        </div>
        ";
}
}
?>
  </div>
</div>
</div>
<?php require "../../rodape.php"; ?>