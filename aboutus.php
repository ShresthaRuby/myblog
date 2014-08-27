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
        <h1>About Us</h1>
            <p align="justify">Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow">CSS</a>. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent aliquam velit a magna sodales quis elementum ipsum auctor. Ut at metus leo, et dictum sem</p>
            
            <div id="clear"></div>
			</div>
        
            <div class="right_up">
                <h1>Lorem ipsum dolor sit amet</h1>
                    <a href="#"><img src="css/images/twitter.png" alt="chart 1"></a>                
          
                    <p align="justify">Curabitur ullamcorper neque et justo aliquet at pretium orci  scelerisque. Mauris sodales tristique dignissim. Phasellus ut augue  nibh. <a href="#">Aliquam vel libero</a> sit amet mauris posuere ullamcorper  sollicitudin ac eros. Vestibulum auctor euismod mi et tincidunt. </p>
             
                	<div class="ol">
					<ol>
                        <li>Fusce fringilla, dui sed blandit luctus, arcu augue pellentesque</li>
                  		<li>Sed fermentum arcu in enim euismod quis lobortis </li>
                        <li>Class aptent taciti sociosqu ad litora torquent </li>
                        <li>Praesent libero nisi, pellentesque in sagittis ac</li>
                        <li>Nunc eget erat urna. <a href="#">Sed ac ante lacus</a>, eu scelerisque urna</li>
					</ol>
				
					</div>
                <div id="clear"></div>
				</div>
				
				
            
            <div class="right_up">
            
            <h1>Morbi sed nulla ac est cursus suscipit</h1>
            
               
                  <a href="#"><img src="images/chart2.png" alt="chart 2"></a>               
          		
                    <p>Phasellus diam orci, rhoncus sed condimentum et, sodales vel leo. Nunc  dignissim quam a nisi placerat gravida. Suspendisse potenti. <a href="#">Curabitur  suscipit lacus</a> vestibulum mi accumsan bibendum. Vivamus gravida, dui  eget tincidunt rutrum, ante justo malesuada lacus.</p>
                 
               		<div class="ol">
						<ol>
							<li>Praesent libero nisi, pellentesque in sagittis ac</li>
							<li>Nunc eget erat urna. Sed ac ante lacus, eu scelerisque urna</li>                
							<li>Fusce fringilla, dui sed blandit luctus, <a href="#">arcu augue pellentesque</a></li>
						  <li>Sed fermentum arcu in enim euismod quis lobortis </li>
							<li>Class aptent taciti sociosqu ad litora torquent </li>
						</ol>
					</div>
					<div id="clear"></div>
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
