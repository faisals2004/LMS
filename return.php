
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('session');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Library  Management System|| Return</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
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
              <h3 class="page-title"> Return Books </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Return Books</li>
                </ol>
              </nav>
            </div>
          
           


    <div class="container">
		<div class="margin-top">
			<div class="row">	
				<div class="span12">		
          <div class="alert alert-info"><strong>Borrowed Books</strong></div>
          <a href="" onclick="printTable('mytable')" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
                            <table id="mytable" cellpadding="0" cellspacing="0" border="0" class="table" id="example">
								<div class="pull-right">
								</div>
                                <thead>
                                    <tr>
                                        <th>Book title</th>                                 
                                        <th>Borrower</th>                                 
                                        <th>Year Level</th>                                 
                                        <th>Date Borrow</th>                                 
                                        <th>Due Date</th>                                
                                        <th>Date Returned</th>

                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php  $user_query=mysqli_query($conn,"select * from borrow
								LEFT JOIN tblstudent ON borrow.ID = tblstudent.ID
								LEFT JOIN borrowdetails ON borrow.borrow_id = borrowdetails.borrow_id
								LEFT JOIN tblbook on borrowdetails.book_id =  tblbook.book_id 
								where borrowdetails.borrow_status = 'returned'ORDER BY borrow.borrow_id DESC
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
                                  
                                    </tr>
									<?php  }  ?>
                                </tbody>
                            </table>
        
        
		
        </div>
    
    
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
    </div>
    </div>
    </div>
      
    <script>
          function printTable(tableId) {
  var printContents = document.getElementById(tableId).outerHTML;
  var originalContents = document.body.innerHTML;

  // Replace the current page content with the table you want to print
  document.body.innerHTML = printContents;

  // Print the table
  window.print();

  // Restore the original page content
  document.body.innerHTML = originalContents;
}
</script>

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