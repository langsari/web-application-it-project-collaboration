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
  <li class="active">Add Schedule Proposal</li>
</ul>

<div class="content">
                     <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">

  <button type="button"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#addmember" style="margin-bottom: 10px;">

            <i class="glyphicon glyphicon-plus"></i>Add Schedule Proposal
          </button>


          <!-- Modal -->
<div class="modal fade" id="addmember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus"></i> Add Schedule Proposal</h4>
      </div>
      <div class="modal-body">
         
       <form id="add" name="add" method ="post" action ="admin/check_schedule_proposal.php" onsubmit="return checkForm()" >
                  

                  <div class="form-group row">           
       <div class="col-md-3">
             <label class="control-label col-form-label">Round</label>
           </div>
             <div class="col-md-9">
                                    <select class="form-control" name="schedule_round" id="schedule_round">
              
               <option value="1">1</option>
           
              </select>
            </div>
          </div>

         <div class="form-group row">           
       <div class="col-md-3">
             <label class="control-label col-form-label">Type</label>
           </div>
             <div class="col-md-9">
                                    <select class="form-control" name="schedule_type" id="schedule_type">
               <option value="1">Proposal</option>
              </select>
            </div>
          </div>

            <div class="form-group row">
                    <div class="col-md-3">
                         <label class="control-label col-form-label">Years</label>
                    </div>
                     <div class="col-md-9">
                    <input type="text" class="form-control" id="schedule_years" name="schedule_years"placeholder="Years" autocomplete="off" required aria-describedby="basic-addon1">
               </div>
                   </div>
                  <!-- Notifications: style can be found in dropdown.less 

 <div class="form-group row">           
       <div class="col-md-3">
             <label class="control-label col-form-label">Partner Student</label>
           </div>
             <div class="col-md-9">
             <select class="form-control" name="member_id">
              <option value="no">- Select Partner Student -</option>
                <?php
            //   include '../db/ConnectDB.php';
              //         $strSQL = "SELECT  advisergroup.advisergroup_topic, advisergroup.group_id,member.member_fullname,member.group_id
                //           FROM advisergroup,member 
                  //         WHERE advisergroup.group_id=member.member_id
                    //       ORDER BY advisergroup.advisergroup_id";

                //if($result = $db->query($strSQL)){
                  //while($objResult = $result->fetch_object()){
                 //   echo "<option value='".$objResult->advisergroup_id."'>".$objResult->member_fullname."</option>";

  


                  
               // }else{
                //}
                //?>
              </select>
      
            </div>
          </div>
-->

           <div class="form-group row">           
       <div class="col-md-3">
             <label class="control-label col-form-label">ID Student</label>
           </div>
             <div class="col-md-9">
             <select class="form-control" name="member_id">
              <option value="no">- Select ID Student -</option>
                <?php
                include '../db/ConnectDB.php';
                $strSQL = "SELECT member_id, member_fullname FROM member WHERE member_pos ='3'";
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
             <label class="control-label col-form-label">Title Project</label>
           </div>
             <div class="col-md-9">
             <select class="form-control" name="advisergroup_id">
              <option value="no">- Select Title Project-</option>
                <?php
                include '../db/ConnectDB.php';
                $strSQL = "SELECT advisergroup_id, advisergroup_topic FROM advisergroup WHERE advisergroup_id";
                if($result = $db->query($strSQL)){
                  while($objResult = $result->fetch_object()){
                    echo "<option value='".$objResult->advisergroup_id."'>".$objResult->advisergroup_topic."</option>";
                  }
               
                }else{
              
                }
                ?>
              </select>
      
            </div>
          </div>

                                     
                                        <div class="form-group row">
                    <div class="col-md-3">
                         <label class="control-label col-form-label">Date</label>
                    </div>
                     <div class="col-md-9">
                    <input type="DATE" class="form-control" id="schedule_date" name="schedule_date"placeholder="Years" autocomplete="off" required aria-describedby="basic-addon1">
               </div>
                   </div>

                    <div class="form-group row">
                    <div class="col-md-3">
                         <label class="control-label col-form-label">Time</label>
                    </div>
                     <div class="col-md-9">
                    <input type="text" class="form-control" id="schedule_time" name="schedule_time"placeholder="Time" autocomplete="off" required aria-describedby="basic-addon1">
               </div>
                   </div>

                     <div class="form-group row">
                    <div class="col-md-3">
                         <label class="control-label col-form-label">Room</label>
                    </div>
                     <div class="col-md-9">
                    <input type="text" class="form-control" id="schedule_room" name="schedule_room"placeholder="Room" autocomplete="off" required aria-describedby="basic-addon1">
               </div>
                   </div>

                                              
  <div class="form-group row">           
       <div class="col-md-3">
             <label class="control-label col-form-label">BY</label>
           </div>
             <div class="col-md-9">
             <select class="form-control" name="admin_id">

                <?php
                include '../db/ConnectDB.php';
                $strSQL = "SELECT admin_id, admin_fullname FROM admin WHERE admin_id ='".$_SESSION['id']."'";
                if($result = $db->query($strSQL)){
                  while($objResult = $result->fetch_object()){
                    echo "<option value='".$objResult->admin_id."'>".$objResult->admin_fullname."</option>";
                  }
                }else{
                }
                ?>
              </select>
      
            </div>
          </div>

               <button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>

                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>


 <h6 class="card-title text-bold">Schedule Proposal</h6>              

     <?php
 
 require 'menu/function.php';


   $strSQL = "SELECT  schedule.schedule_id, schedule.schedule_round,  schedule.schedule_type, schedule.schedule_years,schedule.schedule_time,schedule.schedule_date,schedule.member_id,schedule.advisergroup_id,schedule.admin_id,admin.admin_fullname
                           FROM schedule,admin 
                           WHERE schedule.admin_id=admin.admin_id AND  schedule.schedule_round ='1'
                           ORDER BY schedule.schedule_id";
        ?>
       <table class="display datatable table table-stripped" cellspacing="0" width="100%">
          <thead>
             <tr>
                      <th>No</th>
                      <th>Round</th>
                      <th>Type</th>
                      <th>Years</th>
                      <th>Time</th>
                      <th>Date</th>
                       <th>Member</th>
                       <th>Topic</th>
                       <th>By</th>
                       <th>Option</th>

                 </tr>
               </thead>
       <?php
     if($result = $db->query($strSQL)){
             while($objResult = $result->fetch_object()){
            ?>
           <tbody>
            <tr>
                       <td class="text-center"><?php echo $objResult->schedule_id; ?></td>
                  <td class="text-center"><?php echo $objResult->schedule_round; ?></td>
                    <td class="text-center"><?php echo $objResult->schedule_type; ?></td>
                     <td class="text-center"><?php echo $objResult->schedule_years; ?></td>
                     <td class="text-center"><?php echo $objResult->schedule_time ?></td>
                       <td class="text-center"><?php echo $objResult->schedule_date; ?></td>
                     <td class="text-center"><?php echo $objResult->member_id ?></td>
                         <td class="text-center"><?php echo $objResult->advisergroup_id; ?></td>
                     <td class="text-center"><?php echo $objResult->admin_fullname ?></td>


 <td>
                  <a href="delete/check_delete.php?id=<?php echo $objResult->topic_id;?>" title="Confirm" onclick="return confirm('<?php echo $objResult->topic_topic;?>')"> <i class="fa fa-eye" aria-hidden="true"></i></a>
     
                     <a href="delete/check_delete.php?id=<?php echo$objResult->topic_id;?>" title="Confirm" onclick="return confirm('<?php echo  $objResult->topic_topic;?>')"> <i class="fa fa-edit" aria-hidden="true"></i>
           
                     <a href="delete/check_delete.php?id=<?php echo $objResult->topic_id;?>" title="Confirm" onclick="return confirm('<?php echo $objResult->topic_topic;?>')"> <i class="fa fa-trash" aria-hidden="true"></i>
                      </td>
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
                    </div>
                </div>

</body>

</html>