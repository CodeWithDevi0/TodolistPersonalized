<?php 
include 'db.php'; 

$task = $_POST['task'];
// insert padung sa  column table nimo nya variable na naas taas ning $task
$sql = "insert into tasks(first_name) values('$task')";

$val = $db->query($sql);

if ($val) {
    header('location: index.php');
}










?>