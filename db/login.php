<?php

if (!isset($_SESSION)){
   session_start();
}   
   include_once("conecta.php");
   
   $email = $_POST['email'];
   $senha = $_POST['senha'];

      /* No select abaixo,se a senha e usuário conferirem, trago do usuario o Id, o nome, o tipo de usuario (Admin ou User "comun") e o count(*) que está recebendo o nome de valido, se o usuário e senha conferirem o valor será 1, se não conferirem, o valor será zero */
      $sql = "SELECT id_cli, Email, count(*) as valido FROM usuario where (Email = '$email') and Senha = '$senha'";
	  
      $result = mysqli_query($conn, $sql);
      $valido = mysqli_fetch_all($result, MYSQLI_ASSOC);
	  while ($row = mysqli_fetch_assoc($result)) {
         $valido[] = $row;
      }
	  //print_r($valido);
  
	  mysqli_free_result($result);
	  if (!empty($valido)){
		  
	     foreach($valido as $validou){
		  if ($validou["valido"] == 1){	                                              // se validou for igual a 1 e crio 5 variáveis como SESSION
		      $_SESSION['msg']="<p style='color:blue;'>Login efetuado com sucesso!";  // Crio a variável msg e atribuo uma mensagem a ela
		      $_SESSION["LOGADO"] = true;                                             // Crio a variável LOGADO e atribuo true a ela
              $_SESSION["ID_LOGADO"] = $validou["id"];                                // Crio a variável ID_LOGADO e atribuo o Id do usuário a ela   
			  $_SESSION["NOME_LOGADO"] = $validou["Nome"];                            // Crio a variável NOME_LOGADO e atribuo o nome do usuário a ela
			  $_SESSION["TIPO_USER"] = $validou["TipoUsuario"];                       // Crio a variável TIPO_USER e atribuo 1 "ADMIN" ou 2 "USER" a ela
		      header("Location: ../produtos.html");                                       // Chamo o formulário de Login
          }
		  else{                                                                      // se validou for igual a 0 e crio 2 variáveis como SESSION
			  $_SESSION["LOGADO"] = false;                                            // atribuo o valor false na variável LOGADO e uma mensagem na msg 
			  header("Location: ../login.html");   
		  }	  
		}
  	}
   
   ?>
   