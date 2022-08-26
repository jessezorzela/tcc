<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: logout.php");
     exit;
}
include '../conexao.php';
include '../cabecalho1.php';
$con = getConexao();

$id_recrutador = $_GET['id_recrutador'];

// Cria o resultset
$rs = mysqli_query($con,"select * from usuarios where id_recrutador=$id_recrutador");

while ($row = mysqli_fetch_array($rs))
{
    $id_recrutador = $row['id_recrutador'];
    $nome = $row['nome'];
    $email = $row['email'];

}
?>
<div class="col-md-12 align-self-center">
<div class="card p-3 border rounded-3 shadow-lg">
    <h3>Dados Pessoais</h3>
    <p class="form-label"><b>ID: #</b><?php echo $id_recrutador?></p>
    <label class="form-label"> <b>Nome: </b><?php echo $nome?></label>
    <label class="form-label"> <b>Email: </b><?php echo $email?></label>

    <br><a class="btn text-white rounded-5" href="/tcc/recrutador/editarrecrutador.php?id_recrutador=<?php echo $id_recrutador?>" style="background-color: #712cf9;">Editar Perfil</a>
    
    </div>
    </div>
</div>