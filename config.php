<?php
define ('DB_USER', "root");
define ('DB_PASSWORD', "");
define ('DB_DATABASE', "quiz");
define ('DB_HOST', "localhost");


class DatabaseConnect
{
public $link;
public function __construct()
{
  $this->link= mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Could not connect to MySQL server.');
    mysql_select_db(DB_DATABASE);
      mysql_query("set names 'utf8'");
}
public function close(){
  mysql_close($this->link);
}
}


?>
