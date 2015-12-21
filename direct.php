<?php
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

echo("homePage");

  include("includes/footer.php");

}


 ?>
