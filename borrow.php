<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('session');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Library Management System|| Borrow</title>
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
  <style>
    /* default styling. Nothing to do with freexing first row and column */
    main {
      display: flex;
    }

    main>* {
      border: 1px solid;
    }

    table {
      border-collapse: collapse;
      font-family: helvetica;
      width: 100%;
    }

    td,
    th {
      border: 1px solid;
      padding: 10px;
      min-width: 50px;
      background: white;
      box-sizing: border-box;
      text-align: left;
    }


    .table-Main-Box {
      margin-top: 50px;
    }

    .table-horizontal-container {
      background: #000;
    }

    thead th {
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      z-index: 2;
      color: white;
      background-color: #181824;
    }

    thead th:first-child {
      left: 0;
      z-index: 3;
      background-color: #181824;
    }

    tfoot {
      position: -webkit-sticky;
      bottom: 0;
      z-index: 2;
    }

    tfoot td {
      position: sticky;
      bottom: 0;
      z-index: 2;
      background: hsl(20, 50%, 70%);
    }

    tfoot td:first-child {
      z-index: 3;
    }

    tbody {
      overflow: scroll;
      height: 100px;
    }

    /* MAKE LEFT COLUMN FIXEZ */
    tr> :first-child {
      position: -webkit-sticky;
      position: sticky;
      color: white;
      left: 0;
      background-color: #181824;
    }

    /* don't do this */
    tr> :first-child {
      box-shadow: inset 0px 1px black;
    }
    .control-group{
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }
    .control-group .controls .borrowBtn{
      padding: 10px 25px;
      border-radius: 30px;
    }
  </style>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once('includes/header.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Add Borrow </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Add Borrow</li>
              </ol>
            </nav>
          </div>




          <div class="alert alert-info" style="width: 1030px; margin-left: 15px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><i class="icon-user icon-large"></i>&nbsp;Borrow Table</strong>
          </div>

          <div class="span12">

            <form method="post" action="borrow_save.php">
              <div class="span3">

                <div class="control-group">
                  <div class="controls">
                    <label class="control-label" for="inputEmail">Borrower Name</label>
                    <select name="ID" class="chzn-select" required />
                    <option></option>
                    <?php $result =  mysqli_query($conn, "select * from tblstudent") or die();
                    while ($row = mysqli_fetch_array($result)) { ?>
                      <option value="<?php echo $row['ID']; ?>"><?php echo $row['StudentName'] . " " . $row['lastname']; ?></option>
                    <?php } ?>
                    </select>
                  </div>

                  <div class="controls">
                    <label class="control-label" for="inputEmail">Due Date</label>
                    <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="due_date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required />
                  </div>

                  <div class="controls">
                    <button name="delete_student" class="btn btn-success borrowBtn"><i class="icon-plus-sign icon-large"></i> Borrow</button>
                  </div>
                </div>
                
              </div>
                <div class="table-Main-Box">
                  <!--
  <table class="fixed-table">
    <thead>
      <tr><th>Fixed Header</th></tr>
    </thead>
    <tbody>
       <tr>
									    <th>Acc No.</th>                                 
                                        <th>Book Title</th>                                 
                                        <th>Category</th>
										<th>Author</th>
										<th class="action">copies</th>
										<th>Book Pub</th>
										<th>Publisher Name</th>
										<th>ISBN</th>
										<th>Copyright Year</th>
										<th>Date Added</th>
										<th>Status</th>
										<th class="action">Action</th>		
                                    </tr>
    </tbody>
    <tfoot>
      <tr><td>Fixed Footer</td></tr>
    </tfoot>
  </table> -->


                  <table>
                    <thead>
                      <tr>

                        <th>Acc No.</th>
                        <th>Book title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Publisher name</th>
                        <th>status</th>
                        <th>Add</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php $user_query = mysqli_query($conn, "select * from tblbook where status != 'Archive' ") or die();
                      while ($row = mysqli_fetch_array($user_query)) {
                        $id = $row['book_id'];
                        $cat_id = $row['category_id'];

                        $cat_query = mysqli_query($conn, "select * from category where category_id = '$cat_id'") or die();
                        $cat_row = mysqli_fetch_array($cat_query);
                      ?>
                        <tr class="del<?php echo $id ?>">


                          <td><?php echo $row['book_id']; ?></td>
                          <td><?php echo $row['book_title']; ?></td>
                          <td><?php echo $cat_row['classname']; ?> </td>
                          <td><?php echo $row['author']; ?> </td>
                          <td><?php echo $row['publisher_name']; ?></td>
                          <td width=""><?php echo $row['status']; ?></td>
                          <?php include('toolttip_edit_delete.php'); ?>
                          <td width="20">
                            <input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">

                          </td>

                        </tr>
                      <?php  }  ?>
                    </tbody>
                  </table>
                </div>
            </form>
          </div>
        </div>
        <script>
          $(".uniform_on").change(function() {
            var max = 3;
            if ($(".uniform_on:checked").length == max) {

              $(".uniform_on").attr('disabled', 'disabled');
              alert('3 Books are allowed per borrow');
              $(".uniform_on:checked").removeAttr('disabled');

            } else {

              $(".uniform_on").removeAttr('disabled');
            }
          })
        </script>

        <?php include_once('includes/footer.php'); ?>


        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

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