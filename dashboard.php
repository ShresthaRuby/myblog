<?php 
    session_start();
    include('db_view.php');
    $con=new db2();
    $row=$con->fetch4();
    
     include('db_cat.php');
    $con1=new db1();
    $arr=$con1->fetch();
     if(isset($_SESSION['username']))
     {
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
						<h3>Dashboard</h3>
						</header>
						<ul>
                                                 <li>Welcome <?php echo $_SESSION['username'];?></li>    
						<li><a href="view.php">View All   </a></li>
                                                <li><a href="blog_post.php">Post Blog</a></li>
                                                <li><a href="view_cat.php">Blog Categories</a></li>
                                                <li><a href="pagination.php">View blogs</a></li>
                                                   <li><a href="logout.php">Logout   </a></li>
                                                </ul>
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
       <?php  foreach ($row as $r) :?>
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
   <?php    endforeach;?>	
    	
</div>
		<div class="pagination">
                    <h4 align="center">copyright.</h4>
<!--			<div class="pages">
			<div class="current">1</div>
			<a href="#" class="inactive"> 2 </a>
			<a href="#" class="inactive"> 3</a>
			</div>-->
		</div>
	
	<footer class="main_footer">
		
	</footer>
		<div id="clear"></div>
</div>
</body>
</html>
<?php 
    }
    
    else 
        {
             header("location:login.php");
    }
 ?>

