<?php
session_start();
if(isset($_SESSION["username"])||isset($_COOKIE["username"])){
  if(isset($_COOKIE["username"])){
    $_SESSION['username']=$_COOKIE["username"];
  }

$username=$_SESSION['username'];
  require_once("config.php");
  include_once("includes/menu.php");
   $dbConnect=new DatabaseConnect;
   $query = mysql_query("SELECT * FROM `user`  WHERE `email` ='$username'") or die (mysql_error());
   if ($query){
       $currentUser = mysql_fetch_array($query,MYSQL_ASSOC);

include("direct.php");

     }

}else{
include ("login.php");
}
?>
