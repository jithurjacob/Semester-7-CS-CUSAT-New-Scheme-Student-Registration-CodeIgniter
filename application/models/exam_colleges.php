<?php

/**
* 
*/
class Exam_colleges extends CI_Model
{	
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
  $query = $this->db->get('college');
  $row = $query->row();
  if ($query->num_rows == 1) 
    return $row->email;
  else return "";
}
public function forgot_pwd($value=''){
  $email  = $this->input->post('email');
  $this->db->where('email', $email);
  $query = $this->db->get('college');

        // Let's check if there are any results
  if ($query->num_rows == 1) {
    $recoverykey= random_string('alnum', 50);
    $data = array('recoverykey' => $recoverykey);
    $query = $this->db->where('email' , $email);
             // $this->send_mail($email,"Password reset link","Use the following link to reset your password ".base_url()."index.php/placement/home/resetpwd/resetpwd/".$recoverykey."");
    
    return $this->db->update('college', $data);
  }else{
    return FALSE;
  }
}
public function resetpwd($user)
{   if($this->input->post('rec')=="")
return false;
$this->db->where('recoverykey', $this->input->post('rec'));
$this->db->where('email',$user);
$query = $this->db->get('college');
if ($query->num_rows != 1) 
  return false;

$data = array('password' => $this->encrypt->sha1($this->input->post('password')."jithu$&"),'recoverykey'=>"");
$query = $this->db->where('email' , $user);
return $this->db->update('college', $data);
}
public function add_college()
{
 $this->load->library('encrypt');
 $data = array(
               'name' => $this->input->post('name') ,
               'email' => $this->input->post('username') ,
               'password' =>$this->encrypt->sha1( $this->input->post('password') ."jithu$&")
               );



 return $this->db->insert('college', $data); 
}
public function check_username_exists() {
  $username = $this->security->xss_clean($this->input->post('username'));
  $this->db->where('email', $username);
  $query = $this->db->get('college');
  if ($query->num_rows != 0) {
    return true;
  } else {
    return false;
  }
}
public function get_colleges() {
 $this->db->select('id,name,email,password,recoverykey');
       //  $this->db->where('valid', 1);

       // $query = $this->db->get('college');
 
       // return $query->result_array();
 return  $this->db->get('college')->result_array();

}

public function get_colleges_details()
{
 $this->db->select('*');
 $this->db->from('College c'); 
 $this->db->join('Degrees d', 'd.college_id=c.id', 'left');
 $this->db->join('Branches b', 'b.college_course=d.id', 'left');
           // $this->db->where('c.album_id',$id);
 $this->db->order_by('c.name','asc');   
 $this->db->order_by('d.degree_name','asc'); 
 $this->db->order_by('b.branch_name','asc');         
 $query = $this->db->get(); 
 return $query->result_array();
 
}

public function check_login(){
  $this->load->library('encrypt');
        // grab user input
  $username = $this->security->xss_clean($this->input->post('username'));
  $password = $this->security->xss_clean($this->input->post('password'));
  
        // Prep the query
  $this->db->where('email', $username);
       //  $this->db->where('valid', 1);
  $this->db->where('password', $this->encrypt->sha1($password."jithu$&"));
  
        // Run the query
  $query = $this->db->get('college');
        // Let's check if there are any results
  if($query->num_rows == 1)
  {
            // If there is a user, then create session data
    $row = $query->row();
    if($row->valid ==0)
      return "PENDING";
    if($row->valid == -1)
      return "REJECT";
    $data = array(
                  'username' => $row->email,
                  'admin' => false,
                  'validated' => true,'students'=>false,'collegeid'=>$row->id
                  );
    $this->session->set_userdata($data);
    return "true";
  }
        // If the previous process did not validate
        // then return false.
  return "false";
}
public function changepwd($value='')
{$this->load->library('encrypt');
$user  = $this->session->userdata('username');
$data = array('password' => $this->encrypt->sha1($this->input->post('password')."jithu$&"));
$query = $this->db->where('email' , $user);
return $this->db->update('college', $data);
}

public function status()
{
 $query = $this->db->get('college');
 $this->db->select('valid');
 $this->db->stop_cache();
 return $query->result_array();
}
}

?>