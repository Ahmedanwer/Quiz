<?php
session_start();
if(isset($_SESSION["username"])||isset($_COOKIE["username"])){
  if(isset($_COOKIE["username"])){
    $_SESSION['username']=$_COOKIE["username"];
  }

$username=$_SESSION['username'];
$type=0;
  require_once("config.php");
   $dbConnect=new DatabaseConnect;

   $query = mysql_query("SELECT * FROM `user`  WHERE `email` ='$username'") or die (mysql_error());
   if ($query){
       $row = mysql_fetch_array($query,MYSQL_ASSOC);
echo($row["name"]);
//row array now have all the details of the user
     }

}else{
include ("login.php");
}
?>
