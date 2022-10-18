<?php
session_start();
if (!isset($_SESSION['id_adm']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
require '../cabecalho2.php';
$pchave = "";
?>

<link rel="stylesheet" href="../css/1.css">
<div class="card p-3 border rounded-3 shadow-lg" style="background-color: #fff;">
  <div class="container-fluid">
    <h3 class="text-center">CURSOS</h3>
    <form method="post" action="index.php">
      <form class="form-inline">
        <div class="row">
          <div class="col-md-10">
            <input name="pchave" class="form-control mr-sm-2 rounded-4" type="search" aria-label="Search">
          </div>
          <br>
          <div class="col-md-2">
          <button name="bt" class="form-control text-white rounded-4" type="submit" style="background-color: #4169E1;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
          </div>
        </div>
      </form>
    </form>
  </div>
</div>
<br>

<div class="card p-3 border rounded-3 shadow-lg">
<div class="row">
<div class="col-md-12">
  <a class="btn text-white rounded-5" href="adicionarcurso.php" style="background-color: #4169E1;">Novo curso</a>
</div>
</div>
  <table class="table">
    <tr>
      <th>Descrição</th>
      <th>Deletar</th>
      <th>Editar</th>
    </tr>
    <?php

    $con = getConexao();

    if($_POST){$pchave = $_POST['pchave'];}

    if ($pchave == null) {
      $rs = mysqli_query($con, "select * from cursos order by descricao");
    } else {
      $rs = mysqli_query($con, "select * from cursos where descricao like '%$pchave%' order by descricao");
    }
    while ($row = mysqli_fetch_array($rs))
    {
      $id_curso = $row['id_curso'];
      $descricao = $row['descricao'];

      echo "<tr>   <td>$descricao</td> <td><a class='text-black' href='excluir.php?id_curso=$id_curso'>Excluir</a> </td> <td><a class='text-black' href='editarcurso.php?id_curso=$id_curso'>Editar</a> </td> </tr>";
    }
    ?>
  </table>
</div>
</div>
<br>
<?php require "../rodape.php"; ?>