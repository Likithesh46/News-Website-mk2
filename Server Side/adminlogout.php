<?php
session_start();
if(isset($_SESSION['usrname'])){
	session_destroy();
	echo "<script>location.href = 'adminlogin.htm'";
}
else
{
	echo "<script>location.href = 'adminlogin.htm'";
}
?>