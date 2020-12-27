<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./style.css">
   <title>News and Media</title>

<style>
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
.btn-secondary{
     background-color: #ffcc03 !important;
}
.button1 {
  font-size: 20px;
   margin-right:20px;
border-radius: 12px;
 border: 2px solid white;
}
.button:hover {
  background-color: #ffcc03;
  color: white;
}
.card{
  margin: 5% 0%;
}

.card-body{
  margin: 0% 0% 0% 3%;
  padding: 6% 0%;
}
.para{
    color: white;
  
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
                <li class="nav-item active"><a class="nav-link " href="crisp.php"><span class="fa fa-home fa-lg" style= "color:#ffcc03";></span> Home</a></li>
                <li class="nav-item"><a class="nav-link " href="./aboutus.html"><span class="fa fa-info fa-lg " style= "color:#ffcc03";></span> About</a></li>
                <li class="nav-item"><a class="nav-link " href="./contact.html"><span class="fa fa-address-card fa-lg" style= "color:#ffcc03";></span> Contact</a></li>
            </ul>
            
            <span >
                       <a href="login1.htm" ><button type="button" class="btn btn-warning button1">Subscribe</button></a>

            </span>
          
         </div>
        </div>

    </nav>
<img src="logo.png" width="200" height="130">

  
<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'news');
session_start();
$ss = 'CALL generate_bill()';
mysqli_query($conn,$ss);
$stmt = ("SELECT Email_Id, Edition, Period, Price FROM add_subscriber  where user_id='".$_SESSION['uid']."'");
$rs = mysqli_query($conn,$stmt);
if(is_null($rs) )
{
    echo "No subscriptions available.";
}
else {
?>
    <table border="4" style="color:white"; >
    <tr style="color:#ffcc03 ";><th >Email ID</th><th>Edition</th><th>Period</th><th>Price</th></tr>
    <?php
   while($row = mysqli_fetch_array($rs))
        { ?>

    <tr>
        <td><?php echo"{$row['Email_Id']}"?></td>
        <td><?php echo"{$row['Edition']}"?></td>    
        <td><?php echo"{$row['Period']}"?></td>
        <td><?php echo"{$row['Price']}"?></td>
    </tr>
    <?php
  } ?>
    <?php
  } ?>


  </table>

<br></br>
<div class="clearfix">
  <button type="submit" class="returnbtn"><a  href="crisp.php"   style="color:black ";>Click here to exit to Home Page</button>
</div>
</body>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>