<?php
$email = $_SESSION['email'];
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
      <div class="card p-1 text-center sticky-top shadow-lg">
      <h6>RECRUTADOR</h6>
      <img src="/tcc/images/recrutador.png" alt="Avatar man">
        <h6><?php echo $nome ?></h6>
        <a class="btn text-white rounded-1" href="/tcc/recrutador/perfil.php?id_recrutador=<?php echo $id_recrutador?>" style="background-color: #4169E1;">Perfil</a>
        <a class="btn text-white rounded-1" href="/tcc/folguista" style="background-color: #4169E1;">Folguistas</a>
        <a class="btn text-white rounded-1" href="/tcc/empresa" style="background-color: #4169E1;">Adicionar Vaga</a>
        <a class="btn text-white rounded-1" href="/tcc/empresa/painel.php?id_recrutador=<?php echo $id_recrutador?>" style="background-color: #4169E1;">Painel de Empresas</a>
        <a class="btn text-white rounded-1" href="/tcc/painel/index.php?id_recrutador=<?php echo $id_recrutador?>" style="background-color: #4169E1;">Painel de Vagas</a>
        <a class="btn text-white rounded-1" href="/tcc/logout" style="background-color: black;">Sair</a>
      </div>  
      <br>     
    </div>


    <div class="col-md-6">