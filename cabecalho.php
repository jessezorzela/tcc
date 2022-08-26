<?php
$email = $_SESSION['email'];
$direito = $_SESSION['direito'];
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
      <div class="card p-4 text-center sticky-top shadow-lg">
      <h6 class="card-header">PROFISSIONAL</h6>
        <img src="/tcc/gerafoto.php?id=<?php echo $id_profissional?>" class="img card-img-top" style="width:90px; height:90px">
        <h5 class="card-title"><?php echo $nome ?></h5>
        <p class="card-text"><?php echo $email;?><br></p>
        <br>
        <a class="btn text-white rounded-5" href="/tcc/folguista/perfil.php?id_profissional=<?php echo $id_profissional?>" style="background-color: #712cf9;">Perfil</a>
        <a class="btn text-white rounded-5" href="/tcc/empresa/empresa" style="background-color: #712cf9;">Empresas</a>
        <a class="btn text-white rounded-5" href="/tcc/vagas" style="background-color: #712cf9;">Ver Vagas</a>
        <?php
                      if ($direito=="1")  
                      {
                      ?>
                      <a class="btn text-white rounded-5" href="/tcc/curso" style="background-color: #712cf9;">Cursos</a>
                      <a class="btn text-white rounded-5" href="/tcc/profissao" style="background-color: #712cf9;">Profissões</a>
                      <a class="btn text-white rounded-5" href="/tcc/escolaridade" style="background-color: #712cf9;">Escolaridade</a>
                      <a class="btn text-white rounded-5" href="/tcc/experiencia" style="background-color: #712cf9;">Experiencia</a>
                      <?php
                      }
                    ?>
        <a class="btn text-white rounded-5" href="/tcc/logout" style="background-color: black;">Sair</a>
      </div>  
      <br>     
    </div>


    <div class="col-md-6">

