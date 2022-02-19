<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Attendance View</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    <div class="title_right">
                            <div class="pull-right">
                            <select class="form-control " id="department" onchange="change_dept()">

                                    <option value="0" <?php if(0==$this->uri->segment(5)) echo 'selected="selected"';?> >All</option>
                                    <?php 
                                      foreach($departments as $dept):?>
                                          <option value="<?php echo $dept['dept_id']; ?>" <?php if($dept['dept_id']==$this->uri->segment(5)) echo 'selected="selected"';?>><?php echo $dept['dept_name'];?></option>
                                      <?php endforeach ?>
                                </select>
                            </div>
                  </div>
                    <div class="title_right">
                            <div class="pull-right">
                              <select class="form-control " id="month" onchange="change_month()">
                                    <option value=''>Month</option>
                                    <option value='01' <?php if($month == 1) echo "selected"; ?>>Janaury</option>
                                    <option value='02' <?php if($month == 2) echo "selected"; ?>>February</option>
                                    <option value='03' <?php if($month == 3) echo "selected"; ?>>March</option>
                                    <option value='04' <?php if($month == 4) echo "selected"; ?>>April</option>
                                    <option value='05' <?php if($month == 5) echo "selected"; ?>>May</option>
                                    <option value='06' <?php if($month == 6) echo "selected"; ?>>June</option>
                                    <option value='07' <?php if($month == 7) echo "selected"; ?>>July</option>
                                    <option value='08' <?php if($month == 8) echo "selected"; ?>>August</option>
                                    <option value='09' <?php if($month == 9) echo "selected"; ?>>September</option>
                                    <option value='10' <?php if($month == 10) echo "selected"; ?>>October</option>
                                    <option value='11' <?php if($month == 11) echo "selected"; ?>>November</option>
                                    <option value='12' <?php if($month == 12) echo "selected"; ?>>December</option>
                              </select>
                            </div>
                  </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="overflow-x:scroll;">
                      <table id="datatable" class="table table-striped table-bordered" data-page-length='250' width="100%">
                      <thead align="center">
                        <tr>
                          <th>Sl No.</th>
                          <th>Emp ID</th>
                          <th>Employee Name</th>
                          <th>Father's/Husband's Name </th>
                          <th>Designation</th>
                          <th>Department</th>
                          <th>Gender </th>
                          <th>Date of Joining</th>
                          <th>Date of Birth</th>
                          <?php
                          
                          $year=date('Y');
                            if($month==date('m'))
                            $days=date('t');
                            
                            else
                            $days=cal_days_in_month(CAL_GREGORIAN,$month,$year);//date('Y'),date('m')
                            for ($x = 1; $x <= $days; $x++) {
                                  echo "<th>$x </th>";
                                
                                }
                            ?> 
                            
                          <th>Total Present(P,OD,COFF,WFH & HD)</th>
                          <th>Total WO </th>
                          <th>Total HD </th>
                          <th>Total HF </th>
                          <th>Total A </th>
                          <th>Total LWP </th>
                          <th>Total CL </th>
                          <th>Total SL </th>
                          <th>Total PL </th>
                          <th>Last Month (-/+)Days </th>
                          <th>Total Payable Days </th>
                          <th>Remarks if Any </th>
                          <th>Last Updated On</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                        
                      <tbody>
                      <?php 
                          $i=0;

 
                          
                        foreach ($users as $user) {

                          $i++;
                          $absent=0;
                          $p=0;
                          $wo=0;
                          $co=0;
                          $od=0;
                          $wfh=0;
                          $hf=0;
                          $hd=0;
                          $cl=0;
                          $sl=0;
                          $pl=0;
                          $ml=0;
                          $lwp=0;
                          ?>
                          <tr align="center">
                          <form id="view_attendance"  action="<?php echo base_url('attendance/edit_attendance');?>" method="post">
                          <input type="hidden" name="attendance_Id" id="attendance_Id" value="<?php echo $user['attendance_Id']; ?>">
                          <input type="hidden" name="month" id="month" value="<?php echo $this->uri->segment(4); ?>">
                       
                          <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                   
                                    <td data-title="userID">
                                        <?php echo $user['userID']; ?>
                                    </td>
                                    <td data-title="user_name">
                                        <?php echo $user['name']; ?>
                                    </td>
                                    <td data-title="parent_name">
                                        <?php echo $user['n_parent']; ?>
                                    </td>
                                    <td data-title="designation">
                                        <?php echo $user['usertype']; ?>
                                    </td>
                                    <td data-title="dept_name">
                                        <?php echo $user['dept_name']; ?>
                                    </td>
                                    <td data-title="gender">
                                        <?php echo $user['sex']; ?>
                                    </td>
                                    <td data-title="date_of_join">
                                        <?php echo $user['jod']; ?>
                                    </td>
                                    <td data-title="date_of_birth">
                                        <?php echo $user['dob']; ?>
                                    </td>
                                    <?php
                             // $count=0;
                              for ($a = 1; $a <= $days; $a++) {


                                //echo"<td>".$user['lv'.$a]."</td>";
                                
                                  if($user['a'.$a]==0){
                                  echo"<td><span style='color:red;'><b>A</b></span></td>";
                                  ++$absent;
                                  }
                              else if($user['a'.$a]==1){
                                  echo"<td><span style='color:rgb(0, 179, 0);'><b>P</b></span></td>";
                                  ++$p;
                              }
                              else if($user['a'.$a]==2){
                                  echo"<td><span style='color:blue;'><b>WO</b></span></td>";
                                  ++$wo;
                              }
                              else if($user['a'.$a]==3){
                                  echo"<td><span style='color:blue;'>CO</span></td>";
                                  ++$co;
                              }
                              else if($user['a'.$a]==4){
                                  echo"<td><span style='color:blue;'>OD</span></td>";
                                  ++$od;
                              }
                              else if($user['a'.$a]==5){
                                  echo"<td><span style='color:blue;'>WFH</span></td>";
                                  ++$wfh;
                              }
                              else if($user['a'.$a]==6){
                                  echo"<td><span style='color:blue;'>HF</span></td>";
                                  ++$hf;
                              }
                              else if($user['a'.$a]==7){
                                  echo"<td><span style='color:blue;'>HD</span></td>";
                                  ++$hd;
                              }
                              else if($user['a'.$a]==8){
                                  echo"<td><span style='color:blue;'>L-CL</span></td>";
                                  ++$cl;
                              }
                              else if($user['a'.$a]==9){
                                  echo"<td><span style='color:blue;'>L-SL</span></td>";
                                  ++$sl;
                              }
                              else if($user['a'.$a]==10){
                                  echo"<td><span style='color:blue;'>L-PL</span></td>";
                                  ++$pl;
                              }
                              else if($user['a'.$a]==11){
                                  echo"<td><span style='color:blue;'>L-ML</span></td>";
                                  ++$ml;
                              }
                              else if($user['a'.$a]==12){
                                  echo"<td><span style='color:blue;'>LWP</span></td>";
                                  ++$lwp;
                              }


                            //      // $count=$count+$cro_student_trainer['day'.$a];
                              }
                              ?>
                               <td data-title="Total_Present" style='color:rgb(0, 179, 0);'>
                                        <?php echo $p+$co+$od+$wfh ; ?>
                                    </td>
                               <td data-title="Total_WO">
                                        <?php echo $wo ; ?>
                                    </td>
                                <td data-title="Total_HD">
                                        <?php echo $hd ; ?>
                                    </td>
                                <td data-title="Total_HF">
                                        <?php echo $hf; ?>
                                    </td>
                                <td data-title="Total_absent" style='color:red;'>
                                        <?php echo $absent; ?>
                                    </td>
                                <td data-title="Total_LWP">
                                        <?php echo $lwp; ?>
                                    </td>
                                <td data-title="Total_CL">
                                        <?php echo $cl; ?>
                                    </td>
                                <td data-title="Total_SL">
                                        <?php echo $sl ; ?>
                                    </td>
                                <td data-title="Total_PL">
                                        <?php echo $pl ; ?>
                                    </td>
                                <td data-title="Last_Month_Days">
                                        <?php echo $co; ?>
                                    </td>
                                <td data-title="Total_Payable_Days"><b>
                                        <?php echo  $p+$od+$co+$wfh+$hd+$wo+($hf/2)+$cl+$sl+$pl; ?>
                            </b></td>
                                <td data-title="Remarks">
                                        <?php echo $user['remarks'];  ?>
                                    </td>
                                <td data-title="Last Updated On">
                                        <?php echo $user['edit_timestamp']; ?>
                                </td>
                                <td data-title="Actions">
                               
                                <center>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit </button>
                                </center>
                            
                                </td>
                            </form>
                                    
                          </tr>
                      <?php
                      }
                      ?>
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