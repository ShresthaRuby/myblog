<html>
    <body>
        <table border='1'>
            <tr>
                <td>Category Id</td>
                <td>Category Name</td>
                <td colspan='2'>Action</td>
            </tr>

<?php
include ('db_cat.php');
$con=new db1();
$arr=$con->fetch();
foreach ($arr as $r):
?>
            <tr>
                <td><?php echo $r['id'];?></td>
                <td><a href="blogcat.php?id=<?php echo $r['id'];?>"><?php echo $r['Name'];?></a></td>
                <td><a href='edit_cat.php?id=<?php echo $r['id'];?>'>Edit</a>
                <td><a href='delete_cat.php?id=<?php echo $r['id'];?>'>Delete</a>
            </tr>
            <?php endforeach;?>
            <a href="insert_cat.php">Add new category?</a>
</html>