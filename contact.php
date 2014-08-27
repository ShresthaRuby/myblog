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
		<div class="right_up">
	
			<h1>Contact Us</h1>

        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem </p><p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
		
		
			<form name="contact" method="post" action="#">
				<div class="formInputWrapper">
					<div class="formIcon">Name</div><br><br>
						<div class="formInput">
						<input type="text" name="username" id="keyword" autocomplete="off" tabindex="1" placeholder="Name" required />
						</div>
					<div class="clear"></div>
				</div>
			
				<div class="formInputWrapper">
					<div class="formIcon">e-mail</div><br><br>
						<div class="formInput">
						<input type="email" name="username" id="keyword" autocomplete="off" tabindex="1" placeholder="email" required />
						</div>
					<div class="clear"></div>
				</div>
				<div class="formInputWrapper">
					<div class="formIcon">message</div><br><br>
						<div class="formInput">
							<textarea></textarea>
						</div>
				</div>		
					<div id="clear"></div>
					<input type="submit" class="button" value="post">
					
					</form>	
</div>	
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
