<?php
if($currentUser['type']==1){

$errors='';
if (isset($_POST['submit'])) {

require_once("config.php");
 $dbConnect=new DatabaseConnect;

 $create_quiz = mysql_query("INSERT INTO `".DB_DATABASE."`. `quiz`
 ( `title` , `description` , `total_marks` , `instructor_id`,  `group_id` )
VALUES ('".$_POST['title']."','".$_POST['description']."',
'".$_POST['total_marks']."','".$_POST['instructor_id']."','".$_POST['group_id']."') ") or die (mysql_error());

  if ($create_quiz){
    $quiz_id = mysql_insert_id();
    header("location: index.php?p=createQuestion&questions_num=".$_POST['questions_num']."&quiz_id=".$quiz_id);
    // header("location: index.php");
  }
}
?>

<div class="container" >
   <form class="form-signin" method="post" action="index.php?p=createQuiz&Smode=1" >

     <h2 class="form-signin-heading">Create Quiz</h2>
     <input type="title" id="title" name="title" class="form-control" placeholder="title" required autofocus>

     <input type="description" id="description" name="description" class="form-control" placeholder="description" required>

     <input type="total_marks" id="total_marks" name="total_marks" class="form-control" placeholder="total marks" required >
     <input type="questions_num" id="questions_num" name="questions_num" class="form-control" placeholder="Question Number" required >

     <button class="btn btn-lg btn-primary btn-block " name="submit" type="submit">Create Quiz</button>

     <input type="hidden" id="instructor_id" name="instructor_id" value="<?php echo ($currentUser['ID']); ?>" >
     <input type="hidden" id="group_id" name="group_id" value="<?php echo ($_GET['group_id']); ?>" >

       <br>
       <?php if($errors!=""){ ?> <div class="alert alert-danger"><?php echo $errors; ?></div><?php } ?>
   </form>

 </div> <!-- /container -->

 <?php
}else{
  echo("404");
}
  ?>
