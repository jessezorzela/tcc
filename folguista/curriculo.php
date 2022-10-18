<?php
include '../conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Cadastro | Folguista</title>
</head>
<body>
    <div class="container">
        <form action="adicionar.php" method="POST" >
        <div class="card p-5 text-bg-dark shadow-lg">
        <h3 class="display-5 fw-bold lh-1 mb-3 text-center">Cadastro | Curriculo</h3>
        <br>
        <h3 class="display-7 fw-bold lh-1 mb-3 text-center">Dados Pessoais</h3>

                <label class="form-label">Nome completo</label>
                <input type="name" name="nome" class="form-control" placeholder="nome">
                
                <div class="row">
                <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com">
                </div>
                <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Senha</label>
                <input type="password" name="senha" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                <label class="form-label">Telefone</label>
                <input type="tel" name="telefone" class="form-control">
                </div>
                <div class="col-md-4">
                <label class="form-label">Celular</label>
                <input type="tel" name="celular" class="form-control">
                </div>
                <div class="col-md-4">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nasc" class="form-control">
                </div>
                </div>

                <div class="row">
                <div class="col-md-4">
                <label class="form-label">Sexo</label>
                <select name="sexo" class="form-control">
                <option>Selecione</option>
                <option value="feminino">Feminino</option>
                <option value="masculino">Masculino</option>
                <option value="outro">Outro</option>
                </select>
                </div>
                <div class="col-md-4">
                <label class="form-label">Estado</label>
        <select name="estado" class="form-control">
        <option>Selecione...</option>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="ES">ES</option>
        <option value="DF">DF</option>
        <option value="MA">MA</option>
        <option value="MT">MT</option>
        <option value="MS">MS</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
        </select>
                </div>
                <div class="col-md-4">
                <label class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control">
                </div>
                </div>

                <label class="form-label">Endereço</label>
                <input type="text" name="endereço" class="form-control">
                
            <br>
            <h3 class="display-7 fw-bold lh-1 mb-3 text-center">Educação</h3>
            <label class="form-label">Nivel de escolaridade</label>
                <select name="edu" class="form-control">
                <option>Selecione</option>
                <option value="Ensino Fundamental">Ensino Fundamental</option>
                <option value="Ensino Medio Incompleto">Ensino Medio Incompleto</option>
                <option value="Ensino Medio Cursando">Ensino Medio Cursando</option>
                <option value="Ensino Medio Completo">Ensino Medio Completo</option>
                <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                <option value="Ensino Superior Cursando">Ensino Superior Cursando</option>
                <option value="Ensino Supeior Completo">Ensino Supeior Completo</option>
                </select>
                
                <label class="form-label">Ensino superior em:</label>
                <select name="idcurso" class="form-control">

<?php

$con = getconexao();

$rs = mysqli_query($con,"select * from cursos order by descricao");
while ($row = mysqli_fetch_array($rs))
{
   $id_curso = $row['id_curso'];
   $descricao = $row['descricao'];

   echo "<option value=$id_curso>$descricao</option>";   
}
?>
                </select>
                <label for="exampleFormControlTextarea1" class="form-label">Informações sobre sua(s) formação(ões)</label>
                    <textarea name="infcurso" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                    <br>
                    <h3 class="display-7 fw-bold lh-1 mb-3 text-center">Curso</h3>
                <label for="exampleFormControlTextarea1" class="form-label">Informações do(s) curso(s) realizado(s)</label>
                    <textarea name="curso" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <br>
                    <h3 class="display-7 fw-bold lh-1 mb-3 text-center">Experiencia</h3>
                <label for="exampleFormControlTextarea1" class="form-label">Informações da(s) sua(s) experiencia(s)</label>
                    <textarea name="expe" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
<br>
<br>
            </div>
                <input name="bt" class="form-control text-white rounded-1" type="submit" value="OK" style="background-color: #712cf9;" />
        </form>
        
    </div>
</html>