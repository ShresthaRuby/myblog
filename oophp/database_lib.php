<?php
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
			
			public function retrieve($query)
			{
                                $this->query=$query;
				$this->result=mysqli_query($this->dbconnect,$this->query);
                                $this->numrows=mysqli_num_rows($this->result);
				return $this->numrows;
			}
                        
                       public function insert($cquery)
                       {
                                $this->query=$cquery;
                                $this->result=mysqli_query($this->dbconnect,$this->query);
                                echo 'Data inserted successfully';
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
                            $this->val=$val;
                            $name=$_POST['name'];
                            $password=$_POST['password'];
                            $address=$_POST['address'];
                            $gender=$_POST['gender'];
                            $usertype=$_POST['usertype'];
                            $email=$_POST['email'];
                            
                           $query="UPDATE user_info SET Name='$name',Password='$password',Address='$address',Gender='$gender',Usertype='$usertype',Email='$email' WHERE Name like '$this->val'";
                           mysqli_query($this->dbconnect,$query);
                           echo 'Data updated successfully';
                           header("location:view.php");
                           
                           
                       }
                       
                       public function get_user($name)
                       {
                           $this->name=$name;
                           $query="SELECT * from user_info WHERE Name like '$this->name'";
                            $val=mysqli_query($this->dbconnect,$query);
                            return $val;
                           
                           
                       }
                       
                       public function delete($name)
                       {
                           $this->name=$name;
                           $query="DELERE from user_info WHERE Name like '$this->name'";
                            $val=mysqli_query($this->dbconnect,$query);
                            header("location:view.html");
                           
                           
                       }
                       
                       
        }
                             

?>