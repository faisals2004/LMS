<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Library Management System|| Lost Books</title>
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
      font-family: helvetica
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

    .table-container {
      position: relative;
      max-height: 300px;
      width: 1050px;
      overflow: scroll;
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
            <h3 class="page-title"> Add Lost Books </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Add Lost Books</li>
              </ol>
            </nav>
          </div>

          <div class="alert alert-info" style="width: 1030px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><i class="icon-user icon-large"></i>&nbsp;Books Table</strong>
          </div>
          <center class="title">
            <h1>New Books</h1>
          </center>
          <div class="pull-right">
            <a href="add_books.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Books</a>
            <a href="" onclick="printTable('mytable')" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
          </div>
          <!--  -->
          <div class="nav-pills-main">
            <ul class="nav nav-pills">
              <li><a href="book.php">All</a></li>
              <li><a href="new_books.php">New Books</a></li>
              <li><a href="old_books.php">Old Books</a></li>
              <li><a href="lost.php">Lost Books</a></li>
              <li><a href="damage.php">Damage Books</a></li>
              <li><a href="sub_rep.php">Subject for Replacement</a></li>
            </ul>
          </div>
          <!--  -->

          <div class="table-container">
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

            <div class="table-horizontal-container">
              <table class="unfixed-table" id="mytable">
                <thead>
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
                    <th class="action">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $user_query = mysqli_query($conn, "select * from tblbook where status = 'lost'") or die();
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
                      <td><?php echo $row['book_copies']; ?> </td>
                      <td><?php echo $row['book_pub']; ?></td>
                      <td><?php echo $row['publisher_name']; ?></td>
                      <td><?php echo $row['isbn']; ?></td>
                      <td><?php echo $row['copyright_year']; ?></td>
                      <td><?php echo $row['date_added']; ?></td>
                      <?php include('toolttip_edit_delete.php'); ?>
                      <td class="action">
                        <a href="delete_books.php?id=<?php echo $id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                        <?php include('delete_book_modal.php'); ?>
                        <a rel="tooltip" title="Edit" id="e<?php echo $id; ?>" href="edit_book.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>

                      </td>

                    </tr>
                  <?php  }  ?>

                </tbody>
              </table>

              </tbody>
              </table>
            </div>
          </div>
          </object>
          </article>


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