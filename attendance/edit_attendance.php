<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Update Attendance </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="overflow-x:scroll;">
                      <table id="datatable" class="table table-striped table-bordered" data-page-length='250' width="100%">
                      <thead align="center">
                        <tr>
                          
                          <th>Employee ID</th>
                          <th>Employee Name</th>
                          
                          <?php
                          
                            $year=date('Y');
                            if($month==date('m'))
                            $days=date('t');
                            
                            else
                            $days=cal_days_in_month(CAL_GREGORIAN,$month,$year);
                            for ($x = 1; $x <= $days; $x++) {
                                  echo "<th>$x </th>";
                                
                                }
                            ?> 

                          <th>Remarks if Any </th>
                          <th>Action </th>
                        </tr>
                      </thead>
                        
                      <tbody>
                    
                          <tr align="center">
                          <form id="edit_attendance"  action="<?php echo base_url('attendance/edit_attendance');?>" method="post">
                          <input type="hidden" name="attendance_Id" id="attendance_Id" value="<?php echo $user['attendance_Id']; ?>">
                          <input type="hidden" name="edit_attend" id="edit_attend" value="1">
                          <input type="hidden" name="month" id="month" value="<?php echo $_POST['month']; ?>">
                          <td data-title="<?=$this->lang->line('userID')?>">
                                                                         
                                        <?php echo $user['userID']; ?>
                                    </td>
                                    <td data-title="user_name">
                                        <?php echo $user['name']; ?>
                                    </td>
                                    
                                    <?php
                          
                                    $year=date('Y');
                                    if($month==date('m'))
                                    $days=date('t');
                                    else
                                    $days=cal_days_in_month(CAL_GREGORIAN,$month,$year);//date('Y'),date('m')
                                    for ($x = 1; $x <= $days; $x++) {

                                          echo "<td> <select name='leave_type".$x."' id='leave_type".$x."' class='form-control' style='width:85px' required>
                                          <option value=''> </option>";

                                          foreach($leaves as $leave){
                                            ?>
                                              <option value="<?php echo $leave['leavetype_id']; ?>" <?php if($leave['leavetype_id']==$user['a'.$x]) echo 'selected="selected"';?>><?php echo $leave['leave_name'];?></option>';
                                            <?php
                                          }
                                        
                                      echo"</select> </td>";
                                        
                                        }
                                    ?> 
                                    <td data-title="Remarks">

                                    <div class="col-md-6 col-sm-6 ">
                                    <textarea name="remarks" id="remarks" style="width:250px; height:80px;" class="form-control" placeholder="Enter the HR Remarks"></textarea>
                                    </div>
                                        
                                    </td>
                                    <td data-title="Action">
                                    <center>
                                    <button type="submit" class="btn btn-success btn-sm"> Update </button>
                                    </center>
                                    </td>
                                    </form>
                          </tr>
                      
                      </tbody>
                    </table>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <script type="text/javascript">

                
function change_month()
        {
            month = document.getElementById("month").value;
                if(month != '')
                window.location.href = "<?php echo base_url('attendance/view_attendance/'.date('Y').'/');?>"+month+"<?php echo '/'.$this->uri->segment(5); ?>";
        }
        function change_dept()
        {
          department = document.getElementById("department").value;
                if(department != '')
                window.location.href = "<?php echo base_url('attendance/view_attendance/'.date('Y').'/'.$this->uri->segment(4).'/'); ?>"+department;
        }
        </script>