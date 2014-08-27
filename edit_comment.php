<?php
include('db_comment.php');
session_start();
if(!isset($_SESSION['uid']))
{
    header('location:login.php');
}
$blogid=$_GET['blogid'];
$id=$_GET['id'];
if($id=='')
{
    header('location:404.php');
}
//echo $id;
$con=new db3();

$arr=$con->getsingle($id);

if(isset($_POST['submit']))
{
    $con->update($id);
   header('location:readblog.php?id='.$blogid) ;  
    
    
}
?>
<html>
    <body>
    <form method="post">
        <textarea name="description"><?php echo $arr['description'];?></textarea>
        <input type="submit" value="submit" name="submit">
    </form>
    </body>
</html>