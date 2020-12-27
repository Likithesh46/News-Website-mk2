<?php
   $db = mysqli_connect('localhost','root','');
   mysqli_select_db($db,'news');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['usrname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['psw']); 
       $_SESSION['usrname']=$myusername;

      $sql = "SELECT * FROM admin_login WHERE Username = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['usrname']=$myusername;
         header("Location: admin.htm");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }
?>