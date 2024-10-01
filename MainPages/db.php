<?php
$db = new Mysqli;
//if naay acc   local   name  password  database_name
$db->connect('localhost','root','','todopraccrud');

if (!$db){
  echo "no database";
}

?>