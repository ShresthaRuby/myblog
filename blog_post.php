<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location:login.php');
}
include ('db_cat.php');
include ('db_view.php');
$con=new db1();
$arr=$con->fetch();

if(isset($_POST['submit']))
{
    
    $connect=new db2();
    $connect->insert();
    $connect->upload_page_image();
}
?>

<html>
    <body>
    <form method='post'enctype="multipart/form-data">
        Title:<input type='text' name='title' placeholder='Enter the title of your blog'><br/>
        Blog content:<textarea name='blog' rows='20' cols='50' name='blog' placeholder="Enter your text here"></textarea> <br/>
        Image: <input type='file' name='image1'><br/>
        Category:<select name='category'>
            <?php foreach($arr as $r):?>
                 <option value="<?php echo $r['id'];?>"><?php echo $r['Name'];?></option>
            <?php endforeach?>
        </select> 
        <br/>
       Do you want to publish it now?<select name='published'>
           <option value='0'>No</option>
           <option value='1'>Yes</option>
       </select><br/>
       Do you want to feature it now?<select name='featured'>
           <option value='0'>No</option>
           <option value='1'>Yes</option>
       </select>
        <input type='submit' value='post' name='submit'>
        <br/>
    </form>
    </body>
</html>
