<?php
         class db1{
                        var $host='localhost';
			var $user='root';
			var $database='ruby';
			var $password='';
			public $dbconnect;
			

			public function __construct()
			{
				$this->dbconnect=mysqli_connect($this->host,$this->user,$this->password,$this->database);
                           
			}
                        
//                        public function retrieve()
//			{   
//                            session_start();
//                                $this->name=$_POST['username'];
//                                $this->password=$_POST['password'];
//                                $this->query = "SELECT * from user_info where Name like '$this->name' and Password like '$this->password'";
//				$this->result=mysqli_query($this->dbconnect,$this->query);
//                                $rows=mysqli_num_rows($this->result);
//                                if($rows==1){
//                                $data = $this->result->fetch_array(MYSQLI_ASSOC);
//                                $_SESSION['username']= $data['Name'];
//                                $_SESSION['uid'] = $data['Id'];
//				header('location:dashboard.php');
//                                }else{
//                                    $_SESSION['msg'] = "Invalid username or password";
//                                    header('location:login.php');
//                                }
//			}
                        
                       public function insert()
                       {
                                    $name = $_POST['catname'];
                                  mysqli_query($this->dbconnect,"INSERT INTO category_info (Name) values('$name')");
                                echo 'Data inserted successfully';
                               header("location:view_cat.php");
                       }
                       public function fetch()
                       {
                           $query="SELECT * from category_info";
                           $res = mysqli_query($this->dbconnect,$query);
                           $data = array();
                           while($row=$res->fetch_array(MYSQLI_ASSOC)){
                               $data[]=$row;
                           }
                            return $data;
                            
                       }
                       
                        public function edit($val)
                       {
                            $this->val=$val;
                            $name=$_POST['catname'];
                           
                           $query="UPDATE category_info SET Name='$name'WHERE id like '$this->val'";
                           mysqli_query($this->dbconnect,$query);
                           echo 'Data updated successfully';
                           header("location:view_cat.php");
                           
                           
                       }
                       
                       public function getsingle($id)
                       {
                           

                           $query="SELECT * from category_info Where id like '$id'";
                           $res = mysqli_query($this->dbconnect,$query);
                           
                           return $res->fetch_array(MYSQLI_ASSOC);
                           
                           
                       }
                       
                       public function delete($id)
                       {
                           
                           $query="DELETE from category_info WHERE id like '$id'";
                            $val= mysqli_query($this->dbconnect,$query);
                            header("location:view_cat.php");
                           
                           
                       }
                       
         }
         

?>
