<?php
session_start();
include ('db_cat.php');
include ('db_view.php');
$con=new db2();
if(!isset($_SESSION['uid']))
{
    header('location:login.php');
}   

$id=$_GET['id'];

if(empty($id))
{
    header('location:404.php');
}
$arr=$con->getsingle($id);
$cid=$arr['cat_id'];

$connection= new db1();
$ar=$connection->fetch();

if(isset($_POST['submit']))
{
    $con->upload_page_image();
    $con->update($id);
}



?>

<html>
    <body>
    <form method='post'enctype="multipart/form-data">
        Title:<input type='text' name='title' value='<?php echo $arr['title'];?>'><br/>
        Blog content:<textarea name='blog' rows='20' cols='50' name='blog'><?php echo $arr['description'];?></textarea> <br/>
        Image: <input type='file' name='image1'><br/>
        Category:<select name='category'>
            <?php foreach($ar as $r):?>
                 <option value="<?php echo $r['id'];?>" <?php if($r['id']==$cid){?> selected="selected" <?php }?>" ><?php echo $r['Name'];?></option>
            <?php endforeach;?>
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

