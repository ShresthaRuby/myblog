<?php


include("db_comment.php");
$con=new db3();
$id=$_GET['id'];
$con->delete($id);



?>
