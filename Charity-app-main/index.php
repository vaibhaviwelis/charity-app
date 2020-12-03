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
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="indexstyle.css">
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
Menu</div>
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
  <li><a href="index.html">where will your donation go?</a></li>            
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
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong> !</p>
<?php endif ?>

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