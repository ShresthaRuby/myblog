<html>
    <body>
        <table border="1">
            
            <?php
            session_start();
                include ('db_user.php');
                $con=new db();
                $a=$_SESSION['uid'];
                if($a=='')
                {
                    header("location:login.php");
                }   
                    
                $user=$con->getuser($a);
                $connection=new db();
                       
                  $type=$user['Usertype'];
                 
        if ($type=='Admin'){
            ?>
            <tr>
                <td>Id</td>
                <td>Name</td>
                 <td>Password</td>
                  <td>Address</td>
                   <td>Gender</td>
                    <td>User Type</td>
                     <td>Email</td>
                     <td>Image</td>
                     <td colspan="2">Action</td>
            </tr>
            <?php
            $a=$connection->fetch();
            foreach($a as $r):
               ?>
            <tr>
                            <td><?php echo $r['Id'];?></td>
                            <td><?php echo $r['Name'];?></td>
                            <td><?php echo $r['Password'];?></td>
                            <td><?php echo $r['Address'];?></td>
                            <td><?php echo $r['Gender'];?></td>
                            <td><?php echo $r['Usertype'];?></td>
                            <td><?php echo $r['Email'];?></td>
                            <td><img src="images/page_images_<?php echo $r['image'];?>"></td>
                            <td><a href="edit.php?id=<?php echo $r['Id'];?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $r['Id'];?>">Delete</a></td>
            </tr>
            <?php endforeach;
        }
            
            else if ($type=='User'){
            ?>
            <tr>
                <td>Id</td>
                <td>Name</td>
                 <td>Password</td>
                  <td>Address</td>
                   <td>Gender</td>
                    <td>User Type</td>
                     <td>Email</td>
                     <td>Image</td>
                     <td colspan='2'>Action</td>
                     
            
            <tr>
                            <td><?php echo $user['Id'];?></td>
                            <td><?php echo $user['Name'];?></td>
                            <td><?php echo $user['Password'];?></td>
                            <td><?php echo $user['Address'];?></td>
                            <td><?php echo $user['Gender'];?></td>
                            <td><?php echo $user['Usertype'];?></td>
                            <td><?php echo $user['Email'];?></td>
                            <td><img src="images/page_images/<?php echo $r['image'];?>" height="100" width="100"></td>
                            <td><a href="edit.php?id=<?php echo $user['Id'];?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $user['Id'];?>">Delete</a></td>
            </tr>
            
           <?php }
        ?>
        </table>
    </body>
</html>
     