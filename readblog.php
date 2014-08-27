<html>
    <body>
        
<?php
session_start();
include('db_view.php');
include('db_comment.php');
include('db_user.php');
$uname=$_SESSION['username'];
$uid=$_SESSION['uid'];
$connection=new db();
$user=$connection->getuser($uid);

$blogid=$_GET['id'];
if(!isset($_SESSION['uid']))
{
    header('location:login.php');
}
if(empty($blogid))
{
    header('location:404.php');
}

$con=new db2();
$arr=$con->getsingle($blogid);
$uidd=$arr['user_id'];
$image=$arr['image'];

$connect=new db3();
$val=$connect->fetch($blogid);
if (isset($_POST['submit'])) 
{
    $data = $connect->insert($blogid);
}

?>
  <?php if($user['Usertype']=='Admin')      {?>
            <p>
                <b>  <?php echo $arr['title'];?> </b><br/>
                <img height="200" width="200" src="images/page_images/<?php echo $image;?>"><br/>
                <?php echo $arr['description'];?> <br/>
                
                <font color="#0000FF" >  <b>Posted by :</font></b> <?php echo $arr['Name'];?><br/>
                
                <a href="edit_blog.php?id=<?php echo $blogid;?>">Edit</a>
                <a href="delete_blog.php?id=<?php echo $blogid;?>">Delete</a>
                <br/>
                <br/>
                <b>Comments</b>
             <table border="1">
                 <?php foreach($val as $r):?>
                 <tr>
                     <td><?php echo $r['description'];?><br/>Comment by:<img height="50" width="50" src="images/page_images/<?php echo $r['image'];?>"><?php echo $r['Name'];?></td> 
                     <td><a href="edit_comment.php?id=<?php echo $r['id'];?>&blogid=<?php echo $blogid;?>">Edit</a></td>
                     <td><a href="delete_comment.php?id=<?php echo $r['id'];?>&blogid=<?php echo $blogid;?>">Delete</a></td>
                 </tr>
                 <?php  endforeach; ?>
             </table>
            <form method="post">
                <textarea rows="5" cols="10" placeholder="Enter your comment here." name="comment"></textarea>
                <input type="submit" value="Add comment" name="submit"/>
            </form>
                
            </p>
                <?php }
            else if($user['Usertype']=='User'){
            
                if($uidd==$uid){
                
                ?>
                <p>
                    <b>  <?php echo $arr['title'];?> </b><br/>
                    <img height="200" width="200" src="images/page_images/<?php echo $image;?>"><br/>
                    <?php echo $arr['description'];?> <br/>

                    <font color="#0000FF" >  <b>Posted by :</font></b> <?php echo $arr['Name'];?>
                    <br/>
                    <a href="edit_blog.php?id=<?php echo $id;?>">Edit</a>
                    <a href="delete_blog.php?id=<?php echo $id;?>">Delete</a>
                    <br/>
                    <b>Comments</b>
                 <table border="1">
                     <?php foreach($val as $r):?>
                     <tr>
                         <td><?php echo $r['description'];?><br/>Comment by:<img height="50" width="50" src="images/page_images/<?php echo $r['image'];?>"><?php echo $r['Name'];?></td> 
                         <?php if($uid==($r['user_id'])){ ?>
                              <td><a href="edit_comment.php?id=<?php echo $r['id'];?>&blogid=<?php echo $blogid;?>">Edit</a></td>
                     <td><a href="delete_comment.php?id=<?php echo $r['id'];?>&p=<?php echo $id;?>&blogid=<?php echo $blogid;?>">Delete</a></td>
                        <?php }
                             ?>
                     </tr>
                     <?php  endforeach; ?>
                 </table>
                <form method="post">
                    <textarea rows="5" cols="10" placeholder="Enter your comment here." name="comment"></textarea>
                    <input type="submit" value="Add comment" name="submit"/>
                </form>

                </p>
                    <?php  } 
                
                else {?>
                         <p>
                    <b>  <?php echo $arr['title'];?> </b><br/>
                    <img height="200" width="200" src="images/page_images/<?php echo $image;?>"><br/>
                    <?php echo $arr['description'];?> <br/>

                    <font color="#0000FF" >  <b>Posted by :</font></b> <?php echo $arr['Name'];?>
                    <br/>

                    <br/>
                    <b>Comments</b>
                 <table border="1">
                     <?php foreach($val as $r):?>
                     <tr>
                         <td><?php echo $r['description'];?><br/>Comment by:<img height="50" width="50" src="images/page_images/<?php echo $r['image'];?>"><?php echo $r['Name'];?></td> 
                         <?php if($uid==($r['user_id'])){ ?>
                              <td><a href="edit_comment.php?id=<?php echo $r['id'];?>&blogid=<?php echo $blogid;?>">Edit</a></td>
                     <td><a href="delete_comment.php?id=<?php echo $r['id'];?>&blogid=<?php echo $blogid;?>">Delete</a></td>
                        <?php }?>
                     </tr>
                     <?php  endforeach; ?>
                 </table>
                <form method="post">
                    <textarea rows="5" cols="10" placeholder="Enter your comment here." name="comment"></textarea>
                    <input type="submit" value="Add comment" name="submit"/>
                </form>

                </p>

              <?php  }
                } ?>
           
            
    </body>
</html>