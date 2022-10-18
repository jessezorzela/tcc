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
    <title>Editar Vaga</title>
</head>

<body>
    <div class="card p-3 shadow-lg rounded-3">
        <h3 class="text-center">Editar Vaga</h3>

        <?php

        $con = getConexao();

        $id_vaga = $_GET['id_vaga'];

        // Cria o resultset
        $rs = mysqli_query($con, "select * from vaga where id_vaga=$id_vaga");

        while ($row = mysqli_fetch_array($rs)) {
            $id_vaga = $row['id_vaga'];
            $nome = $row['nome'];
            $data_cri = $row['data_cri'];
            $descricaoo = $row['descricaoo'];
            $id_statusfk = $row['idstatus'];
            $idstatusfk = $row['idstatus'];
            $id_profissaofk = $row['idprofissao'];
            $idprofissaofk = $row['idprofissao'];
            $id_empresafk = $row['idempresa'];
            $idempresafk = $row['idempresa'];
        }

        ?>

        <form method="post" action="editar.php">
            <input type="hidden" name="id_vaga" value="<?php echo $id_vaga ?>">
            <div class="row">
                <div class="col-md-6 text-center">
                    <label class="form-label"> <b>Postado em:</b><br><?php echo date('d/m/Y', strtotime($data_cri)) ?></label>

                </div>
                <div class="col-md-6 text-center">
                    <label class="form-label"><b>Status</b><br></label>
                    <select name="idstatus" class="form-control text-center">
                <?php

                $con = getconexao();

                $rs = mysqli_query($con, "select * from status order by descricao");
                while ($row = mysqli_fetch_array($rs)) {
                    $id_status = $row['id_status'];
                    $descricao = $row['descricao'];

                    if ($id_status == $idstatusfk) {
                        echo "<option value='$id_status' selected='selected'>$descricao</option>";
                    } else {
                        echo "<option value='$id_status' data-id-emprsa-fk= \"$idstatusfk\">$descricao</option>";
                    }
                }
                ?>
            </select>
                </div>
            </div>

            <label class="form-label">Titulo da vaga</label>
            <input name="nome" class="form-control" value="<?php echo $nome ?>"></input>
            
            <label class="form-label">Detalhes sobre a vaga</label>
            <input name="descricaoo" class="form-control" value="<?php echo $descricaoo ?>"></input>
            
            <label class="form-label">Empresa que disponibilizou a vaga</label>
            <select name="idempresa" class="form-control">
                <option>Selecione</option>
                <?php

                $con = getconexao();

                $rs = mysqli_query($con, "select * from empresa order by nomeemp");
                while ($row = mysqli_fetch_array($rs)) {
                    $id_empresa = $row['id_empresa'];
                    $nomeemp = $row['nomeemp'];

                    if ($id_empresa == $id_empresafk) {
                        echo "<option value='$id_empresa' selected='selected'>$nomeemp</option>";
                    } else {
                        echo "<option value='$id_empresa' data-id-emprsa-fk= \"$id_empresafk\">$nomeemp</option>";
                    }
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

                    if ($id_profissao == $id_profissaofk) {
                        echo "<option value='$id_profissao' selected='selected'>$descricao</option>";
                    } else {
                        echo "<option value='$id_profissao' data-id-emprsa-fk= \"$id_profissaofk\">$descricao</option>";
                    }
                }
                ?>
            </select>

            
            <br>
            
            <input name="bt" class="form-control text-white rounded-5" type="submit" value="OK" style="background-color: #4169E1;" />

        </form>

    </div>
</body>