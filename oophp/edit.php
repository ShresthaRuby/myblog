<?php
include ("database_lib.php");
$name=$_GET['id'];
$con = new db();
//$query=$con->get_user($name);
if (isset($_POST['update'])) {
    $data = $con->edit($name);
}
?>
<html>
    <form name="form_register" method="post">
            Name:<input type="text" name="name" > <br/>
            Password:<input type="password" name="password" ><br/>
            Address:<input type="text" name="address"><br/>
            Gender:<input type="radio" name="gender" value="male" checked="checked">Male<input type="radio" name="gender" value="female">Female<br/>
            User Type:<select name="usertype"> <option selected="selected" >User</option> <option selected="selected" >Admin</option> </select><br/>
			Email:<input type="email" name="email" >
			<input type="submit" name="update" value="update">
        </form>
        
</html>