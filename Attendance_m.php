<?php

class Attendance_m extends CI_Model {  

    function __construct(){
            parent::__construct();
            $this->db2 = $this->load->database('automation', TRUE);
            $this->db3 = $this->load->database('quiz', TRUE);     
        }


        public function insert_leave($data)
        {
          $this->db2->insert("leaveapp", $data);
        }

        public function row_delete(){
          $id=$_GET['id'];
          $this->db2->where('leave_id', $id);
          $this->db2->delete('leaveapp');
      }
      //   public function emp_delete_leave($leave_id){

      //     $this->db2->where('leave_id', $leave_id);
      //     $this->db2->delete('leaveapp');
      // }

        public function get_pending_count()
        {
          $this->db2->where("leaveapp.hod_status",1);
          $this->db2->where("leaveapp.hr_status",0);
          $query = $this->db2->get('leaveapp');
          $num = $query->num_rows();
          return $num;
        }

        public function get_pending_count_hod($userID)
        {
          $this->db2->join('user', 'user.userID = leaveapp.userID', 'left');
          $this->db2->where("leaveapp.hod_status",0);
          //$this->db2->where("leaveapp.status",0);
          $this->db2->where("user.reporting_head",$userID);
          $query = $this->db2->get('leaveapp');
          $num = $query->num_rows();
          return $num;
        }
        
        public function get_leaves($userid,$year)
        {
          $this->db2->order_by("leave_id", "desc");
          $this->db2->join('leave_type', 'leave_type.leavetype_id = leaveapp.leave_type_id','left');
          $this->db2->where("leaveapp.userID", $userid);
          $this->db2->like("leaveapp.from_date", $year);
          $query = $this->db2->get('leaveapp');
          return $query->result();
        }

      public function emp_get_leaves($userid,$year)
      {
        $this->db2->select("*, user.name emp_name, u.name approval_name");
        $this->db2->order_by("leave_id", "desc");
        $this->db2->join('leave_type', 'leave_type.leavetype_id = leaveapp.leave_type_id','left');
        $this->db2->join('user', 'user.userID = leaveapp.userID', 'left');
        $this->db2->join('user as u', 'u.userID = leaveapp.hod_name', 'left');
        $this->db2->like("leaveapp.from_date", $year);
        $query = $this->db2->get('leaveapp');
        return $query->result();
      }

      
      public function hod_get_leaves($userid,$year)
      {
        $this->db2->order_by("leave_id", "desc");
       // $this->db2->join('leave_type', 'leave_type.leavetype_id = leaveapp.leave_type_id','left');
        $this->db2->join('leave_type', 'leave_type.leavetype_id = leaveapp.leave_type_id','left');
        $this->db2->join('user', 'user.userID = leaveapp.userID');
        $this->db2->where("reporting_head",$userid);
        $this->db2->like("leaveapp.from_date", $year);
        $query = $this->db2->get('leaveapp');
        return $query->result();
      }

      public function emp_get_leave($leave_id)
      {
        //$this->db2->join('emp_attendance', 'leaveapp.userID = emp_attendance.emp_id','left');
        $this->db2->join('leave_type', 'leaveapp.leave_type_id = leave_type.leavetype_id','left');
        $this->db2->where("leaveapp.leave_id", $leave_id);
        $query = $this->db2->get('leaveapp');
        return $query->row();
      }

      public function hod_get_leave($leave_id)
      {
        //$this->db2->join('emp_attendance', 'leaveapp.userID = emp_attendance.emp_id','left');
        $this->db2->join('leave_type', 'leaveapp.leave_type_id = leave_type.leavetype_id','left');
        $this->db2->where("leaveapp.leave_id", $leave_id);
        $query = $this->db2->get('leaveapp');
        return $query->row();
      }

      public function check_leave($day,$month,$year,$userID)
      {
        $this->db2->where("emp_id",$userID);
        $this->db2->where("attendance_month",$month);
        $this->db2->where("attendance_year",$year);
        $query = $this->db2->get("emp_attendance");
        $num = $query->num_rows();

        if( $num > 0)
        {
          $this->db2->select("a$day AS 'leavetypeid'");
          $this->db2->where("emp_id",$userID);
          $this->db2->where("attendance_month",$month);
          $this->db2->where("attendance_year",$year);  
          $query = $this->db2->get('emp_attendance');     
          return $query->row_array();
        }
        else
          {  
            $mark = array("leavetypeid" => '0');
            return $mark;
          }
      }

      public function edit_leave($table_name,$column_name,$column_value,$data)
      {
        $this->db2->where("$column_name", $column_value);
        $this->db2->update($table_name, $data);
      }

      public function update_data($table_name,$column_name,$column_value,$data)
      {
        $this->db2->where("$column_name", $column_value);
        $this->db2->update($table_name, $data);
      }

      public function update_status($table_name,$column_name,$column_value,$data)
      {
        $this->db2->where("$column_name", $column_value);
        $this->db2->update($table_name, $data);
      }


      public function fetch_attendance()
      {
        
        $query = $this->db2->get('emp_attendance');
        return $query->result_array();
      }

      public function update_timestamp($timestamp,$day,$day2,$day3,$month,$year)
      {
        $this->db2->where("emp_id",$timestamp['userID']);
        $this->db2->where("attendance_month",$month);
        $query = $this->db2->get("attendance_timestamp");
        $num = $query->num_rows();

       
        //  if($day2 == "Sun" && $num > 0){
        //     $array = array('attendance_month' => $month,'attendance_year' => $year, 'emp_id' =>$timestamp["userID"]);
        //     $this->db2->where($array);
        //     $weekoff = array('a'.$day3.'' =>2);
        //     $this->db2->update("attendance_timestamp",$weekoff);
        //     }
         if( $num > 0)
            {
  
              $array = array('attendance_month' => $month,'attendance_year' => $year, 'emp_id' =>$timestamp["userID"]);
              $array2 = array('a'.$day.'' => $timestamp["attendance_timestamp"]);
              $this->db2->where($array);
              $this->db2->update("attendance_timestamp", $array2);
            }
        else
          {
            $mark = array(
              'emp_id' => $timestamp["userID"] ,
              'attendance_year' => $year,
              'attendance_month' => $month,
              'a'.$day.'' =>$timestamp["attendance_timestamp"]
              );
            $this->db2->insert('attendance_timestamp', $mark);
          }
       
       
      }

      public function update_attendance($present,$day,$day2,$day3,$month,$year)
      {
        $this->db2->where("emp_id",$present['userID']);
        $this->db2->where("attendance_month",$month);
        $query = $this->db2->get("emp_attendance");
        $num = $query->num_rows();

       
        //  if($day2 == "Sun" && $num > 0){
        //     $array = array('attendance_month' => $month,'attendance_year' => $year, 'emp_id' =>$present["userID"]);
        //     $this->db2->where($array);
        //     $weekoff = array('a'.$day.'' =>2);
        //     $this->db2->update("emp_attendance",$weekoff);
        //     }
          if( $num > 0)
            {
  
              $array = array('attendance_month' => $month,'attendance_year' => $year, 'emp_id' =>$present["userID"]);
              $array2 = array('a'.$day.'' => $present["attendance"]);
              $this->db2->where($array);
              $this->db2->update("emp_attendance", $array2);
            }
        else
          {
            $mark = array(
              'emp_id' => $present["userID"] ,
              'attendance_year' => $year,
              'attendance_month' => $month,
              'a'.$day.'' =>$present["attendance"]
              );
            $this->db2->insert('emp_attendance', $mark);
          }
       
       
      }

      public function emp_attendance_update($update_attendance,$attendance_id,$update_attendance2)
      {     

            $this->db2->where("attendance_id",$attendance_id);           
            $this->db2->update("emp_attendance",$update_attendance); 
            $this->db2->where("attendance_id",$attendance_id);          
            $this->db2->update("emp_attendance",$update_attendance2); 
          }
    
      public function update_attendance_approval($attendance_id,$array)
      {     
        $this->db2->where("attendance_id",$attendance_id);           
        $this->db2->update("emp_attendance",$array); 
      }
    
         public function fetch_hod_attendance_view($userID,$month)
          {
            $this->db2->join('emp_attendance', 'user.userID = emp_attendance.emp_ID','left');
            $this->db2->join('usertype', 'user.usertypeID = usertype.usertypeID','left');
            $this->db2->join('department', 'usertype.dept_id = department.dept_id','left');
            $this->db2->where('active',1);
            $this->db2->where('completion',1);
            $this->db2->where('emp_attendance.attendance_month',$month);
            $this->db2->where('user.reporting_head',$userID);
            $this->db2->order_by("name", "asc");
            $query = $this->db2->get('user');
            return $query->result_array();
          }

          public function update_leave($userID,$year,$month,$update_leave)
          {     
            $this->db2->where("emp_id",$userID);
            $this->db2->where("attendance_month",$month);
            $query = $this->db2->get("emp_attendance");
            $num = $query->num_rows();

            if( $num > 0)
            {
                $this->db2->where("emp_id",$userID);
                $this->db2->where("attendance_year",$year);
                $this->db2->where("attendance_month",$month);
                $this->db2->update("emp_attendance",$update_leave);           
            
              }
              else
              {
              $mark = array(
                'emp_id' => $userID ,
                'attendance_year' => $year,
                'attendance_month' => $month
                );
             
               $this->db2->insert('emp_attendance', $mark);
               $last_id = $this->db2->insert_id();

               $this->db2->where("attendance_Id",$last_id);
               $this->db2->where("emp_id",$userID);
               $this->db2->where("attendance_year",$year);
               $this->db2->where("attendance_month",$month);
               $this->db2->update("emp_attendance",$update_leave);     
              }
            }

          public function update_longleave($userID,$year,$month,$update_longleave)
          {     
            $this->db2->where("emp_id",$userID);
            $this->db2->where("attendance_month",$month);
            $query = $this->db2->get("emp_attendance");
            $num = $query->num_rows();

            if( $num > 0)
            {
                $this->db2->where("emp_id",$userID);
                $this->db2->where("attendance_year",$year);
                $this->db2->where("attendance_month",$month);
                $this->db2->update("emp_attendance",$update_longleave);           
            
              }
              else
              {
              $mark = array(
                'emp_id' => $userID ,
                'attendance_year' => $year,
                'attendance_month' => $month
                );
             
               $this->db2->insert('emp_attendance', $mark);
               $last_id = $this->db2->insert_id();

               $this->db2->where("attendance_Id",$last_id);
               $this->db2->where("emp_id",$userID);
               $this->db2->where("attendance_year",$year);
               $this->db2->where("attendance_month",$month);
               $this->db2->update("emp_attendance",$update_longleave);     
              }
            }

      public function update_leave2($userID,$year,$month2,$update_leave_2)
      {    
        $this->db2->where("emp_id",$userID);
        $this->db2->where("attendance_month",$month2);
        $query = $this->db2->get("emp_attendance");
        $num = $query->num_rows();

        if( $num > 0)
        {
            $this->db2->where("emp_id",$userID);
            $this->db2->where("attendance_year",$year);
            $this->db2->where("attendance_month",$month2);
            $this->db2->update("emp_attendance",$update_leave_2);           
        
          }
          else
          {
            $mark = array(
                'emp_id' => $userID ,
                'attendance_year' => $year,
                'attendance_month' => $month2
                );
               
                $this->db2->insert('emp_attendance', $mark);
                $last_id = $this->db2->insert_id();
                

            // $this->db2->where("emp_id",$userID);
            // $this->db2->where("attendance_month",$month2);
            // $query = $this->db2->get("emp_attendance");
            // $num = $query->num_rows();
            // if( $num > 0)
            // {
            $this->db2->where("attendance_Id",$last_id);
            $this->db2->where("emp_id",$userID);
            $this->db2->where("attendance_year",$year);
            $this->db2->where("attendance_month",$month2);
            $this->db2->update("emp_attendance",$update_leave_2);           
            }
          }
          //   else
          // {
          //   // for ($i=1; $i < 2; $i++) { 
          //   //   # code...
          //   //   $keyk = array_search ($update_leave_2[$i],$update_leave_2);
          //   //   //var_dump($keyk);
          //   foreach ( $update_leave_2 as $key => $value ) {

          //       $this->db->insert('tbl_product_master', array('product_name' => $value );
          //   }
          //   }
           

              
            
          // }
          // }

          public function update_longleave4($userID,$year,$month4,$update_longleave_4)
          {    
            $this->db2->where("emp_id",$userID);
            $this->db2->where("attendance_month",$month4);
            $query = $this->db2->get("emp_attendance");
            $num = $query->num_rows();
    
            if( $num > 0)
            {
                $this->db2->where("emp_id",$userID);
                $this->db2->where("attendance_year",$year);
                $this->db2->where("attendance_month",$month4);
                $this->db2->update("emp_attendance",$update_longleave_4);           
            
              }
              else
              {
                $mark = array(
                    'emp_id' => $userID ,
                    'attendance_year' => $year,
                    'attendance_month' => $month4
                    );
                   
                    $this->db2->insert('emp_attendance', $mark);
                    $last_id = $this->db2->insert_id();
                    
                $this->db2->where("attendance_Id",$last_id);
                $this->db2->where("emp_id",$userID);
                $this->db2->where("attendance_year",$year);
                $this->db2->where("attendance_month",$month4);
                $this->db2->update("emp_attendance",$update_longleave_4);           
                }
              }
    
    
          public function update_longleave3($userID,$year,$month3,$update_longleave_3)
          {    
            $this->db2->where("emp_id",$userID);
            $this->db2->where("attendance_month",$month3);
            $query = $this->db2->get("emp_attendance");
            $num = $query->num_rows();
    
            if( $num > 0)
            {
                $this->db2->where("emp_id",$userID);
                $this->db2->where("attendance_year",$year);
                $this->db2->where("attendance_month",$month3);
                $this->db2->update("emp_attendance",$update_longleave_3);           
            
              }
              else
              {
                $mark = array(
                    'emp_id' => $userID ,
                    'attendance_year' => $year,
                    'attendance_month' => $month3
                    );
                   
                    $this->db2->insert('emp_attendance', $mark);
                    $last_id = $this->db2->insert_id();
                    
                $this->db2->where("attendance_Id",$last_id);
                $this->db2->where("emp_id",$userID);
                $this->db2->where("attendance_year",$year);
                $this->db2->where("attendance_month",$month3);
                $this->db2->update("emp_attendance",$update_longleave_3);           
                }
              }

              public function update_longleave2($userID,$year,$month2,$update_longleave_2)
              {    
                $this->db2->where("emp_id",$userID);
                $this->db2->where("attendance_month",$month2);
                $query = $this->db2->get("emp_attendance");
                $num = $query->num_rows();
        
                if( $num > 0)
                {
                    $this->db2->where("emp_id",$userID);
                    $this->db2->where("attendance_year",$year);
                    $this->db2->where("attendance_month",$month2);
                    $this->db2->update("emp_attendance",$update_longleave_2);           
                
                  }
                  else
                  {
                    $mark = array(
                        'emp_id' => $userID ,
                        'attendance_year' => $year,
                        'attendance_month' => $month2
                        );
                       
                        $this->db2->insert('emp_attendance', $mark);
                        $last_id = $this->db2->insert_id();
                        
                    $this->db2->where("attendance_Id",$last_id);
                    $this->db2->where("emp_id",$userID);
                    $this->db2->where("attendance_year",$year);
                    $this->db2->where("attendance_month",$month2);
                    $this->db2->update("emp_attendance",$update_longleave_2);           
                    }
                  }

      public function update_leave3($userID,$year,$month3,$update_leave_3)
      {     
        $this->db2->where("emp_id",$userID);
        $this->db2->where("attendance_month",$month3);
        $query = $this->db2->get("emp_attendance");
        $num = $query->num_rows();

        if( $num > 0)
        {
            $this->db2->where("emp_id",$userID);
            $this->db2->where("attendance_year",$year);
            $this->db2->where("attendance_month",$month3);
            $this->db2->update("emp_attendance",$update_leave_3);           
        
          }
          else
          {
        $mark = array(
          'emp_id' => $userID ,
          'attendance_year' => $year,
          'attendance_month' => $month3
          );
         
          $this->db2->insert('emp_attendance', $mark);
          $last_id = $this->db2->insert_id();

            $this->db2->where("attendance_Id",$last_id);
            $this->db2->where("emp_id",$userID);
            $this->db2->where("attendance_year",$year);
            $this->db2->where("attendance_month",$month3);
            $this->db2->update("emp_attendance",$update_leave_3);           
        
          }
        }

        public function fetch_department(){

            $this->db2->order_by("dept_id", "asc");
            $query = $this->db2->get('department');
            return $query->result_array();
        }

        // public function fetch_leave_avilable($userID)
        // {
        //   $this->db2->select('COUNT(*)');
        //   $this->db2->from('leaveapp');
        //   $this->db2->where("leaveapp.userID", $userID);
        //   $this->db2->where("leaveapp.leave_type_id",11 );
        //   $this->db2->where("leaveapp.hod_status=",1 );
        //   $this->db2->where("leaveapp.status=",1 );
        //   //return $this->db2->get()->row()->count;
        //   $query = $this->db2->get();
        //   return $query->result_array();
        //   // $query = $this->db2->get('leaveapp');
        //   // return $query->result_array();
        // }


        public function fetch_leave()
        {
            $array=array(3,8,9,10,11,12);
            $this->db2->order_by("leavetype_id", "asc");
            $this->db2->where_in('leavetype_id',$array);
            $query = $this->db2->get('leave_type');
            return $query->result_array();
        }

        public function fetch_leave_all()
        {
            
            $this->db2->order_by("leavetype_id", "asc");
            //$this->db2->where('leavetype_id',$array);
            $query = $this->db2->get('leave_type');
            return $query->result_array();
        }

        public function fetch_leave_present()
        {
          $array=array(1,2,4,5,6,7);
          $this->db2->order_by("leavetype_id", "asc");
          $this->db2->where_in('leavetype_id',$array);
          $query = $this->db2->get('leave_type');
          return $query->result_array();
        }
        public function fetch_attendance_view($deptid,$month){

           
            $this->db2->join('emp_attendance', 'user.userID = emp_attendance.emp_ID','left');
            $this->db2->join('usertype', 'user.usertypeID = usertype.usertypeID','left');
            $this->db2->join('department', 'usertype.dept_id = department.dept_id','left');
            $this->db2->where('active',1);
            $this->db2->where('completion',1);
            $this->db2->where('emp_attendance.attendance_month',$month);
            if($deptid!=0)
                 $this->db2->where('department.dept_id',$deptid);
            $this->db2->order_by("name", "asc");
            $query = $this->db2->get('user');
            return $query->result_array();
          }

          public function emp_attendance_status($userID,$month)
          {          
            $this->db2->join('emp_attendance', 'user.userID = emp_attendance.emp_ID','left');
            $this->db2->where('emp_attendance.emp_ID',$userID);
            $this->db2->where('emp_attendance.attendance_month',$month);
            $query = $this->db2->get('user');
            return $query->result_array();
          }

          public function attendance_edit($attendance_id,$month){

             $days=cal_days_in_month(CAL_GREGORIAN,$month,date('Y'));
            // $this->db2->select('*');
            // for ($x = 1; $x <= $days; $x++) {
            //     $this->db2->select('l'.$x.'.leave_name as lv'.$x);
            //   }
             $this->db2->join('emp_attendance', 'user.userID = emp_attendance.emp_ID','left');
             $this->db2->join('usertype', 'user.usertypeID = usertype.usertypeID','left');
             $this->db2->join('department', 'usertype.dept_id = department.dept_id','left');
             for ($x = 1; $x <= $days; $x++) {
              $this->db2->join('leave_type as l'.$x, 'emp_attendance.a'.$x.' = l'.$x.'.leavetype_id','left');
              } 
             $this->db2->where("emp_attendance.attendance_id", $attendance_id);
             $query = $this->db2->get('user');
             return $query->row_array();
           }
 
        public function fetch_leave_avilable($userID,$leaveid,$year)
        {
          $this->db2->select_sum("no_of_days");
          $this->db2->where("leaveapp.userID", $userID);
          $this->db->where('YEAR(from_date)', $year);
          $this->db2->where("leaveapp.leave_type_id=",$leaveid );
          $this->db2->where("leaveapp.hr_status=",1 );
          $this->db2->where("leaveapp.hod_status=",1 );
          $query = $this->db2->get('leaveapp');
          return $query->row()->no_of_days;
        }
          

 
    // public function importData() {
    //     $data = $this->_batchImport;
    //     $this->db2->insert_batch('leads', $data);
    // }

}
