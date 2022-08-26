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
}

?>
    <div class="card p-5 text-bg-light shadow-lg">
        <form action="editar.php" method="POST" enctype="multipart/form-data">
        <h3 class="display-4 fw-bold lh-1 mb-3">Perfil</h3>
        <input type="hidden" name="id_profissional" value="<?php echo $id_profissional?>">
                <label class="form-label">Foto</label>
                <input type="file" name="txtFoto" class="form-control">

                <label class="form-label">Nome Completo</label>
                <input type="name" name="nome" class="form-control" placeholder="nome" value="<?php echo $nome?>">
                
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com" value="<?php echo $email?>">
    
                <div class="row">
                <div class="col-md-4">
                <label class="form-label">Telefone</label>
                <input type="tel" name="telefone" class="form-control" value="<?php echo $telefone?>">
                </div>
                <div class="col-md-4">
                <label class="form-label">Celular</label>
                <input type="tel" name="celular" class="form-control" value="<?php echo $celular?>">
                </div>
                <div class="col-md-4">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nasc" class="form-control" value="<?php echo $data_nasc?>">
                </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="sexo" value="feminino">
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="sexo" value="masculino">
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="sexo" value="outro">
                <label for="outro">Outro</label>
                </div>
                <div class="col-md-6">
                <label class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" value="<?php echo $cidade?>">
                <label class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" value="<?php echo $estado?>">
                </div>
                </div>

                <label class="form-label">Endereço</label>
                <input type="text" name="endereço" class="form-control" value="<?php echo $endereço?>">

                <label class="form-label">Curso</label>
                <select name="idcurso" class="form-control">

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
        echo "<option value='$id_curso' data-id-curso-fk= \"$id_cursofk\">$des</option>";
    }
 
 }
 ?>

</select>
<br>
                <input name="bt" class="form-control text-white rounded-5" type="submit" value="GRAVAR" style="background-color: #712cf9;" />
        </form>
        </div>
    </div>
</html>
