<?php
session_start();
if (!isset($_SESSION['id_adm']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
require '../cabecalho2.php';
?>

<link rel="stylesheet" href="../css/1.css">
<div class="card p-3 border rounded-3 shadow-lg" style="background-color: #fff;">
  <div class="container-fluid">
    <h3 class="text-center">RELATORIO DE APLICAÇÃO EM VAGAS</h3>
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
</div>
  <table class="table">
    <tr>
    <th>Data Aplicação</th>
    <th>Titulo da Vaga</th>
      <th>Nome Folguista</th>
      <th>Nome da Empresa</th>
      <th>Busca</th>
      <th>Excluir</th>
    </tr>
    <?php
    $pchave = "";
    if ($_POST) {$pchave = $_POST['pchave'];}
    // Estabelece a conexao com o banco de dados e o database
    $con = getConexao();
    //Buscador
    if ($_POST) {$pchave = $_POST['pchave'];}

    if ($pchave==null) {

      $rs = mysqli_query($con, "SELECT aplicar.id_aplicar,
      vaga.nome AS vaga,
      profissional.nome AS profissional,
      empresa.nomeemp AS empresa,
      profissao.descricao AS profissao,
      aplicar.data_aplicar
      FROM aplicar
      LEFT JOIN vaga on aplicar.idvaga=vaga.id_vaga
      LEFT JOIN empresa on vaga.idempresa=empresa.id_empresa
      LEFT JOIN profissional on aplicar.idprofissional = profissional.id_profissional
      LEFT JOIN profissao on vaga.idprofissao = profissao.id_profissao
      WHERE 1");
    } else {
      $rs = mysqli_query($con,
      
      "SELECT aplicar.id_aplicar,
      vaga.nome AS vaga,
      profissional.nome AS profissional,
      empresa.nomeemp AS empresa,
      profissao.descricao AS profissao,
      aplicar.data_aplicar
      FROM aplicar
      LEFT JOIN vaga on aplicar.idvaga=vaga.id_vaga
      LEFT JOIN empresa on vaga.idempresa=empresa.id_empresa
      LEFT JOIN profissional on aplicar.idprofissional = profissional.id_profissional
      LEFT JOIN profissao on vaga.idprofissao = profissao.id_profissao
      WHERE 
      (vaga.nome like '%$pchave%' or profissional.nome like '%$pchave%' or empresa.nomeemp like '%$pchave%' or profissao.descricao like '%$pchave%') order by aplicar.data_aplicar");
    }
    while ($row = mysqli_fetch_array($rs))
    {
      $id_aplicar = $row['id_aplicar'];
      $vaga = $row['vaga'];
      $profissional = $row['profissional'];
      $empresa = $row['empresa'];
      $profissao = $row['profissao'];
      $data_aplicar = $row['data_aplicar'];
      echo "<tr>  
      <td>". date('d/m/Y', strtotime($data_aplicar)) ."</td> 
       <td>$vaga</td> 
       <td>$profissional</td>
        <td>$empresa</td> 
        <td>$profissao</td>  
        <td><a class='text-black' href='excluir.php?id_aplicar=$id_aplicar'>Excluir</a> </td> </tr>";
    }
    ?>
  </table>
</div>
</div>
<br>
<?php require "../rodape.php"; ?>