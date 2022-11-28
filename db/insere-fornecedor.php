<?php
//a página de conexão é incluida
include_once("conecta.php"); 

//os dados do formulário são resgatados usando os nomes
$email = $_POST['email'];
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];

  $sql = "insert into fornecedor(nome , tel , cnpj , email , endereco)";
  $sql = $sql . " values('$nome','$telefone','$cnpj','$email','$endereco')";
  
  //echo $sql;

  if ($conn->query($sql) === TRUE) { 
    header('location: /bomb.sp/registro-realizado.html');
    //caso os dados não sejam incluídos, essa mensagem será exibida na tela
  } else {
  echo "Erro na inclusão do registro: " . $conn->error;
  }
  
  //conexão com o banco de dados é encerrada
  mysqli_close($conn);
 
?>