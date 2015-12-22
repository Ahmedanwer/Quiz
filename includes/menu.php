<?php
function getMenu($type){

if($type==1){
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="?p=viewGroupList">My Groups</a></li>
        <li><a href="?p=creatGroup">Create Group</a></li>
        <li><a href="logout.php">LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
}else{

?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="?p=viewGroupList">Groups</a></li>
            <li><a href="logout.php">LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
}


}



?>
