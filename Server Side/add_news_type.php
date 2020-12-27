<?php
	$News_Type_Id = $_POST['News_Type_Id'];
	//$Sub_News_Type_Id = $_POST['Sub_News_Type_Id'];
	$News_Type_Name = $_POST['News_Type_Name'];

	$conn = new mysqli('localhost','root','','news');
	if($conn->connect_error)
	{ 
		die('Connection Failed : '.$conn->connect_error);
	}
	else
	{
		$stmt = $conn->prepare("insert into Add_News_Type(News_Type_Id, News_Type_Name)
			values(?, ?)");
		$stmt->bind_param("is",$News_Type_Id, $News_Type_Name);
		$stmt->execute();
		echo "<script type='text/javascript'>alert('New News type created.');
		window.location='admin.htm';
		echo </script>";
		$stmt->close();
		$conn->close();
	}
?>