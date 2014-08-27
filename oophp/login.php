<?php include ('database_lib.php');
        $connection = new db();
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * from user_info where Name like '$username' and Password like '$password'";
        $con = $connection->retrieve($query);
        if($con==1)
        {
                $_SESSION['user']=$username;
		$_SESSION['pass']=$password;
             header("location:dashboard.php");
        }
        
        else 
        {
            header("location:login.html");
        }
           
?>