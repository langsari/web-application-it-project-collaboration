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
  <li class="active">All Member</li>
</ul>


         <!-- PAGE CONTENT -->
                <div class="content">
                     <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h6 class="card-title text-bold">Default Datatable</h6>                         
     <?php
//require 'menu/function.php';
 $strSQL = "SELECT * FROM member  ";
  
?>
   <table class="display datatable table table-stripped" cellspacing="0" width="100%">
          <thead>
             <tr>
                      <th>#</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Position</th>
                      <th>Status</th>
                      <th>#</th>
                 </tr>
               </thead>
       <?php
     if($result = $db->query($strSQL)){
             while($objResult = $result->fetch_object()){
            ?>
           <tbody>
            <tr>
                    <td class="text-center"><?php echo $objResult->member_id; ?></td>
                    <td class="text-center"><?php echo $objResult->member_idcard; ?></td>
                    <td class="text-center"><?php echo $objResult->member_fullname; ?></td>
                    <td class="text-center"><?php echo $objResult->member_phone; ?></td>
                    <td class="text-center"><?php echo $objResult->member_email; ?></td>
                    <td class="text-center"><?php echo gender($objResult->member_gender); ?></td>
                    <td class="text-center"><?php echo position($objResult->member_pos); ?></td>
                    <td class="text-center"><?php echo status($objResult->admin_id); ?></td>
                   <td><a href="?page=edit_member&id=<?php echo $objResult->member_id;?>"><i class="fa fa-edit" title="Edit"></i></a></td>
           </tr>
                <?php
                 }
               }
                   ?>


       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            <!-- /PAGE CONTENT -->
        

</body>

</html>