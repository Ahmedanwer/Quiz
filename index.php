<?php
session_start();
if(isset($_SESSION["username"])||isset($_COOKIE["username"])){
  if(isset($_COOKIE["username"])){
    $_SESSION['username']=$_COOKIE["username"];
  }
//Index
echo("index");
}else{
include ("login.php");
}
?>
