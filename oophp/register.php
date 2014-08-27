<?php include ('database_lib.php');
    $connection = new db();
    $name = $_POST['name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    
    
    $query="insert into user_info(Name,Password,Address,Gender,Usertype,Email) values('$name','$password','$address','$gender','$usertype','$email')";
    
    
    $con=$connection->insert($query);
    
?>