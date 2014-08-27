<?php
require_once('ImageManipulator.php');
   class db2
   {
                        var $host='localhost';
			var $user='root';
			var $database='ruby';
			var $password='';
			public $dbconnect;
			

			public function __construct()
			{
				$this->dbconnect=mysqli_connect($this->host,$this->user,$this->password,$this->database);
                           
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

                       public function insert()
                       {
                           session_start();
                                    $title = $_POST['title'];
                                    $catid = $_POST['category'];
                                    $description = $_POST['blog'];
                                    $name=$_SESSION['uid'];
                                    $image = $this->upload_page_image();
                                    $published=$_POST['published'];
                                     $featured=$_POST['featured'];
                                     $date=date("Y/m/d");
                                    
                                   
                                  mysqli_query($this->dbconnect,"INSERT INTO post_info (id,title,cat_id,user_id,description,created_at,image,published,featured) values(NULL,'$title','$catid','$name','$description','$date','$image','$published','$featured')");
                               echo 'Data inserted successfully';
                             header("location:view_blog.php");
                       }
                       public function fetchid($id)
                       {
                           $query="SELECT * from post_info where cat_id=$id";
                           $res = mysqli_query($this->dbconnect,$query);
                           $data = array();
                           while($row=$res->fetch_array(MYSQLI_ASSOC)){
                               $data[]=$row;
                           }
                            return $data;
                            
                       }
                       public function fetch()
                       {
                           $query="SELECT * from post_info  ";
                           $res = mysqli_query($this->dbconnect,$query);
                           $data = array();
                           while($row=$res->fetch_array(MYSQLI_ASSOC)){
                               $data[]=$row;
                           }
                            return $data;
                            
                       }
                       public function fetch4()
                       {
                           $query="SELECT * from post_info  WHERE published=1 and featured=1 ORDER BY  created_at DESC limit 0,4";
                           $res = mysqli_query($this->dbconnect,$query);
                           $data = array();
                           while($row=$res->fetch_array(MYSQLI_ASSOC)){
                               $data[]=$row;
                           }
                            return $data;
                            
                       }
                       
                       public function fetchj($a)
                       {
                            $res= mysqli_query($this->dbconnect,"SELECT a.name,b.created_at,c.Name FROM category_info c,post_info b,user_info a  WHERE a.id=b.user_id AND c.id=b.cat_id AND b.id=$a");
                             return $res->fetch_array(MYSQLI_ASSOC);
                            
                           
                       }
                       public function fetch1($k,$dis)
                       {

                       $res= mysqli_query($this->dbconnect,"Select * from post_info LIMIT $k,$dis ");
                      
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
                           header("location:view_blog.php");
                           
                           
                       }
                       
                       public function getsingle($id)
                       {
                           

                           $query="SELECT * from post_info as p INNER JOIN user_info as u on p.user_id = u.id Where p.id =$id ";
                           $res = mysqli_query($this->dbconnect,$query);
                           
                           return $res->fetch_array(MYSQLI_ASSOC);
                           
                           
                       }
                       
                       public function delete($id)
                       {
                           
                           $query="DELETE from post_info WHERE id like '$id'";
                            $val= mysqli_query($this->dbconnect,$query);
                            header("location:view_blog.php");
                           
                           
                       }
                        public function count()
                       {
                           
                           
                           $val= mysqli_query($this->dbconnect,"SELECT * from post_info");
                           $row=  mysqli_num_rows($val);
                           return $row;
                           
                           
                       }
                         public function update($id)
                       {
                           session_start();
                                    $title = $_POST['title'];
                                    $catid = $_POST['category'];
                                    $description = $_POST['blog'];
                                    $name=$_SESSION['uid'];
                                    $image=$this->upload_page_image();
                                    $published=$_POST['published'];
                                     $featured=$_POST['featured'];
                                     $date=date("Y/m/d");
                                    
                                  if(empty($image)) 
                                  {
                                      mysqli_query($this->dbconnect,"UPDATE post_info SET title='$title',cat_id='$catid',user_id='$name',description='$description',created_at='$date',published='$published',featured='$featured' WHERE id=$id ") ;
                                  }
                                else {
                                  mysqli_query($this->dbconnect,"UPDATE post_info SET title='$title',cat_id='$catid',user_id='$name',description='$description',created_at='$date',image='$image',published='$published',featured='$featured' WHERE id=$id ") ;
                               echo 'Data inserted successfully';
                                }
                             header("location:view_blog.php");
                       }
                       
         }
         

?>



