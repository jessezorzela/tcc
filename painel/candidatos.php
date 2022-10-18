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
<h3 class="text-center">Candidatos a Vaga</h3>
<div class="row">
   <?php
   $con = getConexao();
   
   $id_vaga = $_GET['id_vaga'];

   // Cria o resultset
   $rs = mysqli_query($con,"select aplicar.*, profissional.nome from aplicar, profissional where aplicar.idprofissional=profissional.id_profissional and aplicar.idvaga=$id_vaga order by id_aplicar");

   while ($row = mysqli_fetch_array($rs))
   {
    $nom = $row['nome'];
    $id_aplicar = $row['id_aplicar'];
    $data_aplicar = $row['data_aplicar'];
    $id_profissional = $row['idprofissional'];
    echo "
  <div class='col-md-12 align-self-center'>
  <div class='card p-3 text-bg-light rounded-3'>  
  <small><span class='d-inline-block text-truncate' style='max-wid_vagath: 160px;'>Aplicou na vaga em " . date('d/m/Y', strtotime($data_aplicar)) . "</span></small>
      <h5>$nom</h5>
      <a class='btn text-white rounded-5' href='/tcc/folguista/ver.php?id_profissional=$id_profissional' style='background-color: #4169E1;' target='_blank' rel='noopener noreferrer'>Ver Curriculo</a>
    
  
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