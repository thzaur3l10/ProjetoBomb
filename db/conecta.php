<?php
//o código faz a conexão com o banco de dados
  $conn = mysqli_connect('localhost:3306','root','','bomb');

  //o código testa a conexão e caso ela seja mal sucedida ele imprime na tela a mensagem de erro
  if(!$conn){
     echo "Connection error: " . mysqli_connect_error();
  }
?>