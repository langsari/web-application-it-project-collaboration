      <link rel="stylesheet" href="asset/css/style.css">

              <div class="content">
               <form action="student/check_files.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">

        

                    <div class="col-sm-8 col-sm-offset-1 
                    col-md-11 col-md-offset-4 
                    col-lg-15 col-lg-offset-5 form-box">
                      <div  class="f1">
                        <div class="f1-steps">
                          <div class="f1-progress">
                              <div class="f1-progress-line" data-now-value="12.5" data-number-of-steps="4" style="width: 12.5%; " ></div>
                          </div>
                          <div class="f1-step active">
                            <div class="f1-step-icon">PF01</div>
                            <p>FormPF01</p>
                          </div>
                          <div class="f1-step">
                        <div class="f1-step-icon">PF02</div>
                              <p>FormPF02</p>
                          </div>
                          <div class="f1-step">
                   <div class="f1-step-icon">PF03</div>
                             <p>FormPF03</p>
                          </div>
                            <div class="f1-step">
                 <div class="f1-step-icon">PF04</div>
                             <p>FormPF04</p>
                          </div>
                                  <div class="f1-step">
                 <div class="f1-step-icon">PF05</div>
                             <p>FormPF045</p>
                          </div>
                

                        </div>
 <?php
            $g_id = get_group_id();
              $ag_id = get_ag_id($g_id);
    $strSQL = "SELECT advisergroup.*,  advisergroup.advisergroup_status,files.files_status,files.files_filename_proposal,files.by_officer,files.Owner,files.advisergroup_id,files.pf,committeegroup.status_presentation,files.status_advisor FROM advisergroup
          LEFT JOIN files ON advisergroup.advisergroup_id = files.advisergroup_id
          LEFT JOIN committeegroup ON advisergroup.group_id = committeegroup.group_id

        LEFT JOIN member ON advisergroup.member_id = member.member_id
        WHERE advisergroup.advisergroup_id = '$ag_id' ";             


       
     if($result = $db->query($strSQL)){
                  while($objResult = $result->fetch_object()){
            ?>  
                        <fieldset>
                            <h4>Adviser Proposal Project Approval Letter</h4>
                       <div class="row">
                            <div class="card">
                                <div class="card-block">
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>To do list</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <tr>
                                             <td>Select Topic</td>
                          <td> 
                            <span class="badge badge-success"> <?php echo $objResult->advisergroup_status; ?></span>
                            
                          </td>
                                            </tr>
                                            <tr>
                                         <td>Select Advisor</td>
                                        <td> 
                             <span class="badge badge-success"> <?php echo $objResult->advisergroup_status; ?></span>
                                                 </td>
                                            </tr>
                            
                                  <tr>


<!--get Project Owner  -->
                   
                                <td class="form-control" name="Owner" hidden=""><?php echo get_member_list1($objResult->group_id); ?></td>
                                
                          
<!--get Topic   -->

                                                <td> 3 chapter of Proposal  

        <input type="file" name="files_filename_proposal" id="files_filename_proposal"  required="required"/>

      <td bgcolor="#EDEDED"><input type="submit" name="button" id="button" value="Upload" /></td>


                </td>
   <td> <span class="badge badge-success"> <?php echo $objResult->files_status; ?></span><p><font color='red'> *For Advisor</font></td>
       

    <td><a href="student/download.php?pdf=<?php echo $objResult->files_filename_proposal ;?>"><i class="fa fa-download"></i></a></td>

                                            </tr>
                                        </tbody>
                                    </table>



       <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

                                </div>
                            </div>
                        </div>

                         
        <div class="f1-buttons">
  <button type="button"   class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                           <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>To do list</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <tr>
                                             <td>Select Topic</td>
                          <td> 
                  <span class="badge badge-success"><?php echo $objResult->by_officer; ?> </span> <p> <font color='red'> *For Officer</font>
                          </td>
                           </tr>
                                           
                         </tbody>
                        </table>

                            
                    
                          <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>


 
                          <fieldset>
                           <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>To do list</th>
                                                  <th>Status of Revision  </br><font color='red'> *For Advisor</font></th>
                                                <th>Status of Proposal Revision  </br><font color='red'> *For Committee</font></th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <tr>
                                             <td>Proposal Revisoin
</td>
                              <td><font color='succes'> <?php echo $objResult->status_advisor; ?> </font>  <span >  <?php echo get_advisor($objResult->group_id); ?></span></td>
          <td> 


             <span ><?php echo get_status_committee($objResult->group_id); ?></span> <p> 

              <font color='red'> *For Committee</font>
                          </td>
                           </tr>
                                           
                         </tbody>
                        </table>

                            
                    
                          <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Social media profiles:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">Facebook</label>
                                    <input type="text" name="f1-facebook" placeholder="Facebook..." class="f1-facebook form-control" id="f1-facebook">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-twitter">Twitter</label>
                                    <input type="text" name="f1-twitter" placeholder="Twitter..." class="f1-twitter form-control" id="f1-twitter">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-google-plus">Google plus</label>
                                    <input type="text" name="f1-google-plus" placeholder="Google plus..." class="f1-google-plus form-control" id="f1-google-plus">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                      

                 <?php
                 } }
                   ?>

   
     

                    </div>



                </div>
                   
              </form>
 
 <?php
include("student/chat.php");
 ?>


 <script src="asset/js/jquery-1.11.1.min.js"></script>
        <script src="asset/js/jquery.backstretch.min.js"></script>
        <script src="asset/js/retina-1.1.0.min.js"></script>
        <script src="asset/js/scripts.js"></script>
   




   
    </body>

</html>