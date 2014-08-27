<?php
require_once('ImageManipulator.php');	
class db{
			var $host='localhost';
			var $user='root';
			var $database='ruby';
			var $password='';
			public $dbconnect;
			

			public function __construct()
			{
				$this->dbconnect=mysqli_connect($this->host,$this->user,$this->password,$this->database);
			}
			
			public function retrieve()
			{   
                            session_start();
                                $name=$_POST['username'];
                                $password=$_POST['password'];
                                $this->query = "SELECT * from user_info where BINARY Name=BINARY '$name' and BINARY Password =BINARY '$password'";
				$this->result=mysqli_query($this->dbconnect,$this->query);
                                $rows=mysqli_num_rows($this->result);
                                if($rows==1){
                                $data = $this->result->fetch_array(MYSQLI_ASSOC);
                                $_SESSION['username']= $data['Name'];
                                $_SESSION['uid'] = $data['Id'];
				header('location:dashboard.php');
                                }else{
                                    $_SESSION['msg'] = "Invalid username or password";
                                    header('location:login.php');
                                }
			}
                        function upload_page_image() {
                            if ($_FILES['image1']['size'] > 0) {
                                $dir = 'images/page_images';
                                $filename1 = $_FILES['image1']['name'];
                                $srcfile = $_FILES['image1']['tmp_name'];
                                $targetfile = $dir . '/' . $filename1;
                                // $newNamePrefix = '_';
        $manipulator = new ImageManipulator($_FILES['image1']['tmp_name']);
        // resizing to 200x200
        $newImage = $manipulator->resample(200, 200);
        // saving file to uploads folder
        $manipulator->save($dir . '_'.$_FILES['image1']['name']);
        
                                
                                if (move_uploaded_file($srcfile, $targetfile)) {
                                    return $_FILES['image1']['name'];
                                } else {
                                    return $_FILES['image1']['name'];
                                }
                            }
                        }
                        
                       public function insert( $name,$password,$address, $gender,$usertype,$email,$image)
                       {
                          
                            
    
                            $cquery="SELECT * from user_info where BINARY Name= BINARY '$name'";
                            $result=mysqli_query($this->dbconnect,$cquery);
                            $rows=  mysqli_num_rows($result);
                            if($rows==0)
                            {
                             $query="insert into user_info(Name,Password,Address,Gender,Usertype,Email,image) values('$name','$password','$address','$gender','$usertype','$email','$image')";
                                
                                $this->result=mysqli_query($this->dbconnect,$query);
                                echo 'Data inserted successfully';
                                header("location:login.php");
                            }
                             else
                             {
                                 echo'User name taken.Please choose another name';
                             }
                       }
                       
           public function fetch()
           {
               $query="SELECT * from user_info";
               $res = mysqli_query($this->dbconnect,$query);
               $data = array();
               while($row=$res->fetch_array(MYSQLI_ASSOC)){
                   $data[]=$row;
               }
                return $data;
           }
                       
                        public function edit($val)
                       {
                            
                            $name=$_POST['name'];
                            $password=$_POST['password'];
                            $address=$_POST['address'];
                            $gender=$_POST['gender'];
                            $usertype=$_POST['usertype'];
                            $email=$_POST['email'];
                            $image=$this->upload_page_image();
                            if(empty($image))
                            {
                             $query="UPDATE user_info SET Name='$name',Password='$password',Address='$address',Gender='$gender',Usertype='$usertype',Email='$email' WHERE Id = '$val'";   
                            }
                            else { 
                           $query="UPDATE user_info SET Name='$name',Password='$password',Address='$address',Gender='$gender',Usertype='$usertype',Email='$email',image='$image' WHERE Id = '$val'";
                            }
                           mysqli_query($this->dbconnect,$query);
                           echo 'Data updated successfully';
                           header("location:view.php");
                           
                           
                       }
                       
                       public function getuser($id)
                       {
                           
//                           $query="SELECT * from user_info WHERE Name like $name";
//                           $res = mysqli_query($this->dbconnect,$query);
//                           $data = array();
//                           while($row=$res->fetch_array(MYSQLI_ASSOC)){
//                               $data[]=$row;
//                           }
//                           return $data;
                           
                           $query="SELECT * from user_info Where Id ='$id'";
                           $res = mysqli_query($this->dbconnect,$query);
                           
                           return $res->fetch_array(MYSQLI_ASSOC);
                           
                           
                       }
                       
                       public function delete($id)
                       {
                           $this->name=$name;
                           $query="DELETE from user_info WHERE Id='$id'";
                            $val= mysqli_query($this->dbconnect,$query);
                            header("location:view.php");
                           
                           
                       }
                       
                       
        }
                             

?>