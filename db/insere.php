<?php
//a página de conexão é incluida
include_once("conecta.php"); 

//os dados do formulário são resgatados usando os nomes
$email = $_POST['email'];
$nome = $_POST['nome'];
$senha1 = $_POST['senha'];
$senha2 = $_POST['senha1'];

//conferência das senhas, caso elas sejam idênticas o código libera uma delas para ser registrada
if ($senha1 != $senha2) {
  header('location: /bomb.sp/erro-inclusao.html'); //abre a página de erro na senha
}

//os dados são inseridos no Banco de Dados
else {
  $sql = "insert into usuario(email,nome,senha) 
  values('$email','$nome','$senha1')";
  
  header('location: /bomb.sp/registro-incluido.html');
  if ($conn->query($sql) === TRUE) { 
    
    //caso os dados não sejam incluídos, essa mensagem será exibida na tela
  } else {
  echo "Erro na inclusão do registro: " . $conn->error;
  }
  
  //conexão com o banco de dados é encerrada
  mysqli_close($conn);
  };
 
?>
