<?php
if($currentUser['type']==1){

$errors='';
if (isset($_POST['submit'])) {

require_once("config.php");
 $dbConnect=new DatabaseConnect;

 $query = mysql_query("INSERT INTO `".DB_DATABASE."`. `group`
 ( `name` , `subject` , `year` , `instructor_id` )
VALUES ('".$_POST['name']."','".$_POST['subject']."',
'".$_POST['year']."','".$_POST['instructor_id']."') ") or die (mysql_error());


 if ($query){
header("location: index.php");
}
}
?>

<div class="container" >
   <form class="form-signin" method="post" action="index.php?p=creatGroup&Smode=1" >
   <div class="formPage">

     <h2 class="form-signin-heading">Create Group</h2>
     <input type="name" id="name" name="name" class="form-control" placeholder="name" required autofocus>

     <input type="name" id="subject" name="subject" class="form-control" placeholder="subject" required>

     <input type="name" id="year" name="year" class="form-control" placeholder="year" required >

     <input type="hidden" id="instructor_id" name="instructor_id" value="<?php echo ($currentUser['ID']); ?>" >

     <div class="row">

     <button class="btn btn-lg btn-primary btn-block " name="submit" type="submit">Create Group</button>

    </div>
       <br>
       <?php if($errors!=""){ ?> <div class="alert alert-danger"><?php echo $errors; ?></div><?php } ?>
</div>
   </form>

 </div> <!-- /container -->

 <?php
}else{
  echo("404");
}
  ?>
