<?php
session_start();
if (!isset($_SESSION['id_recrutador'])) {
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
require "../cabecalho1.php";
?>

<head>
     <title>Cadastro vaga</title>
</head>


<div class="card p-3 shadow-lg rounded-3">
     <form method="post" action="adicionar.php">
          <h3 class="text-center">CADASTRAR VAGA</h3>

          <p class="form-label">
               <select name="idrecrutador" style="visibility: hidden;">
                    <?php
                    $con = getconexao();

                    $id_recrutador = $_GET['id_recrutador'];

                    $rs = mysqli_query($con, "select * from usuarios where id_recrutador=$id_recrutador");
                    while ($row = mysqli_fetch_array($rs)) {
                         $id_recrutador = $row['id_recrutador'];
                         $nome = $row['nome'];

                         echo "<option value=$id_recrutador>$nome</option>";
                    }
                    ?>
               </select>
          </p>
          <label for="exampleFormControlTextarea1" class="form-label">Titulo da vaga</label>
          <textarea name="nome" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>

          <label class="form-label">Empresa que disponibilizou a vaga</label>
          <select name="idempresa" class="form-control">
               <option>Selecione</option>
               <?php

               $con = getconexao();

               $rs = mysqli_query($con, "select * from empresa order by nomeemp");
               while ($row = mysqli_fetch_array($rs)) {
                    $id_empresa = $row['id_empresa'];
                    $nomeemp = $row['nomeemp'];

                    echo "<option value=$id_empresa>$nomeemp</option>";
               }
               ?>
          </select>


          <label class="form-label">Tipo de profissional que busca</label>
          <select name="idprofissao" class="form-control">
               <option>Selecione</option>
               <?php

               $con = getconexao();

               $rs = mysqli_query($con, "select * from profissao order by descricao");
               while ($row = mysqli_fetch_array($rs)) {
                    $id_profissao = $row['id_profissao'];
                    $descricao = $row['descricao'];

                    echo "<option value=$id_profissao>$descricao</option>";
               }
               ?>
          </select>
          <label for="exampleFormControlTextarea1" class="form-label">Detalhes sobre a vaga</label>
          <textarea name="descricaoo" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
          <br>
          <input name="bt" class="form-control text-white rounded-5" type="submit" value="POSTAR" style="background-color: #4169E1;" />
     </form>
</div>