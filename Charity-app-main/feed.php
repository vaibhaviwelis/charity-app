<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php
$insert = false;
if(isset($_POST['others'])){
    // Set connection variables
    
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
  $others;
  $user;
    // Collect post variables

    $others = $_POST['others'];
    $user = $_SESSION['username'];

    $sql = "INSERT INTO `registration`.`feed` (`others`, `username`, `dt`) VALUES ('$others', '$user', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function preventBack() {
window.history.forward();
}
setTimeout("preventBack()", 0);
window.onunload = function () { null };
</script>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="feed.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<header>
<div class="yo">
     <img src="images/logo1.jpeg" alt="">
</div>

<div class="btn">
      <span class="fas fa-bars"></span>
</div>
<nav class="sidebar">
      <div class="text">
        Menu
      </div>
<ul>
<li class="active"><a href="index.php">Home</a></li>
<li>
          <a href="#" class="feat-btn">Donate
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="feat-show">
<li><a href="food.php">Food</a></li>
<li><a href="clothes.php">Clothes</a></li>
<li><a href="furniture.php">Furniture</a></li>
<li><a href="utensils.php">Utensils</a></li>
<li><a href="books.php">Books</a></li>
</ul>
</li>

<li><a href="feed.php">Feedback</a></li>
<li>
<?php  if (isset($_SESSION['username'])) : ?>
    	<p> <a href="index.php?logout='1'" >Logout</a> </p>
<?php endif ?>
</li>
</ul>
</nav>
<div class="con">

        <h3>Feedback</h3>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your feedback.</p>";
        }
        ?>
<form action="feed.php" method="post">
        <textarea name="others" id="others" cols="90" rows="15"
        placeholder=" Enter Here" required></textarea>
        <button type="submit" class="submit" name="submit" >Submit</button>
</form>

</div>

<script>
    $('.btn').click(function(){
      $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
    });
      $('.feat-btn').click(function(){
        $('nav ul .feat-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });
      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
</script>
</header>
</body>
</html>