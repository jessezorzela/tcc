<?php
function getConexao()
{
      $con = mysqli_connect("localhost", "root", "", "mydb") or die ("Erro na conexao mysqli"); 
      mysqli_set_charset($con,"utf8");
      return $con;
}
?>