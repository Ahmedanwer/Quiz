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
  <div class="jumbotron">
    <h1>Welcoooome</h1>
    <p><?php echo($currentUser['name']); ?></p>
  <p>Email: <?php echo($currentUser['email']); ?></p>
  <p>Faculty: <?php echo($currentUser['faculty']); ?></p>
  <p>University: <?php echo($currentUser['university']); ?></p>
  <p>Department: <?php echo($currentUser['department']); ?></p>
  </div>
</div>

<?php
  include("includes/footer.php");

}

}

 ?>
