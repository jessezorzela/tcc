<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: logout.php");
     exit;
}
include '../conexao.php';
include '../cabecalho.php';
$con = getConexao();

$id_profissional = $_GET['id_profissional'];

// Cria o resultset
$rs = mysqli_query($con,"select * from profissional where id_profissional=$id_profissional");

while ($row = mysqli_fetch_array($rs))
{
    $id_profissional = $row['id_profissional'];
    $nome = $row['nome'];
    $data_nasc = $row['data_nasc'];
    $sexo = $row['sexo'];
    $endereço = $row['endereço'];
    $email = $row['email'];
    $telefone = $row['telefone'];
    $celular = $row['celular'];
    $id_cursofk = $row['idcurso'];
    $cidade = $row['cidade'];
    $estado = $row['estado'];
    $idcursofk = $row['idcurso'];
}
?>
<div class="col-md-12 align-self-center">
<div class="card p-3 border rounded-3 shadow-lg">
    <h3>Dados Pessoais</h3>
    <p class="form-label"><b>ID: #</b><?php echo $id_profissional?></p>
    <label class="form-label"> <b>Nome: </b><?php echo $nome?></label>
    <label class="form-label"> <b>Sexo: </b><?php echo $sexo?></label>
    <label class="form-label"> <b>Data de nascimento: </b><?php echo $data_nasc?></label>
    <label class="form-label"> <b>Cidade: </b><?php echo $cidade?></label>
    <label class="form-label"> <b>Estado: </b><?php echo $estado?></label>
    <label class="form-label"> <b>Endereço: </b><?php echo $endereço?></label>
    <label class="form-label"> <b>Email: </b><?php echo $email?></label>
    <label class="form-label"> <b>Telefone: </b><?php echo $telefone?></label>
    <label class="form-label"> <b>Celular: </b><?php echo $celular?></label>

    <p class="form-label"> <b>Ensino Superior:</b>
     <label name="idcurso">
    <?php
    $con = getconexao();
    $rscurso = mysqli_query($con,"select * from cursos order by descricao");
    while ($rowcurso = mysqli_fetch_array($rscurso))
    {
    $id_curso = $rowcurso['id_curso'];
    $des = $rowcurso['descricao'];
    if ($id_curso==$id_cursofk)
    {
        echo "<option value='$id_curso' selected='selected'>$des</option>";
    } 
    else
    {
        echo "";
    }
    }
    ?>
    </label></p>

    <br><a class="btn text-white rounded-5" href="/tcc/folguista/editarcadastro.php?id_profissional=<?php echo $id_profissional?>" style="background-color: #712cf9;">Editar Perfil</a>
    
    </div>
    </div>
</div>