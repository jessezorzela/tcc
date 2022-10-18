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
<h3 class="text-center">Minhas Empresas</h3>
<div class="row">
   <?php
   $con = getConexao();
   
   $id_recrutador = $_GET['id_recrutador'];

   // Cria o resultset
   $rs = mysqli_query($con,"select empresa.*, usuarios.nome from empresa, usuarios where empresa.idrecrutador=usuarios.id_recrutador and empresa.idrecrutador=$id_recrutador  order by empresa.nomeemp");

   while ($row = mysqli_fetch_array($rs))
   {
    $id_empresa = $row['id_empresa'];
    $nom = $row['nomeemp'];
    $razao = $row['razao'];
    $cnpj = $row['cnpj'];
    echo "
    <div class='col-md-12 align-self-center'>
    <div class='card p-3 text-bg-light rounded-3'>  
    <div class='row'>
    <div class='col text-center'>
    <a class='btn rounded-5' href='/tcc/empresa/editarempresa.php?id_empresa=$id_empresa' style='background-color: #ffff00;' target='_blank' rel='noopener noreferrer'>Editar</a>
    </div>
    <div class='col text-center'>|</div>
    <div class='col text-center'>
    <a class='btn text-white rounded-5' href='/tcc/empresa/excluir.php?id_empresa=$id_empresa' style='background-color:  #FF0000;' target='_blank' rel='noopener noreferrer'>Excluir</a>
    </div>
    </div>
        <h5>$nom</h5>
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
<br>
<?php require "../rodape.php"; ?>