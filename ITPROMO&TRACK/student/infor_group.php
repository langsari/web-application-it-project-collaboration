 <!DOCTYPE html>
 <html>
 <head>
   <title></title>

 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 <style>
    h6{
      font-family:initial;
      font-size: 25px;
      color: green;
    }
    #more {display: none;}
    ul.breadcrumb {
      background-color: #eee;
      text-align: right;
      padding: 10px 16px;
    }
    ul.breadcrumb li {
     display: inline;
    }  
    ul.breadcrumb li+li:before {
      padding: 8px;
      content: ">>\00a0";
}
    
  </style>

 <ul class="breadcrumb">
 <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">My Group</li>
</ul>
   <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                          
                        </div>
                    </div>
  <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">My Information</h5>
                                     <table class="table">
                                        <thead class="thead-default">
                                            Mine
                                           <tr>
                  <th>Student ID</th>
                  <th>Full Name</th>
                  <th>Phone</th>
                </tr>
                                        </thead>
                                        <tbody>
                                          <?php

        $sql = "SELECT member_fullname, member_phone, member_idcard FROM member WHERE member_id='".$_SESSION['id']."'";  
              if($result = $db->query($sql)){
                while($objResult = $result->fetch_object()){
              ?>
                <tr>
                  <td><?php echo $objResult->member_idcard; ?></td>
                  <td><?php echo $objResult->member_fullname; ?></td>
                  <td><?php echo $objResult->member_phone; ?></td>
                </tr>
              <?php
                }
              }
              ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">






                                 
          <!-- Modal -->
<div class="modal fade" id="create_group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus"></i>Add Group</h4>
      </div>
      <div class="modal-body">

                    <form class="form" method="post" action="student/check_newgroup.php">
  <button type="button"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#joinpartner" style="margin-bottom: 13px;">
   <i class="glyphicon glyphicon-plus"></i>Join Partner
  </button>
  <p>
                    <label>Create Group</label>
                    <input class="form-control" type="text" name="group_number" id="group_number" placeholder="Group Code">
                </div>
                   <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
                  <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Save</button>
                </div>                   
                </form>
              </div>
            </div>
          </div>
                

  <!-- Star Partner -->
<div class="modal fade" id="joinpartner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus"></i>Join your partner</h4>
      </div>
      <div class="modal-body">
         
       <form id="add" name="add" method ="post" action ="student/check_join.php" onsubmit="return checkForm()" >
 
            

       <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th>Group Member</th>
                  <th class="text-center" style="width: 100px;"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <?php
                    // require 'menu/function.php';
              $sql = "SELECT * FROM partnergroup";
              if($rs = $db->query($sql)){
                while($row = $rs->fetch_object()){
              ?>

           <tr>
                  <td class="text-center"><?php echo $row->group_number; ?></td>
                  <td><?php echo get_member_list($row->group_id); ?></td>
                  <td class="text-center">
                    <a href="student/check_group.php?id=<?php echo $row->group_id; ?>" class="btn btn-primary btn-xs" onclick="return confirm_joingroup()"><i class="glyphicon glyphicon-plus-sign"></i> Join this Group</a>
                  </td>
                </tr>
              <?php
                }
              }else{
              }
              ?>
</a>
</td>
</tr>
</tbody>
                                    </table>
                                    </form>

</div>
</div>
</div>
</div>
</p>
  <!-- END FORM Partner -->


  <!-- Display Partner -->
     <button type="button"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#create_group" style="margin-bottom: 13px;">
   <i class="glyphicon glyphicon-plus"></i>Add Group
  </button>


                                    <table class="table">  
                                        <thead class="thead-default">
                                         My Group partner
                                           <tr>
                  <th>Student ID</th>
                  <th>Full Name</th>
                  <th>Phone</th>
                </tr>
                                        </thead>
                                        <tbody>


                                          <?php


              $group_id = get_group_id($_SESSION['id']);
             
                $sql = "SELECT member_fullname, member_phone, member_idcard FROM member WHERE group_id = '$group_id'";

              if($rs = $db->query($sql)){
                while($row = $rs->fetch_object()){
              ?>
                <tr>
                  <td><?php echo $row->member_idcard; ?></td>
                  <td><?php echo $row->member_fullname; ?></td>
                  <td><?php echo $row->member_phone; ?></td>
                </tr>
              <?php
                }
              }else{
              }
              ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

          <!-- END Partner-->





          <!-- Select advisor -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
  <button type="button"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#selectadvisor" style="margin-bottom: 13px;">
   <i class="glyphicon glyphicon-plus"></i>Select Advisor
  </button>


<!-- Modal -->
<div class="modal fade" id="selectadvisor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus"></i>Select your advisor</h4>
      </div>
      <div class="modal-body">
         
       <form id="add" name="add" method ="post" action ="student/check_selectadvisor.php" onsubmit="return checkForm()" >
  
                                               
 <div class="form-group row">           
       <div class="col-md-3">
             <label class="control-label col-form-label">Choose advisor</label>
           </div>
             <div class="col-md-9">
             <select class="form-control" name="member_id">
              <option value="no">- Lecturer Name -</option>
                <?php
                
                $strSQL = "SELECT member_id, member_fullname FROM member WHERE member_pos ='Lecturer'";
                if($result = $db->query($strSQL)){
                  while($objResult = $result->fetch_object()){
                    echo "<option value='".$objResult->member_id."'>".$objResult->member_fullname."</option>";
                  }
                }else{
                }
                ?>
              </select>
      
            </div>
          </div>
                <div class="form-group row">
                           <div class="col-md-3">
                               <label class="control-label col-form-label">Topic</label>
                                 </div>
                       <div class="col-md-9">
                                        <input type="text" class="form-control" id="advisergroup_topic" name="advisergroup_topic"placeholder="project topic name" autocomplete="off" required aria-describedby="basic-addon1">
                                                    </div>
                                                </div>


 <div class="form-group row">           
       <div class="col-md-3">
           
           </div>
             <div class="col-md-9">
             <select class="form-control" name="admin_id" hidden="">

                <?php
                include '../menu/connect.php';
                $strSQL = "SELECT admin_id FROM member WHERE member_id ='".$_SESSION['id']."'";
                if($result = $db->query($strSQL)){
                  while($objResult = $result->fetch_object()){
                    echo "<option value='".$objResult->admin_id."'></option>";
                  }
                }else{
                }
                ?>
              </select>
      
            </div>
          </div>

          <!-- Select advisor 
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Abstarck</label>
                                                    </div>
                                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="project_abstrack" name="project_abstrack"autocomplete="off" required aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Keyword</label>
                                                    </div>
                                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="project_keyword" name="project_keyword"    autocomplete="off" required aria-describedby="basic-addon1" >
                                                    </div>
                                                </div>

                                            <div class="form-group row">           
                                                 <div class="col-md-3">
                                          <label class="control-label col-form-label">Filed of Study</label>
                                             </div>
                                         <div class="col-md-9">
                                       <select class="form-control" name="project_fieldstudy" id="project_fieldstudy">

                                        <option value="no"> Select Filed</option>
                                        <option value="1">Software Engineering</option>
                                        <option value="2">Computer Multimedia</option>
                                        <option value="3">Computer Networking</option>
                                        </select>
                                          </div>
                                              </div>

                                            <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Years</label>
                                                    </div>
                                                    <div class="col-md-9">
                                        <input type="DATE" class="form-control" id="project_years" name="project_years"  autocomplete="off" required aria-describedby="basic-addon1" >
                                                    </div>
                                                </div>

                                                 <div class="form-group row">           
       <div class="col-md-3">
             <label class="control-label col-form-label">Proposal status</label>
           </div>
             <div class="col-md-9">
             <select class="form-control" name="project_status" name="project_status">
                <option value="1">Proposal Appoved</option> 
                <option value="2"> Proposal Not Appoved</option>
                 <option value="3"> Done </option>
            
              </select>
      
            </div>
          </div>-->

           <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
            <input type="hidden" name="advisergroup_id" value="<?php echo $advisergroup_id; ?>">
          
             <button type="submit" class="btn btn-primary btn-lg btn-block">Send request</button>
                          
</div>
</div>
</div>
</div>


    <!-- END Select Advisor  -->


      <table class="table">
         <thead class="thead-default">
            <tr>
              <th>GroupNo</th>
              <th>GroupCode</th>
              <th>Title project</th>
              <th>Advisor</th>
              <th>Status</th>
           </tr>
          </thead>
    <tbody>

    <?php

$my_id = $_SESSION['id'];
$my_group_id = get_group_id($my_id);

//Initialise Value to variable


$sql = "SELECT advisergroup.advisergroup_id, advisergroup.advisergroup_status,advisergroup.advisergroup_topic,advisergroup.group_id,member.member_id,member.member_fullname FROM advisergroup
         JOIN member ON advisergroup.member_id = member.member_id
        
         WHERE advisergroup.group_id = '$my_group_id'";

              if($rs = $db->query($sql)){
                while($row = $rs->fetch_object()){
              ?>
                <tr>                 
                  <td><?php echo get_group_id($row->group_id); ?></td>
                  <td><?php echo get_groupcode($row->group_id); ?></td>
                  <td><?php echo $row->advisergroup_topic; ?></td>
                  <td><?php echo $row->member_fullname; ?></td>
 <td class="text-center"><?php echo $row->advisergroup_status; ?></td>
                </tr>


               
              <?php
                }
              }else{
              }
              ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
          
                    
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title">Committee</h5>
                                   
                                <table class="table">  
                                        <thead class="thead-default">
                                         
                                           <tr>
                  <th>Student ID</th>
                  <th>Full Name</th>
                  <th>Phone</th>
                </tr>
                                        </thead>
                                        <tbody>


                                          <?php

             
          $sql = "SELECT committeegroup.committeegroup_id, member.member_fullname,member.member_idcard ,member.member_phone FROM committeegroup
          LEFT JOIN member ON committeegroup.member_id = member.member_id
          WHERE committeegroup.group_id = '$group_id'";

              if($rs = $db->query($sql)){
                while($row = $rs->fetch_object()){
              ?>
                <tr>
                  <td><?php echo $row->member_idcard; ?></td>
                  <td><?php echo $row->member_fullname; ?></td>
                  <td><?php echo $row->member_phone; ?></td>
                </tr>
              <?php
                }
              }else{
              }
              ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



