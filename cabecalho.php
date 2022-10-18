<?php
$email = $_SESSION['email'];
$nome= $_SESSION['nome'];
$id_profissional= $_SESSION['id_profissional'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/tcc/css/1.css">
    <title>Folguista</title>
</head>
<body>
    <div class="container">
    <div class="row align-items-md-stretch" style="margin-top:40px; ">
    <div class="col-md-1"></div>
    <div class="col-md-2">
      <div class="card p-3 text-center sticky-top shadow-lg">
      <h6>PROFISSIONAL</h6>
      <img src="/tcc/images/folguista.png" alt="Avatar man">
      <h6><?php echo $nome ?></h6>
        <a class="btn text-white rounded-5" href="/tcc/folguista/perfil.php?id_profissional=<?php echo $id_profissional?>" style="background-color: #4169E1;">Perfil</a>
        <a class="btn text-white rounded-5" href="/tcc/empresa/empresa" style="background-color: #4169E1;">Empresas</a>
        <a class="btn text-white rounded-5" href="/tcc/vagas1" style="background-color: #4169E1;">Ver Vagas</a>    
        <a class="btn text-white rounded-5" href="/tcc/painel1/index.php?id_profissional=<?php echo $id_profissional?>" style="background-color: #4169E1;">Aplicações</a>               
        <a class="btn text-white rounded-5" href="/tcc/logout" style="background-color: black;">Sair</a>
      </div>     
    </div>
<br>

    <div class="col-md-6">

