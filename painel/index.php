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
<div class="card p-3 border rounded-3 shadow-lg">
<h3 class="text-center">Minhas Vagas</h3>
<div class="row">
   <?php
   $con = getConexao();
   
   $id_recrutador = $_GET['id_recrutador'];

   // Cria o resultset
   $rs = mysqli_query($con,"select vaga.*, profissao.descricao from vaga, profissao where vaga.idprofissao=profissao.id_profissao and vaga.idrecrutador=$id_recrutador order by vaga.nome");

   while ($row = mysqli_fetch_array($rs))
   {
    $nom = $row['nome'];
    $descricaoo = $row['descricaoo'];
    $id_vaga = $row['id_vaga'];
    $data_cri = $row['data_cri'];
    echo "
  <div class='col-md-12 align-self-center'>
  <div class='card p-3 text-bg-light rounded-3'>  
  <div class='row'>
  <div class='col text-center'>
  <a class='btn rounded-5' href='/tcc/vagas/editarvaga.php?id_vaga=$id_vaga' style='background-color: #ffff00;' target='_blank' rel='noopener noreferrer'>Editar</a>
  </div>
  <div class='col text-center'>|</div>
  <div class='col text-center'>
  <a class='btn text-white rounded-5' href='/tcc/vagas/excluir.php?id_vaga=$id_vaga' style='background-color:  #FF0000;' target='_blank' rel='noopener noreferrer'>Excluir</a>
  </div>
  </div>
  <small><span class='d-inline-block text-truncate' style='max-wid_vagath: 160px;'>Postada em " . date('d/m/Y', strtotime($data_cri)) . "</span></small>
      <h5>$nom</h5>

      <a class='btn text-white rounded-5' href='/tcc/painel/ver.php?id_vaga=$id_vaga' style='background-color: #4169E1;' target='_blank' rel='noopener noreferrer'>Ver Vaga</a>
    
  
  </div>
  </div>
   ";
    }
    ?>
</div>
</div>
</div>
<br>
<?php require "../rodape.php"; ?>