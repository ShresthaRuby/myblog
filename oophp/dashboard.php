 <?php
 session_start();
 if(!isset($_SESSION['user'])){
//    echo "<html>";
//    echo "<body>";
// 
//  echo"<a href='view.html'>View Profile</a>";
//  echo"<a href='logout.php'>Logout</a>";
// 
// echo"</body>";
// echo"</html>";

 }
 else
 {
 header("location:login.html");
 }
 ?>

 <html>
 <body>
 
  <a href="view.php">View Profile</a>
  <a href="logout.php">Logout</a>
 
 </body>
 </html>
