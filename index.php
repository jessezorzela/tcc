<?php
require "conexao.php";

?>

<!DOCTYPE html>
<head>
<title>Buscar Folguistas</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="css/escolha.css">
<style type="text/css">
	p{
		color: white;
    }
    h2{
        color:black;
    }
    .button {
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #000000;
  background-color: #FFD700;
  border: none;
  border-radius: 15px;
  box-shadow: 0 7px #000000;
}

.button:hover {background-color: #FFFF00}

.button:active {
  background-color: #FFFF00;
  box-shadow: 0 5px #000000;
  transform: translateY(4px);
}
</style>
</head>
<body>
  <div class="container">
  <div class="row p-4 align-items-center justify-content-center">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="card text-center text-bg-light shadow-lg" style="margin-top: 90px;">
            <h5 class="display-6 fw-bold lh-1 mb-3">ESCOLHA</h5>
    <div class="col-md-2"></div>
    <div class="row">
    
    <div class="col p-3  rounded-4" id="esquerda">
            <label class="form-label text-white"><h1>FOLGUISTA</h1></label>
            <p>ESTÁ BUSCANDO EMPREGO</p>  
            <img src="images/folguista.png" alt="Avatar man"><br><br>
            <div class="row">     
            <div class="col-md-12">
            <br>
            <p><a class="button btn btn-warning rounded-3" href="/tcc/folguista/login/" role="button">LOGAR</a></p>
            </div>
            <div class="col-md-12">
            <p><a class="button btn btn-warning rounded-3" href="/tcc/folguista/cadastro.php" role="button">CADASTRAR</a></p>
            </div>
            </div>  
    </div>    
    <div class="col p-3  rounded-4" id="direita">
            <label class="form-label text-white"><h1>RECRUTADOR</h1></label>
            <p>ESTÁ BUSCANDO PROFISSIONAIS</p>
            <img src="images/recrutador.png" alt="Avatar man"><br><br>
            <div class="row">
            <div class="col-md-12">
            <br>
            <p><a class="button btn btn-warning rounded-3" href="/tcc/recrutador/login/" role="button">LOGAR</a></p>
            </div>
            <div class="col-md-12">
            <p><a class="button btn btn-warning rounded-3" href="/tcc/recrutador/cadastro.php" role="button">CADASTRAR</a></p>
            </div>
            </div>  
    </div>
    </div>
    <div class="col-md-2"></div>
    </div>
    </div>
    <div class="col-md-2"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>