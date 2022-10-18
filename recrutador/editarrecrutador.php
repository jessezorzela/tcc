<?php
session_start();
if (!isset($_SESSION['id_recrutador']))
{
     header("Location: ../logout");
     exit;
}
include '../conexao.php';
include '../cabecalho1.php';

$con = getConexao();

$id_recrutador = $_GET['id_recrutador'];
// Cria o resultset
$rs = mysqli_query($con,"select * from usuarios where id_recrutador=$id_recrutador");

$row = mysqli_fetch_array($rs);
    $id_recrutador = $row['id_recrutador'];
    $nome = $row['nome'];
    $email = $row['email'];
?>
<body>
    <div class="container">
    <div class="card p-5 shadow-lg">
        <form action="editar.php" method="POST" enctype="multipart/form-data">
        <h3 class="display-7 fw-bold lh-1 mb-3">Editar Perfil</h3>
        <input type="hidden" name="id_recrutador" value="<?php echo $id_recrutador?>">

                <label class="form-label">Nome Completo</label>
                <input type="name" name="nome" class="form-control" placeholder="nome" value="<?php echo $nome?>">
                
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email?>">

                <label class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" aria-describedby="passwordHelpBlock">
<br>
                <input name="bt" class="form-control text-white rounded-5" type="submit" value="GRAVAR" style="background-color: #4169E1;" />
        </form>
        </div>
    </div>
</body>
</html>