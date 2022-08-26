<?php
$email = $_SESSION['email'];
$direito = $_SESSION['direito'];
$nome= $_SESSION['nome'];
$id_recrutador= $_SESSION['id_recrutador'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/tcc/css/1.css">
    <title>Recrutador</title>
</head>
<body>
    <div class="container">
    <div class="row align-items-md-stretch" style="margin-top:40px; ">
    <div class="col-md-1"></div>
    <div class="col-md-2">
      <div class="card p-3 text-center sticky-top shadow-lg">
      <h6 class="card-header">RECRUTADOR</h6>
        <img src="/tcc/gerafoto1.php?id=<?php echo $id_recrutador?>" class="img card-img-top" style="width:95px; height:95px">
        <h5 class="card-title"><?php echo $nome ?></h5>
        <a class="btn text-white rounded-5" href="/tcc/recrutador/perfil.php?id_recrutador=<?php echo $id_recrutador?>" style="background-color: #712cf9;">Perfil</a>
        <a class="btn text-white rounded-5" href="/tcc/folguista" style="background-color: #712cf9;">Folguistas</a>
        <a class="btn text-white rounded-5" href="/tcc/empresa" style="background-color: #712cf9;">Empresas</a>
        <a class="btn text-white rounded-5" href="/tcc/logout" style="background-color: black;">Sair</a>
      </div>  
      <br>     
    </div>


    <div class="col-md-6">