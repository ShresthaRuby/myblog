<html>
    <body>
        <table border="1">
            
            <?php
            session_start();
                include ('db_user.php');
                $con=new db();
                $a=$_SESSION['username'];
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
                            <td><a href="edit.php?id=<?php echo $r['Name'];?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $r['Name'];?>">Delete</a></td>
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
                            
            </tr>
            <?php endforeach;
            }
        ?>
        </table>
    </body>
</html>
     