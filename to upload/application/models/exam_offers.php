<?php

/**
* 
*/
class Placement_offers extends CI_Model
{	
    public function status()
    {
      
       $query = $this->db->get('offers');
       $this->db->select('valid');
       
        return $query->result_array();
    }
    public function status_company()
    {
      
      $query= $this->db->select('valid');
      $query=   $this->db->where('company_username',$this->session->userdata('username'));
      $query = $this->db->get('offers');
      
        return $query->result_array();
    }
    public function get_verifiedlist() {
       // $this->db->join('students', 'students.username = offers.students_username', 'inner');
        $this->db->join('company', 'company.username = offers.company_username', 'inner');
        $this->db->where('offers.valid',"1");
        $query = $this->db->get('offers');
        return $query->result_array();

    }
    public function get_verifylist() {
       // $this->db->join('students', 'students.username = offers.students_username', 'inner');
        $this->db->join('company', 'company.username = offers.company_username', 'inner');
        $this->db->where('offers.valid',"0");
        $query = $this->db->get('offers');
        return $query->result_array();

    }
    public function validate($id)
{
        $data = array('valid' => $this->input->post('valid') );
        $query = $this->db->where('id' , $id);
        return $this->db->update('offers', $data);
}
    public function get_offers($students_username,$value="") {
        $this->db->where('students_username', $students_username);
        if($value=="valid")
             $this->db->where('valid', "1");
        $query = $this->db->get('offers');
        return $query->result_array();

    }
    public function get_offers_company() {
        $this->db->join('students', 'students.username = offers.students_username', 'inner');
        
        $this->db->where('company_username', $this->session->userdata('username'));
        $query = $this->db->get('offers');
        return $query->result_array();

    }
    public function add_offer($company,$student,$desc)
    {
        $this->db->where('company_username', $company);
        $this->db->where('students_username', $student);
        $this->db->from('offers');
        if( $this->db->count_all_results()>0)
            return "sent";
    	$data = array(
   'company_username' => $company ,
   'students_username' => $student,
   'description'=>$desc 
);

return $this->db->insert('offers', $data); 
    }

    

    
}

?>