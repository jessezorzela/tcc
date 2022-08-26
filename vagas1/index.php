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
    <h3 class="text-center">Vagas</h3>
    <form method="post" action="index.php">
      <form class="form-inline">
        <div class="row">
          <div class="col-md-10">
            <input name="pchave" class="form-control mr-sm-2 rounded-4" type="search" aria-label="Search">
          </div>
          <br>
          <div class="col-md-2">
          <button name="bt" class="form-control text-white rounded-4" type="submit" style="background-color: #712cf9;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
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

      $rs = mysqli_query($con, "select profissional.*, cursos.descricao from profissional, cursos where profissional.idcurso=cursos.id_curso order by profissional.nome");
    
    } else {

      $rs = mysqli_query($con,"select profissional.*, cursos.descricao from profissional, cursos where profissional.idcurso=cursos.id_curso and (nome like '%$pchave%' or email like '%$pchave%' or telefone like '%$pchave%' or endereço like '%$pchave%' or descricao like '%$pchave%') order by nome");
    }
    // Cria o resultset
while ($row = mysqli_fetch_array($rs)) {
      $nom = $row['nome'];
      $em = $row['email'];
      $tel = $row['telefone'];
      $end = $row['endereço'];
      $id_profissional = $row['id_profissional'];
      $descricao = $row['descricao'];

      echo "
    <div class='col-md-12 align-self-center'>
    <div class='card p-3 text-bg-light rounded-3'>  
    <div class='row'>
    <div class='col'>
    <img src='/tcc/folguista/gerafoto.php?id_profissional=$id_profissional' class='img card-img-top' style='width:80px; height:80px'>
    </div>
    <div class='col-md-9'>
        <h5><small class='text-muted'>#$id_profissional</small> $nom</h5>
        <p class='card-text'><small><span class='d-inline-block text-truncate' style='max-wid_profissionalth: 160px;'>$descricao</span></small></p>
        <a class='btn text-white rounded-5' href='/tcc/folguista/ver.php?id_profissional=$id_profissional' style='background-color: #712cf9;' target='_blank' rel='noopener noreferrer'>Ver Curriculo</a>
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
        <a class='btn btn-success rounded-5' href='/tcc/folguista/excluir.php?id_profissional=$id_profissional' role='button'>SIM</a>
      </div>
    </div>
  </div>
</div>
        <a class='btn btn-warning text-white rounded-5' href='/tcc/folguista/editarcadastro.php?id_profissional=$id_profissional' role='button'>EDITAR</a>
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