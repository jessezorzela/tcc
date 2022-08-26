<?php
session_start();
if (!isset($_SESSION['id_usuario']))
{
     header("Location: logout.php");
     exit;
}
$email = $_SESSION['email'];
$direito = $_SESSION['direito'];
include '../conexao.php';
require '../cabecalho.php';
$pchave = "";
?>

<link rel="stylesheet" href="../css/1.css">
<div class="card p-3 border rounded-3">
  <div class="container-fluid  ">
    <h3 class="text-center">Profissões</h3>
    <form method="post" action="index.php">
      <form class="form-inline">
        <div class="row">
          <div class="col-md-12">
            <input name="pchave" class="form-control mr-sm-2 rounded-5" type="search" aria-label="Search">
          </div>
          <br><br>
          <div class="col-md-12">
            <input name="bt" class="form-control text-white rounded-5" type="submit" value="Buscar" style="background-color: #712cf9;" />
          </div>
        </div>
      </form>
    </form>
  </div>
</div>
<br>

<div class="card p-3 border rounded-3">
<div class="row">
<div class="col-md-12">
  <a class="btn text-white rounded-5" href="adicionarprofissao.php" style="background-color: #712cf9;">Nova Profissão</a>
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
      $rs = mysqli_query($con, "select * from profissao order by descricao");
    } else {
      $rs = mysqli_query($con, "select * from profissao where descricao like '%$pchave%' order by descricao");
    }
    while ($row = mysqli_fetch_array($rs))
    {
      $id_profissao = $row['id_profissao'];
      $descricao = $row['descricao'];

      echo "<tr>   <td>$descricao</td> <td><a class='text-black' href='excluir.php?id_profissao=$id_profissao'>Excluir</a> </td> <td><a class='text-black' href='editarprofissao.php?id_profissao=$id_profissao'>Editar</a> </td> </tr>";
    }
    ?>
  </table>
</div>
</div>
<br>
<?php require "../rodape.php"; ?>