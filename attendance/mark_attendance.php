<!-- page content -->

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Mark Attendance</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>INTERVAL™<small>* Indicates Mandatory Fields</small></h2><div class="pull-right">
                    <a href="attendance_status"><button type="button" class="btn btn-success btn-md">Attendance Status</button></a>
                            </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="demo-form2" action="<?php echo base_url('attendance/mark_attendance');?>" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" autocomplete="off">
            
                               
                      
   
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="monthyear">Month & Year <span class="readonly">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text"name="monthyear" id="monthyear"  readonly="readonly" class="form-control " value="<?php echo date('M-Y'); ?>" >
                         
                        </div>
                      </div>
                      
                      <!--<div class="item form-group">-->
                      <!--  <label class="col-form-label col-md-3 col-sm-3 label-align" for="attendance_day">Day <span class="readonly">*</span>-->
                      <!--  </label>-->
                      <!--  <div class="col-md-6 col-sm-6 ">-->
                      <!--      <select name="attendance_day" id="attendance_day" class="form-control" required>-->
                      <!--          <option value="">Select Day</option>-->
                                <?php
                                //     for ($x = 1; $x <= date('d'); $x++) {
                                //   echo "<option value='$x'>$x</option>";
                                // }
                                ?>
                      <!--      </select>-->
                      <!--  </div>-->
                      <!--</div> -->
                          
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="attendance_date">Date<span class="readonly">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="attendance_date" id="attendance_date" class="form-control" required>
                                <option value="">Select Date</option>
                               <?php echo '<option value="'.date('Y-m-d', strtotime('now - 1day')).'" >'.date('Y-m-d', strtotime('now - 1day')).'</option>'; ?>
                               <?php echo '<option value="'.date('Y-m-d', strtotime('now')).'" >'.date('Y-m-d', strtotime('now')).'</option>'; ?>
                               </select>
                            </div>
                    
                      </div> 

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="attendance">Attendance<span class="readonly">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="attendance" id="attendance" class="form-control" required>
                            
                              <?php 
                              foreach($leave as $lv){
                                  echo '<option value="'.$lv['leavetype_id'].'" >'.$lv['leave_name_full'].'</option>';
                              }?>
                                 
                            </select>
                        </div>
                      </div> 
                      
                      
                      
                                       
                      
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <br>
                          <center>
                          <button type="submit" class="btn btn-info"> Submit <i class='fa fa-floppy-o'></i></button>
                        </center>
                        </div>
                      </div>

                    </form>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- /page content -->
        
        

<!-- <script>
function myFunction(val) {
var d = new Date();
var ty =val;
var newDate = new Date(d.toString().split(":")[0].slice(0,-2) + ty);
newDate.setMinutes( newDate.getMinutes() + <?php echo $trainer_student['data']->trainer_session_duration; ?>);
var a= newDate.toLocaleTimeString('it-IT');
document.getElementById("to_time_display").value=a;
document.getElementById("to_time").value=a;
// alert(a);
}

</script> -->