<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{  
   if(isset($_POST['submit']))
  {
 $cname=$_POST['ename'];
 $section=$_POST['designation'];
$sql="insert into tblemployee(EmployeeName,Designation)values(:ename,:designation)";
$query=$dbh->prepare($sql);
$query->bindParam(':ename',$cname,PDO::PARAM_STR);
$query->bindParam(':designation',$section,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Employee has been added.")</script>';
echo "<script>window.location.href ='add-emply.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Library  Management System|| Add Employee</title>
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
              <h3 class="page-title"> Add Employee </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Employee</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Employee</h4>
                   
                    <form class="forms-sample" method="post">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Employee Name</label>
                        <input type="text" name="ename" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Designation</label>
                        <select  name="designation" class="form-control" required='true'>
                          <option value="">Choose Section</option>
                          <option value="Librarian">Librarian</option>
                          <option value="Library Clerk">Library Clerk</option>
                          <option value="Library Technician">Library Technician</option>
                          <option value="Library Associate">Library Associate</option>
                          <option value="Library Assistant">Library Assistant</option>
                          <option value="Library Technical Assistant">Library Technical Assistant</option>
                          <option value="Library Services Assistant">Library Services Assistant</option>
                          <option value="Library Specialists">Library Specialists</option>
                          <option value="Library Information Specialists">Library Information Specialists</option>
                          <option value="Accounts Holder">Accounts Holder</option>
                          <option value="Sweeper">Sweeper</option>
                          <option value="Membernship Holder">Membernship Holder</option>
                          <option value="Manager">Manager</option>
                          <option value="Audio Visual Technician">Audio Visual Technician</option>
                          <option value="Special Assistant">Special Assistant</option>
                          <option value="Security Guard">Security Guard</option>
                          <option value="Sweeper">Sweeper</option>
                          <option value="Naib Qasid">Naib Qasid</option>
                          <option value="Peon">Peon</option>
                          <option value="Mali">Mali</option>
                          <option value="Chowkidar">Chowkidar</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
</html><?php }  ?>