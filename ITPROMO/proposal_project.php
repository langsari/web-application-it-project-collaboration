<!DOCTYPE html>
<html>
<head>
  <title></title>

  <style>
    h6{
      font-family:initial;
      font-size: 25px;
      color: green;
    }
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
</head>
<body>
  
<ul class="breadcrumb">
  <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">Final Projects Proposal</li>
</ul>

<div class="content">
                     <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
 
                                   <h6 class="card-title text-bold">All Final Projects Proposal</h6></b>
   <?php

                     require 'menu/function.php';



          $strSQL = "SELECT advisergroup.*, partnergroup.group_number,member.member_fullname,member.member_idcard  FROM advisergroup
          LEFT JOIN partnergroup ON advisergroup.group_id = partnergroup.group_id

        LEFT JOIN member ON advisergroup.member_id = member.member_id

        WHERE advisergroup.advisergroup_id ";


              ?>


      <table class="display datatable table table-stripped" cellspacing="0" width="100%">
          <thead bgcolor="gray">
              </br>
             <tr>
                        <th>No</th>   
                        <th>ID</th>
                      <th>Topic</th>
                      <th>Abstrack</th>
                      <th>Keyword</th>
                      <th>Field of Study</th>
                      <th>Status</th>


                 </tr>
               </thead>
 <?php
     if($result = $db->query($strSQL)){
             while($objResult = $result->fetch_object()){
            ?>

           <tbody>
            <tr>
                     <td class="text-center"><?php echo $objResult->advisergroup_id; ?></td>
                     <td class="text-center"><?php echo $objResult->member_idcard; ?></td>
                    <td class="text-center"><?php echo $objResult->advisergroup_topic; ?></td>
  <td><a href="?page=proposal_project&advisergroup_id=<?php echo $objResult->advisergroup_id; ?>" data-toggle="modal" data-target="#show" style="margin-bottom: 10px;"><?php echo $objResult->project_abstrack; ?></td>


                     <td class="text-center"><?php echo $objResult->project_keyword ?></td>
                <td class="text-center"><?php echo fieldstudy($objResult->project_fieldstudy); ?></td>
                 <td class="text-center"><?php echo status($objResult->project_status); ?></td>
          
                    
                  




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

      
  

   <!-- Modal -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus"></i> Detail</h4>
      </div>
      <div class="modal-body">
         
             <?php

  $strSQL = "SELECT * FROM advisergroup WHERE advisergroup_id ";
?>  <?php
     if($objQuery = $db->query($strSQL)){
       while($objResult = mysqli_fetch_array($objQuery)) {
            ?>
                           
                 
                                               
                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">ID  Student </label>
                                                    </div>
                                                    <div class="col-md-9"> 
                                                <input type="text" class="form-control"   value="<?php echo $objResult->project_abstrack; ?>" >
                                                    </div>
                                                </div>

   
                                            
                                           

                                        <?php
                 }
               }
                   ?>


                                    </form>
                                </div>


</body>

</html>