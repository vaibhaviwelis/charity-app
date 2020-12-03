<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Charity Bank</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    </head>
    <body>
<form action="signup.php" method="post">
<?php include('errors.php'); ?>
<div class="cont">
<div class="img">
<div class="form sign-up">
   
<label for="Username">
 
<input type="text" name="username" value="<?php echo $username; ?>" required>
    
    </label>
    <label for="email">email</label>
<input type="email" name="email" value="<?php echo $email; ?>" required>
    
<label for="Password">password</label>
<input type="password" name="password_1" required>
     
<label>
<span>Confirm Password</span>
<input type="password" name="password_2" required>
</label>
<button type="submit" class="submit" name="reg_user">Sign Up</button>
</div>
</div>
    </div>
</form>
 
<script type="text/javascript" src="script.js"></script>
   
</body>
</html>    