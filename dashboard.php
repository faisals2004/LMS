<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid'] == 0)) {
  header('location:logout.php');
} else {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>Library Management System|||Dashboard</title>
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
    <link rel="stylesheet" href="css/style.css">
    <!-- End layout styles -->
  </head>
  <body>   
      <!-- partial:partials/_navbar.html -->
      <?php include('includes/header.php'); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include('includes/sidebar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                            $sql1 ="SELECT * from  tblstudent";
                            $query1 = $dbh -> prepare($sql1);
                            $query1->execute();
                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                            $totclass=$query1->rowCount();
                            ?>
                          <span class="report-title">All Students</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="manage-students.php"><span class="report-count"> View Students</span></a>
                        </div>
                        <div class="inner-card-icon" style="background-color: teal;">
                          <i class="iconstu"></i>
                        </div>
                      </div>
                    
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                            $sql1 ="SELECT * from  tblclass";
                            $query1 = $dbh -> prepare($sql1);
                            $query1->execute();
                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                            $totclass=$query1->rowCount();
                            ?>
                          <span class="report-title">All Classes</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="manage-class.php"><span class="report-count"> View Classes</span></a>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="iconcls"></i>
                        </div>
                      </div>
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                            $sql1 ="SELECT * from  tblemployee";
                            $query1 = $dbh -> prepare($sql1);
                            $query1->execute();
                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                            $totclass=$query1->rowCount();
                            ?>
                          <span class="report-title">All Employees</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="manage-emply.php"><span class="report-count"> View Employees</span></a>
                        </div>
                        <div class="inner-card-icon" style="background-color: purple;">
                          <i class="iconemp"></i>
                        </div>
                      </div>

                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                            $sql1 ="SELECT * from  tblbook";
                            $query1 = $dbh -> prepare($sql1);
                            $query1->execute();
                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                            $totclass=$query1->rowCount();
                            ?>
                          <span class="report-title">All Books</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="book.php"><span class="report-count"> View Books</span></a>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="iconbook"></i>
                        </div>
                      </div>
                    </div>
                  </div>
         
              
                <div class="card">
                  <div class="card-body">
                  <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                            $sql1 ="SELECT * from  borrow";
                            $query1 = $dbh -> prepare($sql1);
                            $query1->execute();
                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                            $totclass=$query1->rowCount();
                            ?>
                          <span class="report-title">All Borrowed</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="view_borrow.php"><span class="report-count"> View Borrowed</span></a>
                        </div>
                        <div class="inner-card-icon bg-info">
                          <i class="iconbor"></i>
                        </div>
                      </div>           
                      
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                            $sql1 ="SELECT * from  borrowdetails";
                            $query1 = $dbh -> prepare($sql1);
                            $query1->execute();
                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                            $totclass=$query1->rowCount();
                            ?>
                          <span class="report-title">All Return</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="return.php"><span class="report-count"> View Return</span></a>
                        </div>
                        <div class="inner-card-icon bg-dark">
                          <i class="iconret"></i>
                        </div>
                      </div>           

                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                            $sql1 ="SELECT * from  tblpublicnotice";
                            $query1 = $dbh -> prepare($sql1);
                            $query1->execute();
                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                            $totclass=$query1->rowCount();
                            ?>
                          <span class="report-title">All Public Notices</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="manage-notice.php"><span class="report-count"> View P Notices</span></a>
                        </div>
                        <div class="inner-card-icon" style="background-color: orange;">
                          <i class="iconpno"></i>
                        </div>
                      </div>           

                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                            $sql1 ="SELECT * from  tblnotice";
                            $query1 = $dbh -> prepare($sql1);
                            $query1->execute();
                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                            $totclass=$query1->rowCount();
                            ?>
                          <span class="report-title">All Notice</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="manage-public-notice.php"><span class="report-count"> View Notice</span></a>
                        </div>
                        <div class="inner-card-icon" style="background-color: #dc3545;">
                          <i class="iconsno"></i>
                        </div>
                      </div>           
                      
                      
                     
                    
                      </div>
                    </div>
                  </div>

                
                
            
            
                </div>
              </div>
          </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include_once('includes/footer.php'); ?>
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
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>

  </html><?php }  ?>