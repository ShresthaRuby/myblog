<?php   
 include('db_cat.php');
   $con1=new db1();
$arr=$con1->fetch();
include ('db_view.php');
$id=$_GET['page'];
$con = new db2();
//$arr1=$con->fetchid($id);
$dis=4;
$total=$con->count();
$total_page=ceil($total/$dis);
$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;
        $arr1=$con->fetch1($k,$dis);
  
	
?>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="x-UA-compatible " content="IE=edge"/>
			<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>MY BLOG</title>
	<link rel="stylesheet" href="css/blog_style.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
	
</head>

<body>

	<div id="wrapper">
	<?php
                    include '_nav.php';
        
        ?>
		
		
		<div id="clear"></div>
				<aside class="categories">
						<div class="left_box">
                                                       

						<header>
						<h3>categories</h3>
						</header>
						<ul>
                                                     <?php foreach ($arr as $r):?>
						<li><img src="css/images/list.png"/><a href="blogcat.php?id=<?php echo $r['id'];?>"> <?php echo $r['Name'];?></a> 
						<?php                                                    endforeach;?>?
                                                    </div>
						
					<div class="left_box2">	
						<header><h4>Share with</h4></header>
						<ul>
						
							<li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook-square fa-2x"> </i></a></li>
					
					
							<li><a href="http://www.twitter.com"target="_blank" ><i class="fa fa-twitter-square fa-2x"> </i></a></li>
					
					
							<li><a href="http://www.linkedin.com"target="_blank"><i class="fa fa-linkedin-square fa-2x"> </i></a></li>
					
							<li><a href="http://www.tumblr.com"target="_blank"><i class="fa fa-tumblr-square fa-2x"> </i></a></li>
					
							<li><a href="http://www.googleplus.com"target="_blank"><i class="fa fa-google-plus-square fa-2x"> </i></a></li>
						</ul>					
					</div>					
					<div class="clear">
					</div>
					
				</aside>
	
						
	<div class="right">
            <?php foreach($arr1 as $r):?>
            <div class="right_up">
               <header>
		 <h1><?php echo $r['title'];?></h1>
		</header> 
		<img src="images/page_images/<?php echo $r['image'];?>"/>
		 <p><?php echo $r['description'];?><br>
                     <a href="readblog.php?id=<?php echo$r['id']?>" style="color:blue; text-decoration:none; ">see more</a></p>
         <br>
			<ul>
                            <?php $a=$con->fetchj($r['id']);?>
				<li><i class="fa fa-toggle-down fa-2x"> </i>:<?php echo $a['Name'];?></li> <li><i class="fa fa-user fa-2x"> </i>:<?php echo $a['name'];?></li>	<li><i class="fa fa-calendar fa-2x"> </i>:<?php echo $a['created_at'];?></li>
			</ul>	
            </div>
            <?php endforeach;?>
            <div class="clear">
</div>
        </div>
                <center>
		<div class="pagination1">
                   <!--<h4 align="center">copyright.</h4>-->
			
                    <?php    if($page_cur>1)
	{
		echo '<a href="blogcat.php?page='.($page_cur-1).'" style="cursor:pointer;color:#095589;" ><input style="cursor:pointer;background-color:#095589;;border:1px black solid;border-radius:5px;width:120px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Previous "></a>';
	}
	else
	{
	  echo '<input style="background-color:#095589;border:1px black solid;border-radius:5px;width:120px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value=" Previous ">';
	}
	for($i=1;$i<$total_page;$i++)
	{
		if($page_cur==$i)
		{
			echo ' <input style="background-color:#095589;border:2px black solid;border-radius:5px;width:30px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value="'.$i.'"> ';
		}
		else
		{
		echo '<a href="blogcat.php?page='.$i.'"> <input style="cursor:pointer;background-color:#095589;border:1px black solid;border-radius:5px;width:30px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value="'.$i.'"> </a>';
		}
	}
	if($page_cur<$total_page)
	{
		echo '<a href="blogcat.php?page='.($page_cur+1).'"><input style="cursor:pointer;background-color:#095589;border:1px black solid;border-radius:5px;width:90px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Next "></a>';
	}
	else
	{
	 echo '<input style="background-color:#095589;border:1px black solid;border-radius:5px;width:90px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value="   Next ">';
	} ?>
			</div>
                </center>
		</div>
	
	<footer class="main_footer">
		
	</footer>
		<div id="clear"></div>
</div>
</body>
</html>
