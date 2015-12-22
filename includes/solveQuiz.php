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
header("location: index.php");
}else{

//Getting Quiz
  $Quiz_ID=$_GET['quiz_id'];

$query=mysql_query("SELECT * FROM  `quiz` where quiz.ID=".$Quiz_ID)or die (mysql_error());
$QuizDetails=mysql_fetch_array($query,MYSQL_ASSOC);
?>

<div class="container">
  <div class="jumbotron">
    <h1><?php echo($QuizDetails['title']);  ?></h1>
    <p><?php  echo($QuizDetails['description']); ?></p>
    <h3>Total Marks: <?php  echo($QuizDetails['total_marks']); ?></h3>
  </div>
</div>
<div class="container" >
   <form class="form-CreatQuiz" method="post" action="index.php?p=createQuestion" >

<?php

    $query=mysql_query("SELECT * FROM  `question` where quiz_ID=".$Quiz_ID)or die (mysql_error());
        while($questions=mysql_fetch_array($query,MYSQL_ASSOC)){
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
<input type="hidden" id="QuizID" name="QuizID" value="<?php echo ($Quiz_ID); ?>" >
</form>

</div
<?php
} ?>
