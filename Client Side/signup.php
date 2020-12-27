<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'news');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
$User_Name = $_POST['username'];
$Email_Id = $_POST['email'];
$Password = $_POST['psw'];
$Date_Of_Birth = $_POST['dateofbirth'];

$s = "SELECT * FROM Add_User WHERE User_Name = '$User_Name'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num >= 1){
echo "User name is already taken";
//header("location: as1.php");
}
else{
	$reg = "insert into Add_User(User_Name, Email_Id, Password, Date_Of_Birth) values('$User_Name', '$Email_Id', '$Password', '$Date_Of_Birth')";
	mysqli_query($conn,$reg);
	echo "<script type='text/javascript'>alert('Welcome to Sky News.');
	window.location='login1.htm';
	echo </script>";
}
}
?>