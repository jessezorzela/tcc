<?php
session_start();
if (!isset($_SESSION['id_profissional'])) {
    header("Location: logout.php");
    exit;
}
include '../conexao.php';
include '../cabecalho.php';

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
    $id_recrutadorfk = $row['idrecrutador'];
    $idrecrutadorfk = $row['idrecrutador'];
    $id_profissaofk = $row['idprofissao'];
    $idprofissaofk = $row['idprofissao'];
    $id_empresafk = $row['idempresa'];
    $idempresafk = $row['idempresa'];
}
?>
<div class="col-md-12 align-self-center">
    <div class="card p-4 border rounded-3 shadow-lg">

        <div class="row">
            <div class="col-md-6 text-center">
                <label class="form-label"> <b>Postado </b><br><?php echo date('d/m/Y', strtotime($data_cri)) ?></label>
            </div>
            <div class="col-md-6 text-center">
            <p class="form-label"> <b>Status</b></br>
                    <label name="idstatus">
                        <?php
                        $con = getconexao();
                        $rsstatus = mysqli_query($con, "select * from status order by descricao");
                        while ($rowstatus = mysqli_fetch_array($rsstatus)) {
                            $id_status = $rowstatus['id_status'];
                            $des = $rowstatus['descricao'];
                            if ($id_status == $id_statusfk) {
                                echo "<option value='$id_status' selected='selected'>$des</option>";
                            } else {
                                echo "";
                            }
                        }
                        ?>
                    </label>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <p class="form-label"><?php echo $nome ?></p>
            </div>
            <div class="col-md-12 text-center">
                <p class="form-label"> <b>Empresa Responsavel Pela Vaga</b></br>
                    <label name="idempresa">
                        <?php
                        $con = getconexao();
                        $rsempresa = mysqli_query($con, "select * from empresa order by nomeemp");
                        while ($rowempresa = mysqli_fetch_array($rsempresa)) {
                            $id_empresa = $rowempresa['id_empresa'];
                            $des = $rowempresa['nomeemp'];
                            if ($id_empresa == $id_empresafk) {
                                echo "<option value='$id_empresa' selected='selected'>$des</option>";
                            } else {
                                echo "";
                            }
                        }
                        ?>
                    </label>
                </p>
            <div class="col-md-12 text-center">
                <p class="form-label"> <b>Recrutador</b></br>
                    <label name="idrecrutador">
                        <?php
                        $con = getconexao();
                        $rscurso = mysqli_query($con, "select * from usuarios order by nome");
                        while ($rowrecrutador = mysqli_fetch_array($rscurso)) {
                            $id_recrutador = $rowrecrutador['id_recrutador'];
                            $des = $rowrecrutador['nome'];
                            if ($id_recrutador == $id_recrutadorfk) {
                                echo "<option value='$id_recrutador' selected='selected'>$des</option>";
                            } else {
                                echo "";
                            }
                        }
                        ?>
                    </label>
                </p>
            </div>
            <div class="col-md-12 text-center">
                <p class="form-label"> Busca Profissionais Formados em
                    <label name="idprofissao">
                        <?php
                        $con = getconexao();
                        $rscurso = mysqli_query($con, "select * from cursos order by descricao");
                        while ($rowcurso = mysqli_fetch_array($rscurso)) {
                            $id_curso = $rowcurso['id_curso'];
                            $des = $rowcurso['descricao'];
                            if ($id_curso == $id_profissaofk) {
                                echo "<option value='$id_curso' selected='selected'>$des</option>";
                            } else {
                                echo "";
                            }
                        }
                        ?>
                    </label>
                </p>
            </div>
            <div class="col-md-12 ">
                <label class="form-label"> <b>Descrição</b></br><?php echo $descricaoo ?></label>
            </div>
            <div class="col-md-12 ">
                <form method="post" action="adicionar.php">
                    <select name="idvaga" style="visibility: hidden;">

                        <?php
                        $con = getconexao();

                        $rs = mysqli_query($con, "select * from vaga where id_vaga=$id_vaga");
                        while ($row = mysqli_fetch_array($rs)) {
                            $id_vaga = $row['id_vaga'];
                            $nome = $row['nome'];

                            echo "<option value=$id_vaga>$nome</option>";
                        }
                        ?>
                    </select>
            </div>
            <div class="col-md-12 ">
                    <select name="idprofissional" style="visibility: hidden;">

                        <?php
                        $con = getconexao();

                        $rs = mysqli_query($con, "select * from profissional where id_profissional=$id_profissional");
                        while ($row = mysqli_fetch_array($rs)) {
                            $id_profissional = $row['id_profissional'];
                            $nome = $row['nome'];

                            echo "<option value=$id_profissional>$nome</option>";
                        }
                        ?>
                    </select>
            </div>

            <input name="bt" class="form-control text-white rounded-5" type="submit" value="APLICAR" style="background-color: #4169E1;" />
            </form>
        </div>
    </div>
</div>