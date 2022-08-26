<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: logout.php");
     exit;
}
$email = $_SESSION['email'];
$direito = $_SESSION['direito'];
require '../cabecalho.php';
require '../conexao.php';
?>

<link rel="stylesheet" href="../css/1.css">
<div class="card p-3 border rounded-3 shadow-lg" style="background-color: #fff;">
  <div class="container-fluid">
    <h3 class="text-center">Recrutadores</h3>
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
<div class="col-md-6">
</div>
</div>
  
  <div class="row">
<?php
    $pchave = "";
    if ($_POST) {$pchave = $_POST['pchave'];}
    // Estabelece a conexao com o banco de dados e o database
    $con = getConexao();
    //Buscador
    if ($_POST) {$pchave = $_POST['pchave'];}

    if ($pchave==null) {

      $rs = mysqli_query($con, "select usuarios.*, empresa.nomeemp from usuarios, empresa where usuarios.idempresa=empresa.id_empresa order by usuarios.nome");
    
    } else {

      $rs = mysqli_query($con,"select usuarios.*, empresa.nomeemp from usuarios, empresa where usuarios.idempresa=empresa.id_empresa and (nome like '%$pchave%' or email like '%$pchave%' or telefone like '%$pchave%' or endereço like '%$pchave%' or nomeemp like '%$pchave%') order by nome");
    }
    // Cria o resultset
while ($row = mysqli_fetch_array($rs)) {
      $nom = $row['nome'];
      $em = $row['email'];
      $tel = $row['telefone'];
      $end = $row['endereço'];
      $id_profissional = $row['id_recrutador'];
      $nomeemp = $row['nomeemp'];

      echo "
    <div class='col-md-12 align-self-center'>
    <div class='card p-3 text-bg-light rounded-3'>  
    <div class='row'>
    <div class='col'>
    <img src='/tcc/recrutador/gerafoto1.php?id_recrutador=$id_recrutador' class='img card-img-top' style='width:80px; height:80px'>
    </div>
    <div class='col-md-9'>
        <h5><small class='text-muted'>#$id_recrutador</small> $nom</h5>
        <p class='card-text'><small><span class='d-inline-block text-truncate' style='max-wid_recrutadorth: 160px;'>$nomeemp</span></small></p>
        <a class='btn text-white rounded-5' href='/tcc/folguista/ver.php?id_recrutador=$id_recrutador' style='background-color: #712cf9;'>Ver Curriculo</a>
        </div>
    </div>
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
        <h5 class='modal-title'>Deseja excluir curriculo?</h5>
        <button type='button' class='btn-close rounded-5' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger rounded-5' data-bs-dismiss='modal'>NÃO</button>
        <a class='btn btn-success rounded-5' href='/tcc/folguista/excluir.php?id_recrutador=$id_recrutador' role='button'>SIM</a>
      </div>
    </div>
  </div>
</div>
        <a class='btn btn-warning text-white rounded-5' href='/tcc/folguista/editarcadastro.php?id_recrutador=$id_recrutador'role='button'>EDITAR</a>
        </div>
        </div>
        ";
}
}
?>
  </div>
</div>
</div>
<?php require "../rodape.php"; ?>