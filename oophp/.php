
<html>
    <body>
        <table border='1'>
            <?php
            include ('database_lib.php');
            $con = new db;
            $result = $con->fetch();
            foreach ($result as $r):
                ?>
<tr> 
<td><?php echo $r['Name'];?></td>    
<td><?php echo $r['Password'];?></td>
<td><?php echo $r['Address'];?></td>
<td><?php echo $r['Gender'];?></td>
<td><?php echo $r['Usertype'];?></td>
<td><?php echo $r['Email'];?></td>
<td><a href="edit.php?id=<?php echo $r['Name'];?>">Edit</a></td>
<td><a href="delete.php?id=<?php echo $r['Name'];?>">Delete</a></td>

</tr>


<? endforeach; ?>

    </body>
</html>


