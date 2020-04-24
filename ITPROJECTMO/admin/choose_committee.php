<script type="text/javascript">
  function confirm_removecommittee() {
    var x = confirm("Are you sure?");
    if (x) {
      return true;
    } else {
      return false;
    }
  }



  //Add committeee function
  function add_committee(group_id) {
    $('#group_id3').val(group_id);

    $.ajax({
      url: '../admin/get_committee.php',
      dataType: 'JSON',
      success: function (data) {
        $('#select_committee').html(null);
        var rows = "<option value='no'>- Select Committee -</option>";
        $.each(data, function (i, o) {
          rows += "<option value='" + o.member_id + "'>" + o.member_fullname + "</option>";
        });
        $('#select_committee').append(rows);
      },
      error: function (request, error) {
        console.log(error);
        console.log(arguments);
      }
    });
  }
</script>

<?php
session_start();
require '../menu/connect.php';
include '../menu/function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ITPROMOT | Choose Committee</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">

        <a href="../admin/index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
       <a href="#" class="nav-link" data-toggle="modal" data-target="#notify">Notify</a>
      </li>

    </ul>

    <?php
$conn = new mysqli("localhost", "root", "", "projects_itproject");
$count = 0;
if (!empty($_POST['add'])) {
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $sql = "INSERT INTO notify (subject,comment) VALUES('" . $subject . "','" . $comment . "')";
    mysqli_query($conn, $sql);
}
$sql2 = "SELECT * FROM notify WHERE status = 0";
$result = mysqli_query($conn, $sql2);
$count = mysqli_num_rows($result);
?>

<script type="text/javascript">

  function myFunction() {
    $.ajax({
      url: "view_notification.php",
      type: "POST",
      processData:false,
      success: function(data){
        $("#notification-count").remove();
        $("#notification-latest").show();$("#notification-latest").html(data);
      },
      error: function(){}
    });
   }

   $(document).ready(function() {
    $('body').click(function(e){
      if ( e.target.id != 'notification-icon'){
        $("#notification-latest").hide();
      }
    });
  });

  </script>


   <!-- Display the alert of notification -->

  <?php
$con = mysqli_connect('localhost', 'root', '', 'projects_itproject');
$query = "SELECT * FROM notify WHERE status=0";
$query_num = mysqli_query($con, $query);
$count = mysqli_num_rows($query_num);

?>

    <!-- Right navbar links -->
    <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-globe" style="font-size:20px;"></i><span class="badge badge-danger"
              id="count"><?php echo $count; ?></span>

          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?php echo $count; ?> Notifications</span>
            <?php
$con = mysqli_connect('localhost', 'root', '', 'projects_itproject');
$sq = "SELECT * FROM notify WHERE status=0";
$qu_num = mysqli_query($con, $query);
if (mysqli_num_rows($qu_num) > 0) {
    while ($result = mysqli_fetch_assoc($qu_num)) {
        echo '<a class="dropdown-item text-primary font-weight-light" href="../admin/read_noti.php?id=' . $result['id'] . '">' . $result['subject'] . '</a>';
        echo '<div class="dropdown-divider"></div>';

    }
} else {
    echo '<a href="#" class="dropdown-item text-danger font-weight-light"><i class="fas fa-frown"></i> Sorry! No Notification</a>';
}
?>
            <div class="dropdown-divider"></div>
          <a href="../admin/read_noti.php" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['name']; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="../auth/logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout
            </a>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user"></i>&nbsp;&nbsp;My Profile
            </a>
          </div>
        </li>
      </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

       <a href="index.php" class="brand-link">

        <img src="../dist/img/n2.png" width="100%" >
        <span class="brand-text font-weight-light"></span>
      </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user1.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                   <li class="nav-item has-treeview menu-open">
            <a href="../admin/index.php" class="nav-link ">

              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashbord
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

         <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../admin/accept_member.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Request</p>
                  <?php
$con = mysqli_connect('localhost', 'root', '', 'projects_itproject');
$query = "SELECT member_id FROM member WHERE admin_id=0";
$query_num = mysqli_query($con, $query);
$count = mysqli_num_rows($query_num);

?>
                    <span class="right badge badge-danger"><?php echo $count; ?></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="../admin/choose_committee.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Choose Committee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../admin/all_member.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Users</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Manage Schedule
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../admin/add_schedule_proposal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proposal Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../admin/add_schedule_project.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Schedule</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Projects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../admin/student_track.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Track</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../admin/view_all_project.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Project Topics</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Manage Annoucements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="display_schedule_proposal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Annoucements</p>
                </a>
              </li>

            </ul>
          </li>

     

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
              <li class="breadcrumb-item active">Choose Committee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
               <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Choose Committee to student
                </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead align="center">
                  <tr>
                      <th style="font-size: 15px;" width="3%" class="text-left">No</th>
                       <!--<th style="font-size: 15px;" width="5%" class="text-left">Group</th>-->
                      <th style="font-size: 15px;" width="30%" class="text-left">Owner</th>
                       <th style="font-size: 15px;" width="30%" class="text-left">Project Topic</th>
                       <th style="font-size: 15px;" width="17%" class="text-left">Advisor</th>
                       <th style="font-size: 15px;" width="17%" class="text-left">Committee</th>
                       <th style="font-size: 15px;" width="10%" class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody align="center">
  <?php

$sql = "SELECT advisergroup.*,  files.files_status,files.pf,files.files_id,files.files_filename_proposal,files.by_officer,advisergroup.group_id,partnergroup.group_number,partnergroup.group_id FROM advisergroup

           LEFT JOIN partnergroup ON advisergroup.group_id = partnergroup.group_id

          LEFT JOIN files ON advisergroup.advisergroup_id = files.advisergroup_id
        WHERE advisergroup.group_id AND files.by_officer = 'Approve'
               ";

if ($rs = $db->query($sql)) {
    while ($row = $rs->fetch_object()) {
        ?>
                  <tr>

                       <td class="text-center" style="font-size: 15px;"><?php echo $row->files_id; ?></td>
                   <!--  <td class="text-left" style="font-size: 15px;"><?php echo $row->group_number; ?></td>-->
                       <td class="text-left" style="font-size: 15px;"><?php echo get_member_list($row->group_id); ?></td>
                     <td class="text-left" style="font-size: 15px;"><?php echo get_topic($row->group_id); ?></td>
                     <td class="text-left" style="font-size: 15px;"><?php echo get_advisor($row->group_id); ?></td>


                    <td class="text-left" style="font-size: 15px;"><?php echo get_committee($row->group_id); ?></td>



                    <td class="text-center">

                      <button type="button" class="btn btn-success btn-sm"
                        onclick="add_committee('<?php echo $row->group_id; ?>')" data-toggle="modal"
                        data-target="#add_committee"><i class="fa fa-plus" title="Add"></i> Add </button>

                    </td>
                  </tr>

            <?php
}
}
?>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="modal fade" id="notify">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Alert</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form name="frmNotification" id="frmNotification" action="" method="post" >
      <div id="form-header" class="form-row">Add New Message</div>
      <div class="form-row">
        <div class="form-label">Subject:</div><div class="error" id="subject"></div>
        <div class="form-element">
          <input type="text"  name="subject" id="subject" required>

        </div>
      </div>
      <p>
      <div class="form-row">
        <div class="form-label">Comment:</div><div class="error" id="comment"></div>
        <div class="form-element">
          <textarea rows="4" cols="30" name="comment" id="comment"></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-element">
          <input type="submit" name="add" id="btn-send" value="Submit">
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>


      <div class="modal fade" id="add_committee">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Committee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

    <form class="form" method="post" action="../admin/check_committee.php">
      <div class="user-details">
        <div class="form-group">
          <label>Committee</label>
        <select class="form-control" id="select_committee" name="committee">
                  <!-- jQuery Ajax will render HTML here -->
        </select>
       </div>

      </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times "></i> Close</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </div>

                        <input type="hidden" name="group_id" id="group_id3">


            <input type="hidden" name="status_project" id="status_project">
                        <input type="hidden" name="status_presentation" id="status_presentation">


            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>    </section>

    </div>



  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3-pre
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="#">IT PROJECT</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!--include message  -->

<?php

include '../notification/notification.php';
?>
 <!--end for include message  -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../dist/js/pages/dashboard3.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
