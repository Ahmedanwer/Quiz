<?php
if(isset($_GET['Smode'])){
  $requriedPage=$_GET['p'];
  include("includes/".$requriedPage.".php");

}else{

if(isset($_GET['p']))
{
$requriedPage=$_GET['p'];

include("includes/header.php");
getMenu($currentUser["type"]);

include("includes/".$requriedPage.".php");

include("includes/footer.php");

}else{


  include("includes/header.php");
  getMenu($currentUser["type"]);
?>
<div class="container">
  <div class=" col-sm-8">
    <div class="block">
    <h1>Welcome <?php echo($currentUser['name']); ?></h1>
    <p>Quiz me is an online platform for creating and monitoring quizes.
    <br>you can simply create any quiz any time and share this quiz to your group.
  <br>students can join groups and then they can solve your quiz one time <br>
when a student solve a quiz answers is submitted and the marked automaticly ,<br>
you can check the marks any time by opening your quiz </p>
</div>
</div>
<div class="col-sm-4 ">
  <div class="block">
    <img class ="logo" src="logo.png">
  <h2>Contact Details</h2>
  <p><b>Email: </b><?php echo($currentUser['email']); ?></p>
  <p><b>Faculty: </b><?php echo($currentUser['faculty']); ?></p>
  <p><b>University:</b> <?php echo($currentUser['university']); ?></p>
  <p><b>Department:</b> <?php echo($currentUser['department']); ?></p>
</div>
  </div>
</div>

<?php
  include("includes/footer.php");

}

}

 ?>
