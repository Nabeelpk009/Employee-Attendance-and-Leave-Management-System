<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

	function __construct()
        {
            parent::__construct();
            
            $this->load->model("employee_model");
            $this->load->model("attendance_m");
            $this->load->model("main_model");
			//load our second db and put in $db2
            $this->db2 = $this->load->database('automation', TRUE);

			
        }
        
        public function export()
        {
        if($this ->session-> userdata('export')=="datatable")
        {
            $_SESSION['export'] = "datatable-buttons"; 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $_SESSION['export'] = "datatable"; 
            redirect($_SERVER['HTTP_REFERER']);
        }
        }
	
	public function index()
	{
		header("location:".base_url()."employee/login");
	}

	public function viewmd5()
	{
		echo md5($this->uri->segment(3));
	}
	
	public function apply_leave()
	{
		if($this ->session-> userdata('user_type')=="")
		header("location:".base_url()."employee/index");
		date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					 $now = date('Y-m-d H:i:s');
		if($_POST)
		{
			$array = array(
					"userID" => $this ->session-> userdata('userID'),
					"leave_type_id" => $this->input->post("leave_type"),
					"from_date" => $this->input->post("from_date"),
					"to_date" => $this->input->post("to_date"),
					"no_of_days" => $this->input->post("no_of_days"),
					"reason" => $this->input->post("reason"),
					"app_timestamp" => $now,
					"hr_status" => 0
				);

				$this->attendance_m->insert_leave($array);
				echo "<script>alert('Leave Applied Successfully.');window.location.href = '".base_url()."attendance/leave_status"."';</script>";
		}
		else
		{
		$data['leaves']=$this->attendance_m->fetch_leave();	
		//$data['leavesavilable']=$this->attendance_m->fetch_leave_avilable($this ->session-> userdata('userID'));
		$userID=$this ->session-> userdata('userID');
		$data['profile']=$this->employee_model->fetch_profile($userID);    
			$this->load->view('employee/templates/header', $data);
			$this->load->view('employee/pages/attendance/apply_leave', $data);
			$this->load->view('employee/templates/footer', $data);
		}
	}
	
	public function leave_status()
	{   
		if($this ->session-> userdata('user_type')=="")
		header("location:".base_url()."employee/index");  
		$data['leaves'] = $this->attendance_m->get_leaves($this->session->userdata('userID'));
			$this->load->view('employee/templates/header', $data);
			$this->load->view('employee/pages/attendance/leave_status', $data);
			$this->load->view('employee/templates/footer', $data);
		
	}

	public function delete_leave()
	{
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$this->load->model('attendance_m');
			$this->attendance_m->row_delete($id);
			redirect('attendance/leave_status');
		}
		// $leave_id=$this->uri->segment(3);
		// if($_POST)
		// {
	    // $this->load->attendance_m->emp_delete_leave($leave_id);
		// echo "<script>alert('Deleted Successfully.');window.location.href = '".base_url()."attendance/leave_status"."';</script>";   
		//}
	}

	public function emp_leave_status()
	{   
		if($this ->session-> userdata('user_type')=="")
		header("location:".base_url()."employee/index");  
		$data['leaves'] = $this->attendance_m->emp_get_leaves($this->session->userdata('userID'));
			$this->load->view('employee/templates/header', $data);
			$this->load->view('employee/pages/attendance/emp_leave_status', $data);
			$this->load->view('employee/templates/footer', $data);
		
	}
	
	public function hod_leave_status()
	{   
		if($this ->session-> userdata('user_type')=="")
		header("location:".base_url()."employee/index");  
		  
		   $data['leaves'] = $this->attendance_m->hod_get_leaves($this->session->userdata('userID'));
			$this->load->view('employee/templates/header', $data);
			$this->load->view('employee/pages/attendance/hod_leave_status_view', $data);
			$this->load->view('employee/templates/footer', $data);
		
	}

	public function edit_leave()
	{   $leave_id=$this->uri->segment(3);
	
		
		$data['leave'] = $this->attendance_m->emp_get_leave($leave_id);
		//$array2 = array(" emp_id" =>$leave->userID," emp_id" =>$leave->userID);
		if($this ->session-> userdata('user_type')=="")
		header("location:".base_url()."employee/index");
		date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					 $now = date('Y-m-d H:i:s');
		if($_POST)
		{
			
			$array = array(
					
					"userID" => $this ->session-> userdata('userID'),
					"leave_type_id" => $this->input->post("leave_type"),
					"from_date" => $this->input->post("from_date"),
					"to_date" => $this->input->post("to_date"),
					"no_of_days" => $this->input->post("no_of_days"),
					"reason" => $this->input->post("reason"),
					"app_timestamp" => $now,
					"hr_status" => 0
					
				);

				$this->attendance_m->edit_leave('leaveapp','leave_id',$leave_id,$array);
				echo "<script>alert('Leave Updated Successfully.');window.location.href = '".base_url()."attendance/leave_status"."';</script>";
				//$this->attendance_m->update_leave($data['leave']);
				

		}
		else
		{
			$data['leaves']=$this->attendance_m->fetch_leave();
			$this->load->view('employee/templates/header', $data);
			$this->load->view('employee/pages/attendance/edit_leave', $data);
			$this->load->view('employee/templates/footer', $data);
		}
		
	}

	
	public function emp_leave_update()
	{   $leave_id=$this->uri->segment(3);
	
		
		$data['leave'] = $this->attendance_m->emp_get_leave($leave_id);
		//$array2 = array(" emp_id" =>$leave->userID," emp_id" =>$leave->userID);
		
		date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					 $now = date('Y-m-d H:i:s');
		if($_POST)
		{
			
			$array = array(
					"hr_remarks" => $this->input->post("hr_remarks"),
					"hr_status" => $this->input->post("hr_status"),
					"last_update_by_hr" => $now
					
				);

				$this->attendance_m->update_data('leaveapp','leave_id',$leave_id,$array);
				echo "<script>alert('Status Updated Successfully.');window.location.href = '".base_url()."attendance/emp_leave_status"."';</script>";
				//$this->attendance_m->update_leave($data['leave']);
				

		}

		$fromdate = date('d',strtotime($data['leave']->from_date));
		$todate = date('d',strtotime($data['leave']->to_date));
		$data3 = $todate-$fromdate;
		$from_month = date('m',strtotime($data['leave']->from_date));
		$to_month = date('m',strtotime($data['leave']->to_date));
		$month_diff = ($to_month-$from_month)+1;		
	
		if($this->input->post("hr_status")==1 && $month_diff>2)
		{
			$data1 = intval(date('d',strtotime($data['leave']->from_date)));
			$lastdate = date('t',strtotime($data['leave']->from_date));
			$firstdate = date('1',strtotime($data['leave']->to_date));
			$data2 = intval(date('d',strtotime($data['leave']->to_date)));
			//$day="a".date('d',strtotime($data['leave']->to_date));
			$month=date('m',strtotime($data['leave']->from_date));
			$month3=date('m',strtotime($data['leave']->to_date));
			$month2 = intval($month)+1;
			
			$data3 = cal_days_in_month(CAL_GREGORIAN, $month2, date('Y'));
			
			$year=date('Y',strtotime($data['leave']->from_date));

				$update_longleave = array();

				for ($x = $data1; $x <= $lastdate; $x++)
				$update_longleave['a'.$x] = $this->input->post('leave_type');

				$update_longleave_2 = array();

				for ($x = $firstdate; $x <= $data3; $x++)
				$update_longleave_2['a'.$x] = $this->input->post('leave_type');
				
				$update_longleave_3 = array();

				for ($x = $firstdate; $x <= $data2; $x++)
				$update_longleave_3['a'.$x] = $this->input->post('leave_type');
			
			$this->attendance_m->update_longleave($data['leave']->userID,$year,intval($month),$update_longleave);
			$this->attendance_m->update_longleave2($data['leave']->userID,$year,intval($month2),$update_longleave_2);
			$this->attendance_m->update_longleave3($data['leave']->userID,$year,intval($month3),$update_longleave_3);
			echo "<script>alert('Status Updated Successfully.');window.location.href = '".base_url()."attendance/emp_leave_status"."';</script>";
		}


		else if($this->input->post("hr_status")==1 && $data3<0 )
		{
			$data1 = intval(date('d',strtotime($data['leave']->from_date)));
			$lastdate = date('t',strtotime($data['leave']->from_date));
			$firstdate = date('1',strtotime($data['leave']->to_date));
			$data2 = intval(date('d',strtotime($data['leave']->to_date)));
			//$day="a".date('d',strtotime($data['leave']->to_date));
			$month=date('m',strtotime($data['leave']->from_date));
			$month2=date('m',strtotime($data['leave']->to_date));
			$year=date('Y',strtotime($data['leave']->from_date));
			//$array2 = array(
				$update_leave = array();

				for ($x = $data1; $x <= $lastdate; $x++)
				$update_leave['a'.$x] = $this->input->post('leave_type');
				//$day => $this->input->post("leave_type"),
				$update_leave_2 = array();

				for ($x = $firstdate; $x <= $data2; $x++)
				$update_leave_2['a'.$x] = $this->input->post('leave_type');
			
			$this->attendance_m->update_leave($data['leave']->userID,$year,intval($month),$update_leave);
			$this->attendance_m->update_leave2($data['leave']->userID,$year,intval($month2),$update_leave_2);
			echo "<script>alert('Status Updated Successfully.');window.location.href = '".base_url()."attendance/emp_leave_status"."';</script>";
		}
		else if($this->input->post("hr_status")==1)
		{
			$data1 = intval(date('d',strtotime($data['leave']->from_date)));
			$data2 = intval(date('d',strtotime($data['leave']->to_date)));
			//$day="a".date('d',strtotime($data['leave']->to_date));
			$month3=date('m',strtotime($data['leave']->from_date));
			$year=date('Y',strtotime($data['leave']->from_date));
			//$array2 = array(
				$update_leave_3 = array();

				for ($x = $data1; $x <= $data2; $x++)
				$update_leave_3['a'.$x] = $this->input->post('leave_type');
				//$day => $this->input->post("leave_type"),
				
			
			$this->attendance_m->update_leave3($data['leave']->userID,$year,intval($month3),$update_leave_3);
			 
			echo "<script>alert('Status Updated Successfully.');window.location.href = '".base_url()."attendance/emp_leave_status"."';</script>";
		}
	// 	else {
	// 	echo "<script>alert('Status Updated Successfully.');window.location.href = '".base_url()."attendance/emp_leave_status"."';</script>";

	// }

		else
		{

			$this->load->view('employee/templates/header', $data);
			$this->load->view('employee/pages/attendance/leave_view', $data);
			$this->load->view('employee/templates/footer', $data);
		}
		
	}

	public function hod_leave_update()
	{   $leave_id=$this->uri->segment(3);
	
		
		$data['leave'] = $this->attendance_m->hod_get_leave($leave_id);
		//$array2 = array(" emp_id" =>$leave->userID," emp_id" =>$leave->userID);
		
		date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					 $now = date('Y-m-d H:i:s');
		if($_POST)
		{
			if($this->input->post("hod_status")==1)
		   {
			$array = array(
					"hod_remarks" => $this->input->post("hod_remarks"),
					"hod_status" => $this->input->post('hod_status'),
					"hod_name" => $this ->session-> userdata('userID'),
					"last_update_by_hod" => $now
					
				);

				$this->attendance_m->update_status('leaveapp','leave_id',$leave_id,$array);
				echo "<script>alert('Status Updated Successfully.');window.location.href = '".base_url()."attendance/hod_leave_status"."';</script>";
				//$this->attendance_m->update_leave($data['leave']);
				
			}
			else if($this->input->post("hod_status")==-1)
		    {
			$array = array(
					"hod_remarks" => $this->input->post("remarks"),
					"hod_status" => $this->input->post("hod_status"),
					"hod_name" => $this ->session-> userdata('userID'),
					"last_update_by_hod" => $now
					
				);

				$this->attendance_m->update_status('leaveapp','leave_id',$leave_id,$array);
				echo "<script>alert('Status Updated Successfully.');window.location.href = '".base_url()."attendance/hod_leave_status"."';</script>";
				//$this->attendance_m->update_leave($data['leave']);
				
			}
		}
		//
		else
		{

			$this->load->view('employee/templates/header', $data);
			$this->load->view('employee/pages/attendance/hod_leave_view', $data);
			$this->load->view('employee/templates/footer', $data);
		}
		
	}


    public function mark_attendance()
	{
		if($this ->session-> userdata('user_type')=="")
		header("location:".base_url()."employee/index");  
	
	 	date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
   		$now = date('Y-m-d H:i:s');
		   $day=date('d',strtotime($this->input->post("attendance_date")));
		   $month=date('m',strtotime($this->input->post("attendance_date")));
		   $year=date('Y',strtotime($this->input->post("attendance_date")));   
		$leave_id_value=$this->attendance_m->check_leave(intval($day),intval($month),$year,$this ->session-> userdata('userID'));

		if($_POST && $leave_id_value->leavetypeid <= 7 && $leave_id_value->leavetypeid != 3 )
	    {
		 $day2=date('D',strtotime($this->input->post("attendance_date")));
		 $day3=date('d',strtotime($now));
		 $day=date('d',strtotime($this->input->post("attendance_date")));
		 $month=date('m',strtotime($this->input->post("attendance_date")));
		 $year=date('Y',strtotime($this->input->post("attendance_date")));
		 
		 $present = array(

				    "userID" => $this ->session-> userdata('userID'),
					"attendance" => $this->input->post("attendance")
				
				);
		$timestamp = array(

				    "userID" => $this ->session-> userdata('userID'),
					"attendance_timestamp" => $now					
				);

				$this->attendance_m->update_attendance($present,intval($day),$day2,intval($day3),intval($month),$year);
				$this->attendance_m->update_timestamp($timestamp,intval($day),$day2,intval($day3),intval($month),$year);
				echo "<script>alert(' Attendance marked Successfully.');window.location.href = '".base_url()."attendance/mark_attendance"."';</script>";
	     }
	     else
	     {
			
			$data['leave']=$this->attendance_m->fetch_leave_present();	
			$userID=$this ->session-> userdata('userID'); 
    	    $this->load->view('employee/templates/header');
            $this->load->view('employee/pages/attendance/mark_attendance',$data);
            $this->load->view('employee/templates/footer');
			
	    }
		
	}

	public function view_attendance()
	{   
	    if($this ->session-> userdata('user_type')=="")
	    header("location:".base_url()."employee/index");
		if($this->uri->segment(5)=="")
			{
				$data['month']=date('m');
				$data['dept']=0;
			redirect(base_url('attendance/view_attendance/'.date('Y').'/'.date('m')).'/0');
			}
			else
			{
				$data['month']=$this->uri->segment(4);
				$data['dept']=$this->uri->segment(5);
			}

		$data['users']=$this->attendance_m->fetch_attendance_view($data['dept'],$data['month']);
		$data['departments']=$this->attendance_m->fetch_department();
		$data['attendance']=$this->attendance_m->fetch_attendance();
		$data['leaves']=$this->attendance_m->fetch_leave_all();
    	    $this->load->view('employee/templates/header');
            $this->load->view('employee/pages/attendance/view_attendance', $data);
            $this->load->view('employee/templates/footer');
	    
	}

	public function attendance_status()
	{   
	    if($this ->session-> userdata('user_type')=="")
	    header("location:".base_url()."employee/index");
		if($this->uri->segment(4)=="")
		{
			$data['month']=date('m');
		redirect(base_url('attendance/attendance_status/'.date('Y').'/'.date('m')).'');
		}
		else
		{
			$data['month']=$this->uri->segment(4);
		}
		$data['users']=$this->attendance_m->emp_attendance_status($this->session->userdata('userID'),$data['month']);
		$data['departments']=$this->attendance_m->fetch_department();
		$data['attendance']=$this->attendance_m->fetch_attendance();
		$data['leaves']=$this->attendance_m->fetch_leave_all();
    	    $this->load->view('employee/templates/header');
            $this->load->view('employee/pages/attendance/attendance_status', $data);
            $this->load->view('employee/templates/footer');
	    
	}
	
	public function edit_attendance()
	{   
		date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');
		$year=date('Y');
		$days=cal_days_in_month(CAL_GREGORIAN,$this->input->post("month"),$year);
		
		
	    if($_POST && $this->input->post('edit_attend')=="1")
	    {
			$update_attendance2 = array(
				"remarks" => $this->input->post("remarks"),
				"edit_timestamp" =>$now
		   );
	        $update_attendance = array();

			 for ($x = 1; $x <= $days; $x++)
			 	$update_attendance['a'.$x] = $this->input->post('leave_type'.$x);
			

			$this->attendance_m->emp_attendance_update($update_attendance,$this->input->post("attendance_Id"),$update_attendance2);
	        
			echo "<script>alert('Updated Successfully.');window.location.href = '".base_url()."attendance/view_attendance"."';</script>";
	    }
	    else
	    {
	    
		$data['month']=$this->input->post("month");
		$data['user']=$this->attendance_m->attendance_edit($this->input->post("attendance_Id"),$data['month']);
		$data['leaves']=$this->attendance_m->fetch_leave_all();
    	    $this->load->view('employee/templates/header');
            $this->load->view('employee/pages/attendance/edit_attendance', $data);
            $this->load->view('employee/templates/footer');
	    
	}
	

}
// 	public function fine_payment()
// 	{   
// 	    if($this ->session-> userdata('user_type')=="")
// 	    header("location:".base_url()."employee/index");
//      $data['fines']=$this->fine_m->fetch_fines_fine($this->session->userdata('userID'));
// 		$data['profile']=$this->employee_model->fetch_profile($this->session->userdata('userID'));    
//     	    $this->load->view('employee/templates/header', $data);
//             $this->load->view('employee/pages/fine/fine_payment', $data);
//             $this->load->view('employee/templates/footer', $data);
	    
// 	}

public function get_pendingcount()
	{   
		$cnt=$this->attendance_m->get_pending_count();
		echo $cnt;
	}

public function get_pendingcount_hod()
	{   
		//$userID=$this ->session-> userdata('userID'); 
		$cnt=$this->attendance_m->get_pending_count_hod($this ->session-> userdata('userID'));
		//var_dump($cnt->num);
		echo $cnt;
	}
// public function view_leave_notification()
//     {
//         $leaves = $this->attendance_m->emp_get_leaves($this->session->userdata('userID'),0);
//         echo '<table id="datatable-responsive" class="table table-striped table-bordered">
//                       <thead align="center">
// 					  <tr>
// 					  <th>Sl No.</th>
// 							<th>Name</th>
// 							<th>Type of Leave</th>
// 							<th>From Date</th>
// 							<th>To Date</th>
// 							<th>No. of Days</th>
// 							<th>Applied On</th>
// 							<th>Status</th>
// 							<th>Last Updated On</th>
// 							<th>Last Updated By</th>
							
// 					</tr>
//                       </thead>
//                       <tbody>';
//                       $i=0;
//                         foreach ($leaves as $leave) {
//                           $i++;
//         echo    '   <tr align="center">
//                           <td>'.$i.'</td>
//                           <td>'.$leave->name.'</td>
//                           <td>'.$leave->leave_name_full.'</td>
//                           <td>'.$leave->from_date.'</td>
//                           <td>'.$leave->to_date.'</td>
//                           <td>'.$leave->no_of_days.'</td>
//                           <td>'.$leave->app_timestamp.'</td>';

                          
// 						  if($leave->status==0)
// 							echo  '<td><span style="color:orange;">Pending for Approval</span><td>';
// 						  else if($leave->status==1)
// 							echo  '<td><span style="color:green;">Approved</span><td>';
// 						  else if($leave->status==2)
// 						  	echo  '<td><span style="color:red;">Rejected</span><td>';
						  
//                         echo '<td>'.$leave->last_update_on.'</td>';
                          
//             echo ' </tr>';
//                         }
//         echo    '</tbody> </table>';
//    }

 }