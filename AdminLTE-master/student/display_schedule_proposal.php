<?php
session_start();
require '../menu/connect.php';
include('../menu/function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 3</title>

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
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>
   <!-- Right navbar links -->
     <?php
  $con = mysqli_connect('localhost','root','','itpromo_track');
  $query="SELECT * FROM notify WHERE status=0";
  $query_num=mysqli_query($con,$query);
  $count=mysqli_num_rows($query_num);

  ?>

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
              $con = mysqli_connect('localhost','root','','itpromo_track');
              $sq="SELECT * FROM notify WHERE status=0";
              $qu_num=mysqli_query($con,$query);
              if (mysqli_num_rows($qu_num)>0) 
              {
                while($result=mysqli_fetch_assoc($qu_num))
                {
                  echo '<a class="dropdown-item text-primary font-weight-light" href="read_noti.php?id='.$result['id'].'">'.$result['subject'].'</a>';
                  echo '<div class="dropdown-divider"></div>';

                }
              }
              else
              {
                echo '<a href="#" class="dropdown-item text-danger font-weight-light"><i class="fas fa-frown"></i> Sorry! No Notification</a>';
              }
            ?>
            <div class="dropdown-divider"></div>
          <a href="read_noti.php" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>


      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
          <?php echo $_SESSION['name']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="../auth/logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout
          </a>
          <a href="my_profile.php" class="dropdown-item">
            <i class="fas fa-user"></i>&nbsp;&nbsp;My Profile
          </a>
        </div>
      </li>
     
       
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ITPROMO</span>
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


                   <li class="nav-item has-treeview ">
            <a href="index.php" class="nav-link ">
             
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashbord
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="infor_group.php" class="nav-link">
<i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>
       Group Information              </p>
            </a>
          </li>
    
 
  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Projects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create_proposal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Proposal</p>
                </a>
              </li>
              
              <li class="nav-item">
       <a href="../forms/check_pf.php" class="nav-link" >
                   <i class="far fa-circle nav-icon"></i>
                  <p>Project Track</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="proposal_project.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Project Topics</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Schedule
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="display_schedule_proposal.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proposal Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display_schedule_project.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Schedule</p>
                </a>
              </li>
              
            </ul>
          </li>


  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="annouce.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Annoucements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="show_topic.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Topic Require</p>
                </a>
              </li>
              
            </ul>
          </li>

  <li class="nav-item">
            <a href="my_profile.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Personal Information
              </p>
            </a>
          </li>
    



          <li class="nav-item">
            <a href="guide.php" class="nav-link">
        <i class="nav-icon fab fa-glide-g"></i>
              <p>
                Guide
              </p>
            </a>
          </li>

                    <li class="nav-item">
            <a href="course_syllabus.php" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                course syllabus
              </p>
            </a>
          </li>

                    <li class="nav-item">
            <a href="form.php" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Forms
              </p>
            </a>
          </li>


  <li class="nav-item">
            <a href="booked.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Books
              </p>
            </a>
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Proposal Schedule</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <?php include ('../menu/connect.php'); ?>

          <?php
          if (isset($_GET['id']))
           {
            $schedule_id= $_GET['id'];

            $conn = new mysqli("localhost","root","","itpromo_track");
            $sql="UPDATE schedule SET status=1 WHERE id='$schedule_id' ";
            $result=mysqli_query($conn, $sql);
          }

          ?>



      <!-- Default box -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Round 1 Proposal Presentation of semester 2/2018</h3>
            </div>
            <!-- /.card-header -->

           

           <div class="card-body">
              <table id="example1" class="table table-sm "  >
                <thead class="thead-light">
                <tr>
                       <th style="font-size: 15px;" width="4%" class="text-left">No</th>
                       <th style="font-size: 15px;" width="30%" class="text-left">Title Project</th>
                     <th style="font-size: 15px;" width="22%" class="text-left">Status</th>
                          <th style="font-size: 15px;" width="12%" class="text-left">Date</th>
                          <th style="font-size: 15px;" width="12%" class="text-left">Time</th>
                         <th style="font-size: 15px;" width="12%" class="text-left">Room</th>
                          <th style="font-size: 15px;" width="15%" class="text-left">View</th>
                     </tr>
                                   </thead>
                                    <tbody>



     <?php


               $strSQL = "SELECT schedule.*, partnergroup.group_id,partnergroup.group_number,member.member_fullname,schedule.writer,schedule.group_id,advisergroup.group_id,advisergroup.advisergroup_topic, topic_project.Owner,topic_project.topic_topic  FROM schedule
                     LEFT JOIN advisergroup ON schedule.group_id = advisergroup.advisergroup_id
                   LEFT JOIN topic_project ON schedule.group_id = topic_project.advisergroup_id
                   LEFT JOIN partnergroup ON schedule.group_id = partnergroup.group_id
                        LEFT JOIN member ON schedule.writer = member.member_id
                      WHERE   schedule.schedule_type ='1'
                        ORDER BY schedule.schedule_type";
                             $i = 1; 
                              $count = 1;
        ?>
             <?php
     if($result = $db->query($strSQL)){
             while($objResult = $result->fetch_object()){
            ?>
         
            <tr>
     <td class="text-left" style="font-size: 15px;">   <?php echo $count++; ?></td>


                <td class="text-left" style="font-size: 15px;"><?php echo $objResult->topic_topic; ?></td>
                    <td class="text-left" style="font-size: 15px;"><?php echo $objResult->schedule_status ?></td>
                     <td class="text-left" style="font-size: 15px;"><?php echo $objResult->schedule_date ?></td>
                      <td class="text-left" style="font-size: 15px;"><?php echo $objResult->schedule_time; ?></td>
                    <td class="text-left" style="font-size: 15px;"><?php echo $objResult->schedule_room ?></td>
                       
                  <td>               
                     <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                        data-target="#read_more<?php echo $i; ?>">
                    Read more</button>
                 

 <div class="modal fade" id="read_more<?php echo $i; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header bg-info">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h5 class="modal-title">View Schedule</h5>
                    </div>

                            <div class="modal-body">
        <form  method="post" action="check_status.php">
              <div class="form-group row margin-top-10">
                <div class="col-md-2">
                  <label class="control-label ">Owner</label>
                </div>
                <div class="col-md-10">
                  <?php echo $objResult->Owner; ?>
                  
                </div>
              </div>


              <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label ">Topic Project</label>
                </div>
                <div class="col-md-10">
<?php echo $objResult->topic_topic; ?>                </div>
              </div>







              <!--get project Proposal status -->

             
              <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label ">Advisor</label>
                </div>
                <div class="col-md-10">
<?php echo get_advisor($objResult->group_id); ?>                </div>
              </div>

                   <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label ">Committee</label>
                </div>
                <div class="col-md-10">
            <?php echo get_committee($objResult->group_id); ?>       
                     </div>
              </div>


              
           

   <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label ">Date</label>
                </div>
                <div class="col-md-10">
            <?php echo $objResult->schedule_date; ?>       
                     </div>
              </div>


   <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label ">Time</label>
                </div>
                <div class="col-md-10">
            <?php echo $objResult->schedule_time; ?>       
                     </div>
              </div>

  <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label ">Room</label>
                </div>
                <div class="col-md-10">
            <?php echo $objResult->schedule_room; ?>       
                     </div>
              </div>





  


    </div>

    </form>
                            </div>
                          </div>
                        </div>

                    </td>
                    </tr>

                    <?php
                                    $i++;  
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

<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
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