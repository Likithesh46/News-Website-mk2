<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Crisp</title>
</head>

<body>
<div class="main">
     <div class="logo">
       <img src="image1.jpeg">
     </div>
<div class="title">
      <h1>risp</h1>
    </div>
<div class="button1">
	<a href="login1.htm" class="btn">Subscribe</a>
</div> 


<style>


ul {
  float: left;
  list-style-type: none;
  margin-top: 155px;
}

ul li{
  display: inline-block;
}

ul li a{
  text-decoration: none;
  color: #00FF00;
  padding: 5px 20px;
  border: 1px solid transparent;
  transition: 0.6s ease;
  font-family: "montserrat";
}

ul li a:hover{
  background-color: #FFA500;
  color: #00FFFF;
}

ul li.active a{
  background-color: #FFA500;
  color: #FFA500;
}

*{
  margin: 0;
  padding: 0;
  font-family: Century Gothic;
}

.logo img{
  float: left;
  width: 150px;
  height: auto;
  top: 45%;
  left: 10%;
}

.title{
  position: absolute;
  top: 7%;
  left: 13%;
  transform: translate(-15%,-15%);
}

.title h1{
  color: #B22222;
  font-size: 90px;
}

.button{
  position: absolute;
  top: 4%;
  right: 12%;
  transform: translate(-15%,-15%);
}

.button1{
  position: absolute;
  top: 4%;
  right: 3%;
  transform: translate(-15%,-15%);
}

.btn{
	border: 1px solid #000;
	padding: 10px 20px;
	color: #F4A460;
	text-decoration: none;
}

.btn:hover{
   background-color: #FFE4E1;
   color: #B22222;
}

li {
  float: left;
}

li a {
  display: block;
  color: #FFA500;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-family: "montserrat";
}

li a:hover:not(.active) {
  background-color: #FFA500;
}

li a.active {
  color: white;
  background-color: #FFA500;
}

p{
  top:50%;
  text-align:justify;
  padding:15px 20px;
}

</style>

<body>
<ul>
  <li><a href="Crisp.php">Home</a></li>
  <li><a href="National.php">National</a></li>
  <li><a href="Entertainment.php">Entertainment</a></li>
  <li><a href="Business.php">Business</a></li>
  <li><a href="Science.php">Science</a></li>
  <li><a href="Sports.php">Sports</a></li>
  <li><a href="Technology.php">Technology</a></li>  
  <li><a href="World.php">World</a></li>
</ul>

<br>
      </br>
        <?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'news');
session_start();
$sqlQuery = "SELECT n.news_title, m.data, n.news_description, n.date_of_publish FROM add_news n, add_media m, top_reads t where t.news_id=n.news_id and n.media_id=m.id order by n.news_id desc";
$rs = $conn->query($sqlQuery);
if(is_null($rs) )
{
    echo "No news available.";
}
else {
?><br>
  
</br>
    <table border="1">
    <tr><th>News Headlines</th><th>Media</th><th>Description</th><th>Date of Publish</th></tr>
    <?php
   while($row = mysqli_fetch_array($rs))
        { ?>
            
    <tr>
        <td width="20%"><?php echo"{$row['news_title']}"?></td>
    
        <td width="30%"><?php echo '<img src="data:image/jpg;base64,'.base64_encode( ($row['data']) ).'"style="max-width:100%;""/>'; ?> </td>
        <td><?php echo "{$row['news_description']}" ?></td>
        <td width="4%"><?php echo date('d-m-Y', strtotime($row['date_of_publish'])); ?></td>
    </tr>
    <?php
  } ?>
    <?php
  } ?>


  </table>
</body>

</html>
