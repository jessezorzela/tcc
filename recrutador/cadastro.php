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
    <title>Cadastro | Recrutador </title>
</head>
<body>
    <div class="container">
    <div class="card p-5 text-bg-light shadow-lg" style="margin-top: 50px;">
        <form action="adicionar.php" method="POST">
        <h3 class="display-4 fw-bold lh-1 mb-3">Cadastro</h3>

                <label class="form-label">Nome Completo</label>
                <input type="name" name="nome" class="form-control">
                
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
 
                <label class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" aria-describedby="passwordHelpBlock">
<br>
                <input name="bt" class="form-control text-white rounded-5" type="submit" value="GRAVAR" style="background-color: #712cf9;" />
        </form>
        </div>
    </div>
</body>
</html>