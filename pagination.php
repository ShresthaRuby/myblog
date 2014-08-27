<html>
    <body>
<table height="200px" style="border:3px black solid;border-radius:5px" width="550px">
<tr>
<th colspan="2" height="40px" style="border-bottom:3px black solid">Blogs</th>
</tr>
<?php

        include('db_view.php');
        include('db_comment.php');
        $connection=new db3();
	$connect=new db2();
	$row=$connect->fetch();
	$total=$connect->count();
        //echo $total; die();
	$dis=4;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;
        $ros=$connect->fetch1($k,$dis);
  
	foreach($ros as $r):
        
           
                
            
	 ?>
         
        <tr>
            <td><a href='readblog.php?id=<?php echo $r['id'];?>'><?php echo $r['title']?></a></td>
            <td><?php echo $connection->count($r['id']);?>&nbsp;Comments</td>
        </tr>
<?php 
         endforeach;
        
	echo '<br/>';
	if($page_cur>1)
	{
		echo '<a href="pagination.php?page='.($page_cur-1).'" style="cursor:pointer;color:green;" ><input style="cursor:pointer;background-color:green;border:1px black solid;border-radius:5px;width:120px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Previous "></a>';
	}
	else
	{
	  echo '<input style="background-color:green;border:1px black solid;border-radius:5px;width:120px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value=" Previous ">';
	}
	for($i=1;$i<$total_page;$i++)
	{
		if($page_cur==$i)
		{
			echo ' <input style="background-color:green;border:2px black solid;border-radius:5px;width:30px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value="'.$i.'"> ';
		}
		else
		{
		echo '<a href="pagination.php?page='.$i.'"> <input style="cursor:pointer;background-color:green;border:1px black solid;border-radius:5px;width:30px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value="'.$i.'"> </a>';
		}
	}
	if($page_cur<$total_page)
	{
		echo '<a href="pagination.php?page='.($page_cur+1).'"><input style="cursor:pointer;background-color:green;border:1px black solid;border-radius:5px;width:90px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Next "></a>';
	}
	else
	{
	 echo '<input style="background-color:green;border:1px black solid;border-radius:5px;width:90px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value="   Next ">';
	}
?>
</table>
    </body>
</html>