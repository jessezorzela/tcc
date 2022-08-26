<?php
include '../../conexao.php';
?>
<!doctype html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href=".../css/2.css">
  <title>Login | Recrutador</title>
</head>

<body>
  <div class="container">
  <div class="row align-items-center justify-content-center">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="card p-5 text-center text-bg-light shadow-lg" style="margin-top: 150px;">
            <h2 class="display-4 fw-bold lh-1 mb-3">LOGIN</h2>
            <form class="text" action="../login/validalogin.php" method="post">
              <div class="form-group first">
                <label for="email"><h5>EMAIL</h5></label>
                <input name="email" type="text" class="form-control" id="email">
              </div>
              <br>
              <div class="form-group last mb-3">
                <label for="password"><h5>SENHA</h5></label>
                <input name="senha" type="password" class="form-control" id="password">
              </div>
             
              <br><br>
              <input name="bt" class="form-control text-white rounded-5" type="submit" value="LOGAR" style="background-color: #712cf9;" />
            </form>
            <br>
            <a class="btn text-white rounded-5" href="../../recrutador/cadastro.php" style="background-color: #712cf9; width:100%;">CADASTRAR-SE</a>
          </div>
        </div>
        <div class="col-md-2"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>