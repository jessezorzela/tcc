<?php
session_start();
if (!isset($_SESSION['id_profissional']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
include '../cabecalho.php';

$con = getConexao();

$id_profissional = $_GET['id_profissional'];
// Cria o resultset
$rs = mysqli_query($con,"select * from profissional where id_profissional=$id_profissional");

$row = mysqli_fetch_array($rs);
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
    $edu = $row['edu'];
    $infcurso = $row['infcurso'];
    $curso = $row['curso'];
    $expe = $row['expe'];
?>

    <div class="card p-5 text-bg-light shadow-lg">
        <form action="editar.php" method="POST" enctype="multipart/form-data">
        <h3 class="display-4 fw-bold lh-1 mb-3">Perfil</h3>
        <input type="hidden" name="id_profissional" value="<?php echo $id_profissional?>">

                <label class="form-label">Nome Completo</label>
                <input type="name" name="nome" class="form-control" placeholder="nome" value="<?php echo $nome?>">
                
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com" value="<?php echo $email?>">
    
                <label class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" aria-describedby="passwordHelpBlock">
                
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
                <div class="col-md-4">
                <label class="form-label">Sexo</label>
                <select name="sexo" class="form-control" value="<?php echo $sexo?>" >
                <option>Selecione</option>
                <option value="feminino" <?php if($sexo == 'feminino'){ echo 'selected = "select"'; }?>>Feminino</option>
                <option value="masculino"  <?php if($sexo == 'masculino'){ echo 'selected = "select"'; }?>>Masculino</option>
                <option value="outro" <?php if($sexo == 'outro'){ echo 'selected = "select"'; }?>>Outro</option>
                </select>
                </div>
                <div class="col-md-4">
                <label class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" value="<?php echo $cidade?>">
                </div>
                <div class="col-md-4">
                <label class="form-label">Estado</label>
        <select name="estado" class="form-control">
        <option>Selecione</option>
        <option value="AC" <?php if($estado == 'AC'){ echo 'selected = "select"'; }?>>AC</option>
        <option value="AL" <?php if($estado == 'AL'){ echo 'selected = "select"'; }?>>AL</option>
        <option value="AP" <?php if($estado == 'AP'){ echo 'selected = "select"'; }?>>AP</option>
        <option value="AM" <?php if($estado == 'AM'){ echo 'selected = "select"'; }?>>AM</option>
        <option value="BA" <?php if($estado == 'BA'){ echo 'selected = "select"'; }?>>BA</option>
        <option value="CE" <?php if($estado == 'CE'){ echo 'selected = "select"'; }?>>CE</option>
        <option value="ES" <?php if($estado == 'ES'){ echo 'selected = "select"'; }?>>ES</option>
        <option value="DF" <?php if($estado == 'DF'){ echo 'selected = "select"'; }?>>DF</option>
        <option value="MA" <?php if($estado == 'MA'){ echo 'selected = "select"'; }?>>MA</option>
        <option value="MT" <?php if($estado == 'MT'){ echo 'selected = "select"'; }?>>MT</option>
        <option value="MS" <?php if($estado == 'MS'){ echo 'selected = "select"'; }?>>MS</option>
        <option value="MG" <?php if($estado == 'MG'){ echo 'selected = "select"'; }?>>MG</option>
        <option value="PA" <?php if($estado == 'PA'){ echo 'selected = "select"'; }?>>PA</option>
        <option value="PB" <?php if($estado == 'PB'){ echo 'selected = "select"'; }?>>PB</option>
        <option value="PR" <?php if($estado == 'PR'){ echo 'selected = "select"'; }?>>PR</option>
        <option value="PE" <?php if($estado == 'PE'){ echo 'selected = "select"'; }?>>PE</option>
        <option value="PI" <?php if($estado == 'PI'){ echo 'selected = "select"'; }?>>PI</option>
        <option value="RJ" <?php if($estado == 'RJ'){ echo 'selected = "select"'; }?>>RJ</option>
        <option value="RN" <?php if($estado == 'RN'){ echo 'selected = "select"'; }?>>RN</option>
        <option value="RS" <?php if($estado == 'RS'){ echo 'selected = "select"'; }?>>RS</option>
        <option value="RO" <?php if($estado == 'RO'){ echo 'selected = "select"'; }?>>RO</option>
        <option value="RR" <?php if($estado == 'RR'){ echo 'selected = "select"'; }?>>RR</option>
        <option value="SC" <?php if($estado == 'SC'){ echo 'selected = "select"'; }?>>SC</option>
        <option value="SP" <?php if($estado == 'SP'){ echo 'selected = "select"'; }?>>SP</option>
        <option value="SE" <?php if($estado == 'SE'){ echo 'selected = "select"'; }?>>SE</option>
        <option value="TO" <?php if($estado == 'TO'){ echo 'selected = "select"'; }?>>TO</option>
        </select>
                </div>
                </div>
                <label class="form-label">Endereço</label>
                <input type="text" name="endereço" class="form-control" value="<?php echo $endereço?>">

            <h3 class="display-7 fw-bold lh-1 mb-3 text-center">Educação</h3>
            <label class="form-label">Nivel de escolaridade</label>
                <select name="edu" class="form-control">
                <option>Selecione</option>
                <option value="Ensino Fundamental" <?php if($edu == 'Ensino Fundamental'){ echo 'selected = "select"'; }?>>Ensino Fundamental</option>
                <option value="Ensino Medio Incompleto" <?php if($edu == 'Ensino Medio Incompleto'){ echo 'selected = "select"'; }?>>Ensino Medio Incompleto</option>
                <option value="Ensino Medio Cursando" <?php if($edu == 'Ensino Medio Cursando'){ echo 'selected = "select"'; }?>>Ensino Medio Cursando</option>
                <option value="Ensino Medio Completo" <?php if($edu == 'Ensino Medio Completo'){ echo 'selected = "select"'; }?>>Ensino Medio Completo</option>
                <option value="Ensino Superior Incompleto" <?php if($edu == 'Ensino Superior Incompleto'){ echo 'selected = "select"'; }?>>Ensino Superior Incompleto</option>
                <option value="Ensino Superior Cursando" <?php if($edu == 'Ensino Superior Cursando'){ echo 'selected = "select"'; }?>>Ensino Superior Cursando</option>
                <option value="Ensino Supeior Completo" <?php if($edu == 'Ensino Supeior Completo'){ echo 'selected = "select"'; }?>>Ensino Supeior Completo</option>
                </select>
                
                <label class="form-label">Ensino superior em:</label>
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
<label  class="form-label">Informações sobre sua(s) formação(ões)</label>
<input name="infcurso" class="form-control" value="<?php echo $infcurso?>">
<br>
<h3 class="display-7 fw-bold lh-1 mb-3 text-center">Curso</h3>
<label class="form-label">Informações do(s) curso(s) realizado(s)</label>
<input name="curso" class="form-control" value="<?php echo $curso?>">
<br>
<h3 class="display-7 fw-bold lh-1 mb-3 text-center">Experiencia Profissional</h3>
<label  class="form-label">Informações da(s) sua(s) experiencia(s)</label>
<input name="expe" class="form-control" value="<?php echo $expe?>">
<br>
                <input name="bt" class="form-control text-white rounded-5" type="submit" value="GRAVAR" style="background-color: #4169E1;" />
        </form>
        </div>
    </div>
</html>
