<?php
   $db = mysqli_connect('localhost','root','');
   mysqli_select_db($db,'news');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pswd']); 
      $_SESSION['username']=$myusername;

      $sql = "SELECT * FROM add_user WHERE User_Name = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 1) {
         //$userid = "SELECT user_id FROM add_user WHERE User_Name = '$myusername'";
         //$r = $userid->toArray();
         //$row1 = mysqli_fetch_array($res);
         $_SESSION['uid']=$row['User_Id'];
         header("Location: subscribe.htm");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }
?>