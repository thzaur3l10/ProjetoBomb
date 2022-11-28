<html>
  <head></head>
  
  <body>
       <div class="cabecalho">
	  
      <?php include_once("menu.php"); ?>
	  
     </div>
	 <div class="corpo">
       <center>
	   <h3>Recuperar Senha</h3><br> 
	   
	   <?php 	  
	   //session_start();
       //echo $_SESSION['TST'];
	   ?>
	   
       <form action="criaremail.php" method="post">

          <label>E-mail : </label>
	      <input type="email" name="email" maxlength="30"><br><br>	
          
	      <input type="submit" name="gravar" value="&nbsp&nbsp&nbsp Enviar &nbsp&nbsp&nbsp" >
       </form>
	   </center>
	</div>
  </body>
<html>