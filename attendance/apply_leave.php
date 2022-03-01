<!-- page content -->

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Apply for Leave</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>INTERVAL™<small>* Indicates Mandatory Fields</small></h2><div class="pull-right">
                              <a href="leave_status"><button type="button" class="btn btn-success btn-sm">View Applications</button></a>
                            </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" autocomplete="off">
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_of_days">Type of Leave<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                      <select name="leave_type" id="leave_type" class="form-control" onchange="cal3(this.value)" required>
                                <option value=""> </option>
                              <?php 
                              foreach($leaves as $leave){
                                  echo '<option value="'.$leave['leavetype_id'].'" >'.$leave['leave_name_full'].'</option>';
                              }?>
                            </select>
                            </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="from_date">Available Leave <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="Available_Leave" name="Available_Leave" required="required" class="form-control " readonly>
                        </div>
                      </div>
                     
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="from_date">From Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="date" id="from_date" name="from_date" required="required" class="form-control " onchange="cal()" required>
                        </div>
                      </div>
          
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="to_date">To Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="date" id="to_date" name="to_date" required="required" class="form-control " onchange="cal();cal2();" required>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_of_days">No.of Days<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="no_of_days" name="no_of_days" required="required" class="form-control "  readonly>
                        </div>
                      </div>
  
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="reason">Reason <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="reason" id="reason" class="form-control" placeholder="Enter the Reason for Leave" required></textarea>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <br>
                          <center><button class="btn btn-dark" type="reset">Reset</button>
                          <button type="submit" id="submit" class="btn btn-info"> Apply <i class='fa fa-floppy-o'></i></button>
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
  <script type="text/javascript">
    
        function GetDays()
        {
                var fromdate = new Date(document.getElementById("from_date").value);
                var todate = new Date(document.getElementById("to_date").value);
                return parseInt((todate - fromdate) / (24 * 3600 * 1000)+1);
        }

        function GetYear()
        {
                var fromyear = new Date(document.getElementById("from_date").value);
                var toyear = new Date(document.getElementById("to_date").value);
                var fyear = fromyear.getFullYear();
                var tyear = toyear.getFullYear();
                var yeardiff = tyear-fyear;
                return yeardiff;
        }

        
        function cal3(value)
        {
          $.post("<?php base_url(); ?>get_leave_count",
            {leaveTypeId:value},
          function(data, status){
              $("#Available_Leave").val(data);
              if (data == 0)
              document.getElementById('submit').disabled = true;
              else
              document.getElementById('submit').disabled = false;
          });
        }

        function cal2()
        {
         if(document.getElementById("no_of_days"))
         {
            if(GetYear()==1)
            {
              document.getElementById('submit').disabled = true;
              alert('You can not apply for leave in between the selected date"".');
            }
          }
        }

        function cal()
        {
        if(document.getElementById("to_date"))
        {        
            document.getElementById("no_of_days").value=GetDays();
            
            if(GetDays()>90)
            {
              document.getElementById('submit').disabled = true;
              alert('Leave can not be applied for more than 90 days.');
            }
            else
            {
              document.getElementById('submit').disabled = false;
            }
        }  
       }

  </script>       
        
