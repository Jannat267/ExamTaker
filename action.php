<?php
	   session_start();
       require('functions.php');//attaching functions.php page
       $email = '';
       $pass = '';
       $log_id='';// taste
       
   if (isset($_POST["login"])) {
 
       $_SESSION['email']=$_POST['log_email'];
       $_SESSION['pass']=md5($_POST['log_pass']);
 
       $function->check_student($_SESSION['email'],$_SESSION['pass']);
       
   }
    
    
  ?>  
