<?php
include ("db_user.php");
$name=$_GET['id'];
$con = new db();
$con->delete($name);

?>
