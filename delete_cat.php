<?php
include ('db_cat.php');
$id=$_GET['id'];
$con = new db1();

$con->delete($id);
?>