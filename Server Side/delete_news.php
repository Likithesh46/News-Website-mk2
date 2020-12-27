<?php
	$db = new mysqli('localhost','root','','news');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./style.css">
	<title>Delete News</title>
</head>
<body style="background-color:black;"> 
<style>
	body
{
  align-items: center;
  text-align:center;
 
}
</style>


<img src="logo.png" width="200" height="130">
	<h2 style="color: #ffcc03; font-size: 80px">Delete News</h2>
	<?php
		$sql = "Select news_id, news_title from add_news";
		$result = $db->query($sql);
	?>
	<form action="" method="POST">
		<select name = "news_id" id = "news_id">
			<option value = "selected">Select News Article to be deleted</option>
	<?php
		while($row = $result->fetch_assoc()){ ?>
			<option value = "<?php echo $row['news_id'] ?> "><?php echo $row['news_id'] ?>            <?php echo $row['news_title'] ?></option>
	<?php }	?>
		</select>
		<input type="submit" name="submit" value="Delete article">
	</form>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$NEWS_ID = $_POST['news_id'];
		$sql = "Delete from add_news where news_id = '$NEWS_ID'";
		$db->query($sql);
		if($db->affected_rows>0){
			echo "<script type='text/javascript'>alert('Successful deletion.');
			window.location='admin.htm';
			echo </script>";
		}
	}
?>	
</body>
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>