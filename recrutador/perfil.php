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
    <h3>Perfil</h3>
    <label class="form-label"> <b>Nome: </b><?php echo $nome?></label>
    <label class="form-label"> <b>Email: </b><?php echo $email?></label>

    <br><a class="btn text-white rounded-5" href="/tcc/recrutador/editarrecrutador.php?id_recrutador=<?php echo $id_recrutador?>" style="background-color: #4169E1;">Editar Perfil</a>
    <a class="btn text-white rounded-5" href="/tcc/recrutador/excluir.php?id_recrutador=<?php echo $id_recrutador?>" style="background-color: #FF0000;">Excluir Perfil</a>
    </div>
    </div>
</div>