<?php
	//$EMail = $_POST['username'];
	$EMail = $_POST['email'];
	$Genre = $_POST['genre'];
	$Period = $_POST['period'];
	session_start();	

	$conn = new mysqli('localhost','root','','news');
	if($conn->connect_error)
	{ 
		die('Connection Failed : '.$conn->connect_error);
	}
	else
	{
		$stmt = $conn->prepare("insert into add_subscriber(User_Id, Email_Id, Edition, Period)
			values(?, ?, ?, ?)");
		$stmt->bind_param("issi",$_SESSION['uid'], $EMail, $Genre, $Period);
		$stmt->execute();
		//echo $_SESSION['uid'];
		$reg = "select * from add_subscriber where User_Id='".$_SESSION['uid']."' and Email_Id ='$EMail' and Edition='$Genre' and  Period='$Period' ";
		$_SESSION['sid']=$row['Subscribe_Id'];
		header("Location: display_bill.php");
		$stmt->close();
		$conn->close();
	}
?>