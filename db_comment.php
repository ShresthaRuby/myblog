<?php

class db3{
    
                        var $host='localhost';
			var $user='root';
			var $database='ruby';
			var $password='';
			public $dbconnect;
			

			public function __construct()
			{
				$this->dbconnect=mysqli_connect($this->host,$this->user,$this->password,$this->database);
			}
                        
                        public function count($pid)
                        {
                           
                            $result=mysqli_query($this->dbconnect,"SELECT * FROM comment_info where post_id='$pid'");
                            $row=  mysqli_num_rows($result);
                            return $row;
                        }

                       public function insert($pid)
                        {
//                            session_start();
                            $uid=$_SESSION['uid'];
                            $comment=$_POST['comment'];
                            $date= date("y/m/d");
                            mysqli_query($this->dbconnect,"insert into comment_info(id,user_id,description,date,post_id) values (NULL,'$uid','$comment','$date','$pid')");
                        }
                      public function fetch($pid)
                      {
                          $res=mysqli_query($this->dbconnect,"select * from comment_info as c INNER JOIN user_info as u on c.user_id = u.Id where c.post_id= $pid");
                          $data = array();
                           while($row=$res->fetch_array(MYSQLI_ASSOC)){
                               $data[]=$row;
                           }
                            return $data;
                            print_r($data);
                      }
                      
                      public function getsingle($id)
                       {
                           

                           $query="SELECT * from comment_info Where id ='$id' ";
                           $res = mysqli_query($this->dbconnect,$query);
                           
                           return $res->fetch_array(MYSQLI_ASSOC);
                           
                           
                       }
                       
                       public function delete($id)
                       {
                           
                           $query="DELETE from comment_info WHERE id like '$id'";
                            $val= mysqli_query($this->dbconnect,$query);
                            header("location:view_blog.php");
                                
                       }
                       
                       public function update($id)
                       {
                           
                           $description=$_POST['description'];
                           $query="UPDATE comment_info SET description='$description' WHERE id='$id'";
                           mysqli_query($this->dbconnect,$query);
                          // header('Location: ' . $_SERVER['HTTP_REFERER']);
                       }
}
?>
