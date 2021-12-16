<form action="" method="post">
    <?php 
    $n  = $_POST['n'];
    for($i=1;$i<=$n;$i++)
    {
    ?>
        Enter name:
        <input type="text" name="<?php echo $i. 'nm' ; ?>" value="">
        <input type="hidden" name="n" value="<?php echo $n ; ?>">
        <br>
    <?php
    }
    ?>
    <input type="submit" name="ins" value="save">
</form>
<?php
if(isset($_POST['ins']))
{
    require('../connection/connection.php');
    $n = $_POST['n'];
    for($i=1;$i<$n;$i++){
        $nm = $_POST[$i. "nm"];
        $phone =$_POST['phone'];
        $sql = ("insert into t1 (name,phone) values ($nm,$phone)");
        $ok  =sqlsrv_query($conn , $sql );
    }
    echo "oh okkk";
}