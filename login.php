<?php
$errors='';
if (isset($_POST['submit'])) {

// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

require_once("config.php");
 $dbConnect=new DatabaseConnect;

 $query = mysql_query("SELECT * FROM `user`  WHERE `email` ='$username'") or die (mysql_error());
 if ($query){
     $row = mysql_fetch_array($query,MYSQL_ASSOC);
if($password==$row['password']){
if(isset($_POST['remember-me'])){
  if($_POST['remember-me']){
    $cookie_name = "username";
    $cookie_value = $username;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day
}
}
$_SESSION['username']=$username; // Initializing Session
header("location: index.php");
}else {

$errors= "you have enterd a wrong username or password";
}


}


}
?>

<html>
<head>
 <title>Welcome to Maradona Quiz</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container" >
     <form class="form-signin" method="post" action="index.php" >


       <h2 class="form-signin-heading">Please Login</h2>
       <label for="inputEmail" class="sr-only">Email address</label>
       <input type="email" id="inputEmail" name="username" class="form-control" placeholder="Email Adress" required autofocus>
       <label for="inputPassword" class="sr-only">Password</label>
       <input type="password" id="inputPassword" name="password" class="form-control" placeholder="password" required>
       <div class="checkbox">
         <label>
           <input type="checkbox" name="remember-me" id="remember-me"> Remeber me
         </label>
       </div>
       <div class="row">
         <div class="col-sm-6">
       <button class="btn btn-lg btn-primary btn-block " name="submit" type="submit">Login</button>
     </div>
     <div class="col-sm-6">
        <a class="btn btn-lg btn-primary btn-block" href="signUp.php">sign Up</a>
      </div>
      </div>
       <br>
       <?php if($errors!=""){ ?> <div class="alert alert-danger"><?php echo $errors; ?></div><?php } ?>
     </form>

   </div> <!-- /container -->
</body>
</html>

<?php

?>
