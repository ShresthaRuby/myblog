<?php
include("db_view.php");
$con=new db2();
$id=$_GET['id'];
$con->delete($id);

?>
