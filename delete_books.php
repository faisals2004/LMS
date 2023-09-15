<?php
include('includes/dbconnection.php');
$id=$_GET['id'];
mysqli_query($conn,"update tblbook set status = 'Archive' where book_id='$id'")or die();
header('location:book.php');
?>