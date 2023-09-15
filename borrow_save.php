	<?php
 	include('includes/dbconnection.php');
	
		$id=$_POST['selector'];
 	$ID  = $_POST['ID'];
	$due_date  = $_POST['due_date'];

	if ($id == '' ){ 
	header("location: borrow.php");
	?>
	

	<?php }else{
	


	mysqli_query($conn,"insert into borrow (ID,date_borrow,due_date) values ('$ID',NOW(),'$due_date')")or die();
	$query = mysqli_query($conn,"select * from borrow order by borrow_id DESC")or die();
	$row = mysqli_fetch_array($query);
	$borrow_id  = $row['borrow_id']; 
	

$N = count($id);
for($i=0; $i < $N; $i++)
{
	 mysqli_query($conn,"insert borrowdetails (book_id,borrow_id,borrow_status) values('$id[$i]','$borrow_id','pending')")or die();

}
header("location: borrow.php");
}  
?>
	
	

	
	