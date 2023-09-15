
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Library  Management System|| View Borrow</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- End layout styles -->
    
  </head>
  <body>
  <style>
/* default styling. Nothing to do with freexing first row and column */
main {display: flex;}
main > * {border: 1px solid;}
table {border-collapse: collapse; font-family: helvetica}
td, th {border:  1px solid;
      padding: 10px;
      min-width: 50px;
      background: white;
      box-sizing: border-box;
      text-align: left;}
.table-container {
  position: relative;
  max-height:  300px;
  width: 1050px;
  overflow: scroll;}
thead th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
  color: white;
  background-color: #181824;}
thead th:first-child {
  left: 0;
  z-index: 3;
  background-color: #181824;}
tfoot {
  position: -webkit-sticky;
  bottom: 0;
  z-index: 2;}
tfoot td {
  position: sticky;
  bottom: 0;
  z-index: 2;
  background: hsl(20, 50%, 70%);}
tfoot td:first-child {
  z-index: 3;}
tbody {
  overflow: scroll;
  height: 100px;}
/* MAKE LEFT COLUMN FIXEZ */
tr > :first-child {
  position: -webkit-sticky;
  position: sticky; 
  color: white;
  left: 0; 
  background-color: #181824;
}
/* don't do this */
tr > :first-child {
  box-shadow: inset 0px 1px black;
}
.btn {
  display: flex;
  
  border-radius: 30px;
}
</style>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">View Borrow </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Borrow</li>
                </ol>
              </nav>
            </div>
   		
						<div class="alert alert-info"><strong>Borrowed Books</strong></div>
       
    <!--
  <table>
    <thead>
      <tr><th>Fixed Header</th></tr>
    </thead>
    <tbody>
       <tr>                             <th>Book title</th>                                 
                                        <th>Borrower</th>                                 
                                        <th>Year Level</th>                                 
                                        <th>Date Borrow</th>                                 
                                        <th>Due Date</th>                                
                                        <th>Date Returned</th>
										<th>Borrow Status</th>	
                    <th>Return</th>
                                    </tr>
    </tbody>
    <tfoot>
      <tr><td>Fixed Footer</td></tr>
    </tfoot>
  </table> -->

 
    <table>
      
                                <thead>
                                    <tr>
                                        <th>Book title</th>                                 
                                        <th>Borrower</th>                                 
                                        <th>Year Level</th>                                 
                                        <th>Date Borrow</th>                                 
                                        <th>Due Date</th>                                
                                        <th>Date Returned</th>
										<th>Borrow Status</th>
                    <th>Return</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php  $user_query=mysqli_query($conn,"select * from borrow
								LEFT JOIN tblstudent ON borrow.ID = tblstudent.ID
								LEFT JOIN borrowdetails ON borrow.borrow_id = borrowdetails.borrow_id
								LEFT JOIN tblbook on borrowdetails.book_id =  tblbook.book_id 
								ORDER BY borrow.borrow_id DESC
								  ")or die();
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['borrow_id'];
									$book_id=$row['book_id'];
									$borrow_details_id=$row['borrow_details_id'];
				
									?>
									<tr class="del<?php echo $id ?>">
									
									                              
                                    <td><?php echo $row['book_title']; ?></td>
                                    <td><?php echo $row['StudentName']." ".$row['lastname']; ?></td>
                                    <td><?php echo $row['StudentClass']; ?></td>
									<td><?php echo $row['date_borrow']; ?></td> 
                                    <td><?php echo $row['due_date']; ?> </td>
									<td><?php echo $row['date_return']; ?> </td>
									<td><?php echo $row['borrow_status'];?></td>
									<td> <a id="<?php echo $borrow_details_id; ?>"  href="return_save.php<?php echo '?id='.$id; ?>&<?php echo 'book_id='.$book_id; ?>"  class="btn btn-success"><i class="icon-check icon-large"></i>Return</a></td>
                                     
                                    </tr>
									<?php  }  ?>
                  </tbody>
    </table>
          
	
<script>		
$(".uniform_on").change(function(){
    var max= 3;
    if( $(".uniform_on:checked").length == max ){
	
        $(".uniform_on").attr('disabled', 'disabled');
		         alert('3 Books are allowed per borrow');
        $(".uniform_on:checked").removeAttr('disabled');
		
    }else{

         $(".uniform_on").removeAttr('disabled');
    }
})
</script>		
          </div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<?php include_once('includes/footer.php');?>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/select2/select2.min.js"></script>
<script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="js/typeahead.js"></script>
<script src="js/select2.js"></script>
<!-- End custom js for this page -->
</body>
</html>