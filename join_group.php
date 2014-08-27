<?php
function connect_db()
{
    $conn=mysqli_connect("localhost","root","","db_jmate");
    return $conn;
}

function join_group()
{
$conn=connect_db();
$group=$_GET['id'];
$user=$_SESSION['session_user_id'];

$sql="SELECT name_list from tbl_group where id='$group'";
$res=mysqli_query($conn,$sql);
$val=$res->fetch_array(MYSQLI_ASSOC);
$name=$val['name_list'];

    $name=$name.','.$user;
    echo $name;
    $sql1="UPDATE tbl_group SET name_list='$name' where id='$group'";
    mysqli_query($conn,$sql1);
    echo "Successful";
}  


?>
