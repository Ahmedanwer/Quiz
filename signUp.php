<?php
$errors='';
if (isset($_POST['submit'])) {

require_once("config.php");
 $dbConnect=new DatabaseConnect;

 $query = mysql_query("INSERT INTO `".DB_DATABASE."`. `user`
 ( `name` , `email` , `faculty` , `university` , `department` , `password` , `type` )
VALUES ('".$_POST['name']."','".$_POST['inputEmail']."',
'".$_POST['Faculty']."','".$_POST['University']."',
 '".$_POST['Department']."','".$_POST['password']."','".$_POST['type']."')") or die (mysql_error());


 if ($query){
header("location: index.php");
}
}


?>

<html lang="ar">
<head>
 <title>sign Up</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container" >
     <form class="form-signin" method="post" action="signUp.php" >


       <h2 class="form-signin-heading">SignUp</h2>
       <input type="name" id="name" name="name" class="form-control" placeholder="name" required autofocus>

       <input type="name" id="Faculty" name="Faculty" class="form-control" placeholder="Faculty" required>

       <input type="name" id="University" name="University" class="form-control" placeholder="University" required >

       <input type="name" id="Department" name="Department" class="form-control" placeholder="Department" required>

       <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email Adress" required autofocus>
       <input type="password" id="inputPassword" name="password" class="form-control" placeholder="password" required>
       <select class="form-control" name="type" id="type">
         <option value="0">Student</option>
         <option value="1">Teacher</option>
       </select>

       <div class="checkbox">
       </div>
       <div class="row">

       <button class="btn btn-lg btn-primary btn-block " name="submit" type="submit">sign Up</button>

      </div>
       <br>
       <?php if($errors!=""){ ?> <div class="alert alert-danger"><?php echo $errors; ?></div><?php } ?>
     </form>

   </div> <!-- /container -->
</body>
</html>

<?php

?>
