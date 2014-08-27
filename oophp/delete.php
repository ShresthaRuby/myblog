<?php
include ("database_lib.php");
$name=$_GET['id'];
$con = new db();
$con->delete($name);

?>
