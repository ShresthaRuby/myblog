<?php
include ('db_cat.php');
if(!isset($_SESSION['uid']))
{
    header('location:login.php');
}
$id=$_GET['id'];
if($id='')
{
    header('location:404.php');
}
$con = new db1();
$connection=new db1();
if(isset($_POST['submit']))
{
    $con->edit($id);
}
$r=$connection->getsingle($id);
?>
<html>
    <body>
        <form method='post'>
            Category:<input type='text' name='catname' value='<?php echo $r['Name'];?>'>
            <input type='submit' name='submit' value='update'>     
        </form>
    </body>
</html>