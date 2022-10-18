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
    $edu = $row['edu'];
    $infcurso = $row['infcurso'];
    $curso = $row['curso'];
    $expe = $row['expe'];
}
?>
<div class="col-md-12 align-self-center">
<div class="card p-3 border rounded-3 shadow-lg">
<h3 class="display-7 fw-bold lh-1 mb-3">Dados Pessoais</h3>
    <label class="form-label"> <b>Nome: </b><?php echo $nome?></label>
    <div class="row">
    <div class="col">
    <label class="form-label"> <b>Data de nascimento: </b><?php echo date('d/m/Y', strtotime($data_nasc)) ?></label>
    </div>
    <div class="col">
    <label class="form-label"> <b>Sexo: </b><?php echo $sexo?></label>
    </div>
    </div>
    <label class="form-label"> <b>Cidade: </b><?php echo $cidade?></label>
    <label class="form-label"> <b>Estado: </b><?php echo $estado?></label>
    <label class="form-label"> <b>Endereço: </b><?php echo $endereço?></label>
    <br>
    <h3 class="display-7 fw-bold lh-1 mb-3">Contatos</h3>
    <label class="form-label"> <b>Email: </b><?php echo $email?></label>
    <div class="row">
    <div class="col">
    <label class="form-label"> <b>Telefone: </b><?php echo $telefone?></label>
    </div>
    <div class="col">
    <label class="form-label"> <b>Celular: </b><?php echo $celular?></label>
    </div>
    </div>
    <br>
    <h3 class="display-7 fw-bold lh-1 mb-3">Educação</h3>
    <label class="form-label"> <b>Nivel de escolaridade: </b></br><?php echo $edu?></label>
    <p class="form-label"> <b>Ensino Superior em:</b></br>
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
    <label class="form-label"> <b>Informações sobre sua(s) formação(ões): </b></br><?php echo $infcurso?></label>
    <br>
    <h3 class="display-7 fw-bold lh-1 mb-3">Curso</h3>
    <label class="form-label"> <b>Informações do(s) curso(s) realizado(s): </b></br><?php echo $curso?></label>
    <br>
    <h3 class="display-7 fw-bold lh-1 mb-3">Experiencia</h3>
    <label class="form-label"> <b>Informações da(s) sua(s) experiencia(s): </b></br><?php echo $expe?></label>
    
    </div>
    </div>
</div>