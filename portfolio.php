<?php 
 
 include('db_cat.php');
   $con1=new db1();
$arr=$con1->fetch();
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
