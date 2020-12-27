<?php
	$News_Title = $_POST['News_Title'];
	$News_Type_Id = $_POST['News_Type_Id'];
	//$Sub_News_Type_Id = $_POST['Sub_News_Type_Id'];
	$News_Description = $_POST['News_Description'];
	$Media_Id = $_POST['Media_Id'];
	//echo $Date_Of_Publish = $_POST['Date_Of_Publish'];
	//$result = explode('-',$Date_Of_Publish);
	//$day = $result[0];
	//$month = $result[1];
	//$year = $result[2];
	//$newdate = $year.'-'.$day.'-'.$month;
	//$Date_Of_Publish1 = new Date("d-m-Y", strtotime($Date_Of_Publish));
	$Date_Of_Publish = date('Y-m-d');
	//$Date_Of_Publish1 = date("dd-M-Y", strtotime($_POST[Date_Of_Publish]));
	$News_Read_Count = $_POST['News_Read_Count'];
	$News_Publish_Count = $_POST['News_Publish_Count'];

	$conn = new mysqli('localhost','root','','news');
	if($_SERVER["REQUEST_METHOD"] == "POST") {   
    	//$News_Type_Id = mysqli_real_escape_string($db,$_POST['News_Type_Id']);
    	//$Media_Id = mysqli_real_escape_string($db,$_POST['Media_Id']); 
      
    	$sql = "SELECT n.News_Type_Id, m.id FROM add_media m, add_news_type n WHERE n.News_Type_Id = '$News_Type_Id' and m.id = '$Media_Id'";
    	$result = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_array($result);
         
    	$count = mysqli_num_rows($result);
      
    	// If result matched $myusername and $mypassword, table row must be 1 row
		
    	if($count == 1)
		{
			$stmt = $conn->prepare("insert into Add_News( News_Title, News_Type_Id, News_Description, Media_Id, Date_Of_Publish, News_Read_Count, News_Publish_Count)
				values(?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sisisii",$News_Title, $News_Type_Id, $News_Description, $Media_Id, $Date_Of_Publish, $News_Read_Count, $News_Publish_Count);
			if($stmt->execute()){
				echo "<script type='text/javascript'>alert('New News added.');
				window.location='admin.htm';
				echo </script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Not inserted.');
				window.location='admin.htm';
				echo </script>";
			}
				$stmt->close();
		}
		else
		{
			//echo "<script type='text/javascript'>alert('Enter valid Media ID or News Type ID.');
			//window.location='admin.htm';
			//echo </script>";
		}
		$conn->close();
	}
?>