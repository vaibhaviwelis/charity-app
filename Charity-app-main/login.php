<?php include('server.php') ?>
<!DOCTYPE html>  
<html>
    <head>
    <title>FED-login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styler.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    </head>
<body>
    
<form action="login.php" method="post">
<?php include('errors.php'); ?>
<div class="cont">
<div class="sign-in">
<p><a href="signup.php">Register</a> | <a href="login.php">Login</a></p>   
<h2>Sign In</h2>
<label>
<span>Username</span>
<input type="text" name="username" value="<?php echo $username; ?>" required>
</label>
<label>
<span>Password</span>
<input type="password" name="password" required>
</label>
<button type="submit" class="submit" name="login_user" >Sign In</button>
</div>
    <p>Don't have an account? <a href="signup.php">Sign up 
        now</a>.</p>
</div>
</form>
<script type="text/javascript" src="script.js"></script>
</body>
</html>