<!DOCTYPE html>
<html>
<head>
<html lang="en" dir="ltr">
<meta charset="UTF-8">
<meta name="viewport" content="wIdth=device-wIdth, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <title>Sky News Technology</title>
<style>



  .card{
  margin: 5% 0%;
  margin-left: 50px;
  margin-right: 50px;
  border-radius: 50px;
  border-width: 15px;
  border-color: #ffcc03;
}







  .nav-item {
    padding: 0px 0px 0px 20px;
}
.navbar{
  float: right;

}

.nav-item{
  margin: 10px;
  padding-right: 30px;
  font-size: 20px;

}




p{
  top:50%;
  text-align:justify;
  padding:15px 20px;
}

</style>





</head>

<body style="background-color:black;">

 <nav class="navbar navbar-dark navbar-expand-sm navbar-fixed-top ">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="Navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link " href="Home.php"><span class="fa fa-home fa-lg" style= "color:#ffcc03";></span> Home</a></li>
                <li class="nav-item"><a class="nav-link " href="About_Us.php"><span class="fa fa-info fa-lg " style= "color:#ffcc03";></span> About Us</a></li>
                <li class="nav-item"><a class="nav-link " href="Contact_Us.php"><span class="fa fa-address-card fa-lg" style= "color:#ffcc03";></span> Contact Us</a></li>
            </ul>
       
          
         </div>
        </div>

    </nav>
<img src="logo.png" width="200" height="130">

 <nav class="navbar-genre navbar-dark navbar-expand-sm navbar-fixed-top ">
        <div class="container">
    
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link " href="National.php"><span style= "color:#ffcc03";></span>National</a></li>
                <li class="nav-item"><a class="nav-link " href="Entertainment.php"><span style= "color:#ffcc03";></span>Entertainment</a></li>
                <li class="nav-item"><a class="nav-link " href="Business.php"><span style= "color:#ffcc03";></span>Business</a></li>
                <li class="nav-item"><a class="nav-link " href="Science.php"><span style= "color:#ffcc03";></span>Science</a></li>
                <li class="nav-item"><a class="nav-link " href="Sports.php"><span style= "color:#ffcc03";></span>Sports</a></li>
                <li class="nav-item"><a class="nav-link " href="World.php"><span style= "color:#ffcc03";></span>World</a></li>
            </ul>
         </div>

    </nav>


        <?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'news');
session_start();
$sqlQuery = "SELECT n.news_title, m.data, n.news_description, n.date_of_publish FROM add_news n, add_media m where news_type_id=7 and n.media_id=m.id order by news_id desc";
$rs = $conn->query($sqlQuery);
if(is_null($rs) )
{
    echo "No news available.";
}
else {
?><br>
  
</br>
    
    <?php
   while($row = mysqli_fetch_array($rs))
        { ?>


          <div class="card mb-3">
 <?php  echo '<center><img src="data:image/jpg;base64,'.base64_encode( ($row['data']) ).'"style="max-width:40%;""/>'; ?> 
  <div class="card-body">
    <h5 class="card-title"><?php echo"{$row['news_title']}"?></h5>
    <p class="card-text"><?php echo"{$row['news_description']}"?></p>
    <p class="card-text"><small class="text-muted"><?php echo"{$row['date_of_publish']}"?></small></p>
  </div>
</div>

    <?php
  } ?>
    <?php
  } ?>


  </table>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>