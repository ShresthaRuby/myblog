<?php
session_start();
if(!isset($_SESSION['uid']))
{
    header('location:login.php');
}
include ("db_cat.php");
$con = new db1();
if (isset($_POST['submit'])) 
{
    $con->insert();
}
?>
<html>
    <form method='post'>
        Category name:<input type='text' name='catname'/>
        <input type='submit' value='submit' name='submit'/>
    </form>
</html>