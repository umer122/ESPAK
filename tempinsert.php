<?php
error_reporting(0);
include_once('dbdb.php');
if(isset($_POST['btn_data'])){
unset($_POST['btn_data']);  
$titles=$_POST['title'];
$links=$_POST['link'];
$emails=$_POST['email'];
$total=count($titles);
for($i=0; $i < $total; $i++){
$insert_que="INSERT INTO `posts` SET title='$titles[$i]',link='$links[$i]',email='$emails[$i]'";
$dbConnection->exec($insert_que);
}
header("Location:indexx.php?msg=Update Successfully");
}
?>