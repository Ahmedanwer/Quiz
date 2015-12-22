<?php



if (isset($_POST['submit'])) {
  $Question_number=$_POST['questions_num'];
  $Quiz_ID=$_POST['quiz_id'];

  $query=mysql_query("SELECT * FROM  `quiz` where quiz.ID=".$Quiz_ID)or die (mysql_error());
  $QuizDetails=mysql_fetch_array($query,MYSQL_ASSOC);

  $query=mysql_query("SELECT * FROM  `question` where quiz_ID=".$Quiz_ID)or die (mysql_error());
  $Result=0;
      while($questions=mysql_fetch_array($query,MYSQL_ASSOC)){
          $createQuestion = mysql_query("INSERT INTO `".DB_DATABASE."`. `answer`
           ( `question_id` , `student_answer`,`user_id` )
          VALUES ('".$questions['ID']."','".$_POST['Q'.$questions['ID']]."','".$currentUser['ID']."') ") or die (mysql_error());
          if($_POST['Q'.$questions['ID']]==$questions['right_answer']){
            $Result++;
          }
      }

      $createQuestion = mysql_query("INSERT INTO `".DB_DATABASE."`. `take`
       ( `quiz_id` , `student_mark`,`student_id` )
      VALUES ('".$Quiz_ID."','".$Result."','".$currentUser['ID']."') ") or die (mysql_error());

?>

<div class="container">
  <div class="jumbotron">
    <h1><?php echo($QuizDetails['title']);  ?></h1>
    <p><?php  echo($QuizDetails['description']); ?></p>
    <h3>Your Score : <?php echo((($Result/$Question_number)*$QuizDetails['total_marks'])."/".$QuizDetails['total_marks']);  ?></h3>
  </div>
</div>

<?php
//header("location: index.php");
}else{

//Getting Quiz
  $Quiz_ID=$_GET['quiz_id'];





$query=mysql_query("SELECT * FROM  `quiz` where quiz.ID=".$Quiz_ID)or die (mysql_error());
$QuizDetails=mysql_fetch_array($query,MYSQL_ASSOC);

$query=mysql_query("SELECT * FROM  `take` where take.quiz_id=".$Quiz_ID." AND take.student_id=".$currentUser['ID'])or die (mysql_error());
if(mysql_num_rows($query)==1){
$take=mysql_fetch_array($query,MYSQL_ASSOC);

$query=mysql_query("SELECT * FROM  `question` where question.quiz_ID=".$Quiz_ID)or die (mysql_error());
$Question_number=mysql_num_rows($query);



?>
<div class="container">
  <div class="jumbotron">
    <h1><?php echo($QuizDetails['title']);  ?></h1>
    <p><?php  echo($QuizDetails['description']); ?></p>
    <h3>Your Score : <?php echo((($take['student_mark']/$Question_number)*$QuizDetails['total_marks'])."/".$QuizDetails['total_marks']);  ?></h3>
  </div>
  </div>
</div>
<?php

}else{


?>

<div class="container">
  <div class="jumbotron">
    <h1><?php echo($QuizDetails['title']);  ?></h1>
    <p><?php  echo($QuizDetails['description']); ?></p>
    <h3>Total Marks: <?php  echo($QuizDetails['total_marks']); ?></h3>
  </div>
</div>
<div class="container" >
   <form class="form-CreatQuiz" method="post" action="index.php?p=solveQuiz" >

<?php

    $query=mysql_query("SELECT * FROM  `question` where quiz_ID=".$Quiz_ID)or die (mysql_error());
    $Question_Number=0;
        while($questions=mysql_fetch_array($query,MYSQL_ASSOC)){
          $Question_Number++;
    ?>
    <div class="col-sm-6">
      <h1><?php echo ($questions['question']) ; ?></h1>

    <?php
              $answer_Query=mysql_query("SELECT * FROM  `choices` where question_id=".$questions['ID'])or die (mysql_error());
              $AnswersArray = array();
              while($answer=mysql_fetch_array($answer_Query,MYSQL_ASSOC)){
                  array_push($AnswersArray,$answer);
              }
              $numbers = range(0, 3);
              shuffle($numbers);
              foreach ($numbers as $number) {

                ?>
                  <input type="radio" name = "Q<?php echo  $AnswersArray[$number]['question_id'] ?>"
                  value="<?php  echo ($AnswersArray[$number]['ID'])  ?>"><?php  echo ($AnswersArray[$number]['choice']) ?></label>
                  <br>

                <?php

                }






              ?>
            </div>
            <?php
        }

?>
<div>
  <p>
  </p>
<button class="btn btn-lg btn-primary btn-block " name="submit" type="submit">Submit</button>
</div>
<input type="hidden" id="QuizID" name="questions_num" value="<?php echo ($Question_Number); ?>" >
<input type="hidden" id="QuizID" name="quiz_id" value="<?php echo ($Quiz_ID); ?>" >
</form>

</div
<?php
}
}?>
