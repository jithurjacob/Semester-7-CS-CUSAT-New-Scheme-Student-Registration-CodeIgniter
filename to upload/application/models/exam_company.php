<?php

/**
* 
*/
class Placement_company extends CI_Model
{	

public function changepwd($value='')
    {$this->load->library('encrypt');
    $user  = $this->session->userdata('username');
        $data = array('password' => $this->encrypt->sha1($this->input->post('password')."jithu$&"));
        $query = $this->db->where('username' , $user);
        return $this->db->update('company', $data);
    }

public function status()
{
       $query = $this->db->get('company');
       $this->db->select('valid');
       $this->db->stop_cache();
        return $query->result_array();
}
    public function validate($valid="r")
    {   
        $this->load->library('encrypt');
        $user=$this->encrypt->decode($this->input->post('userid'));
        $val=($valid=="a"?"1":"-1");
        $data = array('valid' => $val);
        if($valid=="a")
            $this->send_mail($this->get_mailid($user),"Account Activated","Your account at placement cell portal has been activated.Please visit ".base_url()." for logging in.");
        else
            $this->send_mail($this->get_mailid($user),"Account Request Rejected","Your request for an account at placement cell portal has been rejected by admin.");
        
        $query = $this->db->where('username' , $user);
        return $this->db->update('company', $data);
    }
    public function get_mailid($user)
    {
        $query = $this->db->get_where('company', array('username' => $user));
        if ($query->num_rows == 1) {
            $row  = $query->row();

            return $row->email;
        }
    }
    public function verify_newreg()
    {
        $query = $this->db->get('company');
        $query = $this->db->get_where('company', array('valid' => 0));
        return $query->result_array();
    }
    public function register() {
         $this->load->library('encrypt');
        $companyname = $this->input->post('companyname');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->encrypt->sha1($this->input->post('password'). "jithu$&");

        $website = $this->input->post('website');
        $mobno = $this->input->post('mobno');
        

        $data = array('name'=>$companyname,'username'=>$username,'email'=>$email,'password'=>$password,'website'=>$website,'mobno'=>$mobno);
        return $this->db->insert('company', $data);
    }
public function send_mail($mail,$sub,$msg)
    {$this->load->library('email');
      $this->load->helper('email');
      if (!valid_email($mail))
      {
           return false;
      }
      $this->load->library('email');
      $this->email->from('cgpucepoonjar@gmail.com', 'Placement Cell COE Poonjar');
      $this->email->to($mail);
      $this->email->subject($sub);
      $this->email->message($msg);  

      $this->email->send();

     // echo $this->email->print_debugger();
    }
    public function resetpwd($user)
    {   if($this->input->post('rec')=="")
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
     public function recover($value)
    {
        $this->db->where('recoverykey', $value);
        $query = $this->db->get('company');
        $row = $query->row();
       if ($query->num_rows == 1) 
        return $row->username;
    else return "";
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
              $this->send_mail($email,"Password reset link","Use the following link to reset your password ".base_url()."index.php/placement/home/resetpwd/resetpwd/".$recoverykey."");
             
             return $this->db->update('students', $data);
        }else{
            return FALSE;
        }
    }


	public function check_username_exists(){
        $username = $this->security->xss_clean($this->input->post('username'));
        $this->db->where('username', $username);
        $query = $this->db->get('company');
        if($query->num_rows != 0)
        {
            return true;
        }else{
            return false;
        }
    }


	public function check_login(){
        $this->load->library('encrypt');
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
       //  $this->db->where('valid', 1);
        $this->db->where('password', $this->encrypt->sha1($password."jithu$&"));
       
        // Run the query
        $query = $this->db->get('company');
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
                    'username' => $row->username,
                    'admin' => false,
                    'validated' => true,'students'=>false,'coordinator'=>false,
                    'company'=>true
                    );
            $this->session->set_userdata($data);
            return "true";
        }
        // If the previous process did not validate
        // then return false.
        return "false";
    }
}

?>