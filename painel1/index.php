<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: logout.php");
     exit;
}
$email = $_SESSION['email'];
require '../cabecalho.php';
require '../conexao.php';

?>

<link rel="stylesheet" href="../css/1.css">
<div class="card p-3 border rounded-3 shadow-lg">
<h3 class="text-center">MINHAS APLICAÇÕES</h3>
<div class="row">
   <?php
   $con = getConexao();
   
   $id_profissional = $_GET['id_profissional'];

   // Cria o resultset
   $rs = mysqli_query($con,"select aplicar.*, vaga.nome from aplicar, vaga where aplicar.idvaga=vaga.id_vaga and aplicar.idprofissional=$id_profissional order by aplicar.data_aplicar");

   while ($row = mysqli_fetch_array($rs))
   {
    $idvaga = $row['idvaga'];
    $nom = $row['nome'];
    $id_aplicar = $row['id_aplicar'];
    $data_aplicar = $row['data_aplicar'];
    echo "
  <div class='col-md-12 align-self-center'>
  <div class='card p-3 text-bg-light rounded-3'>  
  
  <div class='row'>
  <div class='col'>
  <small><span class='d-inline-block text-truncate' style='max-wid_vagath: 160px;'>Data da aplicação<br>" . date('d/m/Y', strtotime($data_aplicar)) . "</span></small>
  </div>
  <div class='col'>
  <div class='text-end'>
  <a class='btn btn-danger btn-custom rounded-5' href='excluir.php?id_aplicar=$id_aplicar'>
  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'></path>
  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'></path>
</svg>
  Excluir Aplicação
  </a>
  </div>
  </div>
  </div>
   <h5>$nom</h5>

      <a class='btn text-white rounded-5' href='/tcc/painel1/ver.php?idvaga=$idvaga' style='background-color: #4169E1;' target='_blank' rel='noopener noreferrer'>Ver +</a>
    
  
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