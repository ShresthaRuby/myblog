<?php include ('db_user.php');
    $connection=new db();
    $nameerror = $emailerror = $passerror = $repasserror = $imageerror =" ";
  if (isset($_POST['submit']))

    {  
                            $name = $_POST['name'];
                          $password = $_POST['password'];
                             $address = $_POST['address'];
                             $gender = $_POST['gender'];
                       // $image=$this->upload_page_image();
                         $usertype = $_POST['usertype'];
                         $email = $_POST['email'];
                           
// define variables and set to empty values



//if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameerror = "Name is required";
   } else {
     //$name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameerror = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST['password']))
   {
       $passerror="Password is required";
   }
   else
   {
        $password = $_POST['password'];
   }
       
  
   if (empty($_POST['repassword']))
   {
       $repasserror="Please retype your password";
   }
    if (($_POST['repassword'])!=($_POST['password']))
   {
       $repasserror="The passwords do not match.Please try again";
   }
   if (empty($_POST["email"])) {
     $emailerror = "Email is required";
   } else {
    // $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid
//     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
//       $emailerror = "Invalid email format"; 
     }
   
//     if (empty($_POST['image1']))
//   {
//       $imageerror="Please select an image";
//   }
//   else
//   {
//       $image=$this->upload_page_image();
//   }
    
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
  $data = htmlspecialchars($data);
   return $data;
}
   
     if(($nameerror==' ')&&($passerror==' ')&&($repasserror==' ')&&($emailerror==' ')&&($imageerror==' '))
  {
        // $connection->upload_page_image();
    $con=$connection->insert($name,$password,$address,$gender,$usertype,$email);
    
    }

    }
    
    //$nameerror=$passerror=$repasserror=$emailerror=$imageerror="";
?>

<html>
    <body>
        <form name="form_register" method="post"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name:<input type="text" name="name"> <?php echo $nameerror;?><br/>
            Password:<input type="password" name="password"><?php echo $passerror;?><br/>
            Retype password:<input type="password" name="repassword"><?php echo $repasserror;?><br/>
            Address:<input type="text" name="address"><br/>
            Gender:<input type="radio" name="gender" value="male" checked="checked">Male<input type="radio" name="gender" value="female">Female<br/>
            User Type:<select name="usertype"> <option selected="selected" >User</option> <option >Admin</option> </select><br/>
			Email:<input type="email" name="email"><?php echo $emailerror;?><br/>
                        <input type="file" name="image1"/><?php echo $imageerror;?><br/>
			<input type="submit" name="submit">
        </form>
        
    </body>
    
    
</html>