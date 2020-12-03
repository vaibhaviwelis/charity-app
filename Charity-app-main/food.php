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
if(isset($_POST['type'])){
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

    // Collect post variables
    $type = $_POST['type'];
    $vegnonveg = $_POST['vegnonveg'];
    $quantity = $_POST['quantity'];
      $pickuptime = $_POST['pickuptime'];
    $user = $_SESSION['username'];

    $sql = "INSERT INTO `registration`.`food` (`type`, `vegnonveg`, `quantity`, `username`, `dt`,`pickuptime`) VALUES ('$type', '$vegnonveg', '$quantity', '$user', '$pickuptime',current_timestamp());";
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
	<title>Food</title>
	<link rel="stylesheet" type="text/css" href="food.css">
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


<div class="dn">
<p>Donate Food Here</p>
</div>

<div class="main">

<form action="food.php" method="post">

  
  <div class="con">
  </div> 
      <div class="in">
         <div class="subm">
          <?php
           if($insert == true){
           echo "<p class='submitMsg'>May your kindness and generosity return to you a hundredfold!</p>";
           }
          ?>
         </div>
         <label><span>Type :</span></label><br>
         <select name="type" required>
           <option value="">--Select--</option>
           <option value="Roti">Roti</option>
           <option value="Rice">Rice</option>
           <option value="Gravy">Gravy</option>
           <option value="Packed Food">Packed Food</option>
         </select><br><br>


        <label><span>Veg/Non-Veg</span></label><br>
         <select name="vegnonveg" required>
           <option value="">--Select--</option>
           <option value="Veg"> Veg</option>
           <option value="Non-Veg">Non-Veg</option>
         </select><br><br>

          <label><span>Quantity :</span></label><br>
          <input type="text" name="quantity" placeholder=" Nos or in gram/kg" required><br><br>

           <label><span>Pickup time:</span></label><br>
          <input type="text" name="pickuptime" placeholder="before 1 am" required><br><br>
          <h1>*NOTE : Please make sure that the food you donate is edible and not stale.</h1>


      </div>
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