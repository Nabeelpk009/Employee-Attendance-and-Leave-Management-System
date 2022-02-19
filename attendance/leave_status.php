<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Leave Applications</h3>
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
                              <a href="apply_leave"><button type="button" class="btn btn-success btn-sm">Apply for Leave</button></a>
                            </div>
                  </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="overflow-x:scroll;">
                      <table id="datatable-responsive" class="table table-striped table-bordered">
                      <thead align="center">
                        <tr>
                          <th>Sl No.</th>
                                <th>Leave App. ID</th>
                                <th>Type of Leave</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>No. of Days</th>
                                <th>Reason</th>
                                <th>Applied On</th>
                                <th>Status</th>
                                <th>HOD Remarks</th>
                                <th>Last Updated By HOD</th>
                                <th>HR Remarks</th>
                                <th>Last Updated By HR</th>
                                <th>Actions</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                          $i=0;
                        foreach ($leaves as $leave) {
                          $i++;
                          ?>
                          <tr align="center">
                          <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="Referral ID">
                                        <?php echo $leave->leave_id; ?>
                                    </td>
                                    <td data-title="leave_type">
                                        <?php echo $leave->leave_name_full; ?>
                                    </td>
                                    <td data-title="Name of Student">
                                        <?php echo $leave->from_date; ?>
                                    </td>
                                    <td data-title="Class">
                                        <?php echo $leave->to_date; ?>
                                    </td>
                                    <td data-title="Course Prefered">
                                        <?php echo $leave->no_of_days; ?>
                                    </td>
                                    <td data-title="Name of Parent">
                                        <?php echo $leave->reason; ?>
                                    </td>
                                    <td data-title="Notes">
                                        <?php echo $leave->app_timestamp; ?>
                                    </td>
                                    <td data-title="Current Status" style="white-space: nowrap;">
                                        <?php
                                        if($leave->hod_status==0)
                                        echo"<span style='color:orange;'>Pending Approval From Reporting Head</span>";
                                    else if($leave->hod_status==-1)
                                        echo"<span style='color:red;'>Rejected By Reporting Head</span>";
                                    else if($leave->hod_status>=1 && $leave->hr_status==0)
                                        echo"<span style='color:blue;'>Approved By Reporting Head</span>";
                                    else if($leave->hr_status==1)
                                        echo"<span style='color:green;'>Leave Approved </span>";
                                    else if($leave->hr_status==2)
                                        echo"<span style='color:red;'>Rejected By HR</span>";
                                        
                                        ?>
                                    </td>
                                    <td data-title="HOD Remarks">
                                        <?php echo $leave->hod_remarks; ?>
                                    </td>
                                    <td data-title="Last Updated By HOD" style="white-space: nowrap;">
                                        <?php echo $leave->last_update_by_hod; ?>
                                    </td>

                                    <td data-title="HR Remarks">
                                        <?php echo $leave->hr_remarks; ?>
                                    </td>
                                    <td data-title="Last Updated By HR" style="white-space: nowrap;">
                                        <?php echo $leave->last_update_by_hr; ?>
                                    </td>

                                    <td data-title="Action" style="width:200px">
                                    <?php if($leave->hod_status==0) {?>
                              <a href="edit_leave/<?php echo $leave->leave_id; ?>"><button type="button" class="btn btn-info" ><i class="fa fa-edit"></i> Edit </button></a>
                              <a href="<?php echo base_url()."attendance/delete_leave?id=".$leave->leave_id ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are You Sure Want to Delete?')" ><i class="fa fa-trash-o"></i> </button></a>
                             
                              <?php }?>
                                    </td>                            
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
          function delete_trainer(str)
                {
                  var n=document.getElementById("id"+str).innerText;
                  var r = confirm("Are You Sure Want to Delete '"+n+"' ?");
                  if (r == true) {
                    var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     alert("Deleted Successfully.");
                     window.location.reload();
                    }
                  };
                  xhttp.open("GET", "delete_trainer?id="+str, true);
                  xhttp.send();
                  } else {
                    txt = "You pressed Cancel!";
                  }
                  
                }
        </script>