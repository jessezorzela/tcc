<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Cadastro</title>
</head>
<?php

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
<body>
    <div class="container">
    <div class="card p-5 text-bg-light shadow-lg" style="margin-top: 50px;">
        <form action="editar.php" method="POST" enctype="multipart/form-data">
        <h3 class="display-4 fw-bold lh-1 mb-3">Cadastro</h3>
        <input type="hidden" name="id_recrutador" value="<?php echo $id_recrutador?>">
                <label class="form-label">Foto (Apenas fotos de ate 200kb)</label>
                <input type="file" name="txtFoto" class="form-control">

                <label class="form-label">Nome Completo</label>
                <input type="name" name="nome" class="form-control" placeholder="nome" value="<?php echo $nome?>">
                
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $email?>">
<br>
                <input name="bt" class="form-control text-white rounded-5" type="submit" value="GRAVAR" style="background-color: #712cf9;" />
        </form>
        </div>
    </div>
</body>
</html>