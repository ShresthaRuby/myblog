<!DOCTYPE html >
<?php 
session_start();
include ('db_user.php');
        $connection = new db();
        if (isset($_POST['submit'])) 
        {
                $data = $connection->retrieve();
        }
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

	
		<div class="form" >	
			<form name="login_form" method="post" style="margin-top:1em;">
			<header><h1>LOGIN</h1></header>
<!--                        <div>   
                            <font color='#FF0000'>
                                <?php if(!empty($_SESSION['msg'])){ echo $_SESSION['msg'];}  ?>
                        </div>-->
			<div class="formInputWrapper">
				<div class="formIcon"><i class="fa fa-user fa-2x"></i></div>
					<div class="formInput">
						<input type="text" name="username" id="keyword" autocomplete="off" tabindex="1" placeholder="username" required />
					</div>
					<br>
				<div class="clear"></div>
			</div>
			
			<div class="formInputWrapper">
				<div class="formIcon"><i class="fa fa-lock fa-2x"></i></div>
					<div class="formInput">
						<input type="password" name="password" id="keyword" autocomplete="off" tabindex="1" placeholder="password" required />
					</div>
				<div class="clear"></div>
			</div>
					<div id="clear"></div>
					<input type="submit" class="button" value="log in" name="submit">
                                        <form>
					<button type="button" class="button">
						<a href="register.php">new user?</a>
					</button>
                                        </form>
			</form>	
				<div class="clear"></div>	
		</div>	
	
   	<footer class="main_footer">
		<h4>copyright.</h4>
	</footer>
		<div id="clear"></div>
</div>
</body>
</html>

