<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: logout.php");
     exit;
}
$email = $_SESSION['email'];
require '../cabecalho1.php';
require '../conexao.php';
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
<div class="row">
<div class="col-md-6">
</div>
</div>
<h3 class="text-center">FOLGUISTAS</h3>
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
    <div class='col-md-12'>
    <div class='card h-100 text-center rounded-3 shadow-lg'>  
    <div class='card-body'>
    <div class='card-text'>
        <h5>$nom</h5>
    </div>
        <p class='card-text'><small><span class='d-inline-block text-truncate' style='max-wid_profissionalth: 160px;'>$descricao</span></small></p>
    </div>
    <div class='card-footer'>
        <a class='btn text-white rounded-5' href='/tcc/folguista/ver.php?id_profissional=$id_profissional' style='background-color: #4169E1;' target='_blank' rel='noopener noreferrer'>Ver Curriculo</a>
    </div>
    </div>
    </div>
     ";
}
?>
  </div>

</div>
<?php require "../rodape.php"; ?>