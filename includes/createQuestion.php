<?php


if (isset($_POST['submit'])) {
  $Question_number=$_POST['questions_num'];
  $Quiz_ID=$_POST['quiz_id'];

for ($i=1; $i <=$Question_number ; $i++) {


   $createQuestion = mysql_query("INSERT INTO `".DB_DATABASE."`. `question`
   ( `question` , `quiz_ID` )
  VALUES ('".$_POST['Question'.$i]."','".$Quiz_ID."') ") or die (mysql_error());


if ($createQuestion){
    $QuestionID = mysql_insert_id();
    $createQuestion = mysql_query("INSERT INTO `".DB_DATABASE."`. `choices`
     ( `question_id` , `choice` )
    VALUES ('".$QuestionID."','".$_POST[$i.'rAnswer']."') ") or die (mysql_error());
    $rightAnswerID = mysql_insert_id();
    $updateRight=mysql_query("UPDATE `".DB_DATABASE."`. `question`
    SET right_answer=".$rightAnswerID." where question.ID=".$QuestionID);
for ($j=0; $j <3 ; $j++) {

  $createQuestion = mysql_query("INSERT INTO `".DB_DATABASE."`. `choices`
   ( `question_id` , `choice` )
  VALUES ('".$QuestionID."','".$_POST[$i.'Answer'.$j]."') ") or die (mysql_error());

}

}

}

}else{
  $Question_number=$_GET['questions_num'];
  $Quiz_ID=$_GET['quiz_id'];



?>


<div class="container" >
   <form class="form-CreatQuiz" method="post" action="index.php?p=createQuestion" >
     <?php
      for ($i=1; $i <=$Question_number ; $i++) {
?>
<h2 class="form-signin-heading">Question <?php echo $i; ?></h2>
<input type="name" id="Question" name="Question<?php echo $i; ?>" class="form-control" placeholder="Question" required autofocus>
<br>
<input type="name" id="Answer" name="<?php echo $i; ?>rAnswer" class="form-control" placeholder="right answer" required>

<?php
for ($j=0; $j <3 ; $j++) {
?>
<input type="name" id="Answer" name="<?php echo $i; ?>Answer<?php echo $j; ?>" class="form-control" placeholder="Answer" required>
<?php
}

 ?>
<?php
      }
     ?>

     <input type="hidden" id="QuizID" name="quiz_id" value="<?php echo ($Quiz_ID); ?>" >
     <input type="hidden" id="QuizID" name="questions_num" value="<?php echo ($Question_number); ?>" >
<br>
     <button class="btn btn-lg btn-primary btn-block " name="submit" type="submit">Create Quiz</button>

   </form>

 </div> <!-- /container -->
<?php
}
 ?>
