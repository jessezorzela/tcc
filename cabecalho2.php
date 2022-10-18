<?php
$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$id_profissional = $_SESSION['id_adm'];
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
    <div class="row align-items-md-stretch">
        <div class="col-md-2">
            <div class="card p-3 border rounded-3 shadow-lg" style="background-color: #fff;">
                <h5><?php echo $nome ?></h5>
                <a class="btn text-white rounded-1" href="/tcc/profissao" style="background-color: #4169E1;">Profissões</a>
                <a class="btn text-white rounded-1" href="/tcc/curso" style="background-color: #4169E1;">Cursos</a>
                <a class="btn text-white rounded-1" href="/tcc/relatorio" style="background-color: #4169E1;">Relatorio</a>
                <a class="btn text-white rounded-1" href="/tcc/logout" style="background-color: black;">Sair</a>
            </div>
        </div>
        <div class="col-md-8">
            <script src="/tcc/js/bootstrap.bundle.min.js"></script>