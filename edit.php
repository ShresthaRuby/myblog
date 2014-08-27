<?php
session_start();


if(!isset($_SESSION['uid']))
{
    header("location:login.php");
}
include ("db_user.php");
$id=$_GET['id'];
if($id=='')
{
    header("location:404.php");
}   
$con = new db();
$connection = new db();
if (isset($_POST['update'])) 
{
    $data = $con->edit($id);
    $con->upload_page_image();
}
$query=$connection->getuser($id);

 
?>
<html>
    <body>
    <form name="form_register" method="post" enctype="multipart/form-data">
        Name:<input type="text" name="name" value="<?php echo $query['Name'];?>"> <br/>
            Password:<input type="password" name="password" value="<?php echo $query['Password'];?>" ><br/>
            Address:<input type="text" name="address" value="<?php echo $query['Address'];?>"><br/>
            Gender:<input type="radio" name="gender" value="male" checked="checked">Male<input type="radio" name="gender" value="female">Female<br/>
            User Type:<select name="usertype"> <option selected="selected" >User</option> <option selected="selected" >Admin</option> </select><br/>
			Email:<input type="email" name="email" value="<?php echo $query['Email'];?>"><br/>
                        <input type="file" name="image1"/><br/>
			<input type="submit" name="update" value="update">
        </form>
   
    </body>
</html>