<?php
session_start();
  include_once("conn.php");
  
  $email = $_POST['email'];


	  $sql = "SELECT id, count(*) as qtde from usuario where Email = '" . $email . "'";
      $result = mysqli_query($conn, $sql);
      $recover = mysqli_fetch_all($result, MYSQLI_ASSOC);
	  
	  mysqli_free_result($result);
	  if (!empty($recover)){
		  
	     foreach($recover as $recovera){
		 If ($recovera["qtde"] > 0 ){  	 
		     $Tico = $recovera["id"];
	         //$Teco = $recovera["Codigo"];
		     
	   	     $_SESSION['email']=$email;
		     $_SESSION['motivo']="Recuperar Senha"; 
		     $_SESSION['corpo']="Clique no link a seguir ou copie-o e cole no seu browser: localhost/compras/recover.php?tico=" . $Tico ;
		     header("Location: ../sendmail.php");
		 } else{
		  
		  $_SESSION['msg']="<p style='color:red;'>E-mail não encontrado, verifique os dados informados.";
		  $_SESSION['email']=$email;
		  echo "<p style='color:red;'>E-mail não encontrado, verifique os dados informados.";
		  //header("Location: ../login.php");
  	     }
        }
      }

?>