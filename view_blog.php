<html>
    <table>
        <?php 
        include ('db_view.php');
        include('db_comment.php');
        $con=new db2();
        $arr=$con->fetch();
        $connect = new db3();
        //$val=$connect->count($pid)
        foreach($arr as $r ):
        ?>
        <tr>
            <td><a href='readblog.php?id=<?php echo $r['id'];?>'><?php echo $r['title']?></a></td>
            <td><?php echo $connect->count($r['id']);?>&nbsp;Comments</td>
        </tr>
        <?php  endforeach;?>
    </table>
</html>
