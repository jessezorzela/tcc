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
    <div class="card p-5 text-bg-light shadow-lg" style="margin-top: 50px;">
        <form action="adicionar.php" method="POST">
        <h3 class="display-4 fw-bold lh-1 mb-3">Cadastro</h3>

                <label class="form-label">Foto (Apenas fotos de ate 200kb)</label>
                <input type="file" name="txtFoto" class="form-control">

                <label class="form-label">Nome Completo</label>
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
                <div class="col-md-3">
                <label class="form-label">Sexo</label>
                <select name="sexo" class="form-control">
                <option>Selecione</option>
                <option value="feminino">Feminino</option>
                <option value="masculino">Masculino</option>
                <option value="outro">Outro</option>
                </select>
                </div>
                <div class="col-md-3">
                <label class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control">
                </div>
                <div class="col-md-3">
                <label class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control">
                </div>
                </div>

                <label class="form-label">Endereço</label>
                <input type="text" name="endereço" class="form-control">

<label class="form-label">Curso</label>
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
<br>
<br>
                <input name="bt" class="form-control text-white rounded-5" type="submit" value="GRAVAR" style="background-color: #712cf9;" />
        </form>
        </div>
    </div>
</html>