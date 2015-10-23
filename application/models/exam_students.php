<?php
/**
*
*/
class Exam_students extends CI_Model {

public function allstudent_details()
{
  $query = $this->db->get('students');
   return $query->result_array(); ;
}
public function check_exists($item,$value) {
  $this->db->where($item, $value);
  $query = $this->db->get('students');
  if ($query->num_rows != 0) {
    return true;
  } else {
    return false;
  }
}

public function register_completed()
{
  if($this->check_exists('email',$this->input->post('email')) && $this->check_exists('admnno',$this->input->post('admnno')) && $this->check_exists('registration_completed',1))
     return true;
     else
      return false;
}
  public function add_student()
  {
    $this->load->library('encrypt');
    $data = array(
                  'admnno' => $this->input->post('admnno') ,
                  'college'=>$this->session->userdata('collegeid'),
                  'academic_month' => $this->input->post('month') ,
                  'academic_year' => $this->input->post('year') ,
                  'degree' => $this->input->post('degree') ,
                  'branch' => $this->input->post('branch') ,
                  'name' => $this->input->post('name') ,
                  'email' => $this->input->post('email'),
                  'securitycode'=> random_string('alnum', 6)
                  );
    return $this->db->insert('students', $data);
  }
  public function send_mail($mail,$sub,$msg)
  {$this->load->library('email');
  $this->load->helper('email');
  if (!valid_email($mail))
  {
    return false;
  }
  $this->load->library('email');
  $this->email->from('cusat@gmail.com', 'Exam Cell Cusat');
  $this->email->to($mail);
  $this->email->subject($sub);
  $this->email->message($msg);
  $this->email->send();
// echo $this->email->print_debugger();
}
public function recover($value)
{
  $this->db->where('recoverykey', $value);
  $query = $this->db->get('students');
  $row = $query->row();
  if ($query->num_rows == 1)
    return $row->username;
  else return "";
}
public function resetpwd($user)
{
  //disabled for students
  return "";
  if($this->input->post('rec')=="")
    return false;
  $this->db->where('recoverykey', $this->input->post('rec'));
  $this->db->where('username',$user);
  $query = $this->db->get('students');
  if ($query->num_rows != 1)
    return false;
  $data = array('password' => $this->encrypt->sha1($this->input->post('password')."jithu$&"),'recoverykey'=>"");
  $query = $this->db->where('username' , $user);
  return $this->db->update('students', $data);
}
public function forgot_pwd($value=''){
  $email  = $this->input->post('email');
  $this->db->where('email', $email);
  $query = $this->db->get('students');
// Let's check if there are any results
  if ($query->num_rows == 1) {
    $recoverykey= random_string('alnum', 50);
    $data = array('recoverykey' => $recoverykey);
    $query = $this->db->where('email' , $email);
//  $this->send_mail($email,"Password reset link","Use the following link to reset your password ".base_url()."index.php/placement/home/resetpwd/resetpwd/".$recoverykey."");

    return $this->db->update('students', $data);
  }else{
    return FALSE;
  }
}
public function register_student($data)
{
  $this->load->library('encrypt');
  $print_hash=$this->encrypt->sha1(rand()*100000000);
  $data = array('name'=>$this->input->post('name'),
                'sem'=>$this->input->post('sem'),
                'dob'=>$this->input->post('dob'),
                'age'=>$this->input->post('age'),
                'gender'=>$this->input->post('gender'),
                'nationality'=>$this->input->post('nationality'),
                'curraddr'=>$this->input->post('curraddr'),
                'permaddr'=>$this->input->post('permaddr'),
                'mobno'=>$this->input->post('mobno'),
                'guardname'=>$this->input->post('guardname'),
                'caste'=>$this->input->post('caste'),
                'pic'=>$data['pic'],
                'sign'=>$data['sign'],
                'registration_completed'=>1,
                'print_hash'=>$print_hash
                );
    //$this->db->select('name,branch,year_pass,pic,regno,username,privacy_profile_pic,privacy_personal,privacy_academic,privacy_resume');
  $this->db->where('admnno',$this->input->post('admnno'));
  $this->db->where('academic_month',$this->input->post('month'));
  $this->db->where('securitycode',$this->input->post('securitycode'));
  $this->db->where('academic_year',$this->input->post('year'));
  $this->db->where('college',$this->input->post('college'));
  $this->db->where( 'degree',$this->input->post('degree'));
  $this->db->where( 'branch',$this->input->post('branch'));
  $this->db->where('registration_completed', "0");
  $this->db->where('email', $this->input->post('email'));
  $this->db->where('valid', "1");
  
  $res=$this->db->update('students', $data);
  if($res)
    return $print_hash;
  else
    return $res;
}

public function download_registerform($value='')
{
  $this->db->where('admnno',$this->input->post('admnno'));
  $this->db->where('securitycode',$this->input->post('securitycode'));
   $query = $this->db->get('students');
  return $query->result_array();
}

public function load_data($data)
{
  
  
  
  
  
 
 
    //$this->db->select('name,branch,year_pass,pic,regno,username,privacy_profile_pic,privacy_personal,privacy_academic,privacy_resume');
  $this->db->where('admnno',$this->input->post('admnno'));
   $this->db->where('academic_month',$this->input->post('month'));
    $this->db->where('securitycode',$this->input->post('securitycode'));
     $this->db->where('academic_year',$this->input->post('year'));
      $this->db->where('college',$this->input->post('college'));
       $this->db->where( 'degree',$this->input->post('degree'));
        $this->db->where( 'branch',$this->input->post('branch'));
         $this->db->where('registration_completed', "0");
          $this->db->where('email', $this->input->post('email'));
  $this->db->where('valid', "1");
  $query = $this->db->get('students');
  return $query->result_array();
}
public function check_login() {
  $this->load->library('encrypt');
    // grab user input
  $username = $this->security->xss_clean($this->input->post('username'));
  $password = $this->security->xss_clean($this->input->post('password'));
    // Prep the query
  $this->db->where('username', $username);
    // $this->db->where('valid', 1);
  $this->db->where('password', $this->encrypt->sha1($password."jithu$&"));
    // Run the query
  $query = $this->db->get('students');
    // Let's check if there are any results
  if ($query->num_rows == 1) {
      // If there is a user, then create session data
    $row  = $query->row();
    if($row->valid == 0)
      return "PENDING";
    if($row->valid == -1)
      return "REJECT";
    $data = array('username' => $row->username,'email'=>$row->email,
                  'branch'=> $row->branch,'regno'=> $row->regno,
                  'year_pass'=> $row->year_pass, 'admin' => false,'company'=>false,'students'=>true,
                  'validated' => true,'coordinator'=>$row->coordinator);
    $this->session->set_userdata($data);
    return "true";
  }
    // If the previous process did not validate
    // then return false.
  return "false";
}
public function status()
{
  $query = $this->db->get('students');
  $this->db->select('valid');

  return $query->result_array();
}
}
?>