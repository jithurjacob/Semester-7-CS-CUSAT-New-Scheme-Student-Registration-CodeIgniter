<?php

/**
* 
*/
class Placement_placements extends CI_Model
{	

public function validate($id)
{
        $data = array('valid' => $this->input->post('valid') );
        $query = $this->db->where('id' , $id);
        return $this->db->update('placements', $data);
}
    public function get_placements() {
        
        $this->db->where('username',$this->session->userdata('username'));
        $this->db->where('valid',"1");
        $query = $this->db->get('placements');
        return $query->result_array();

    }
    public function get_year() {
        $query=$this->db->distinct();
        $this->db->select('year_pass');
        $this->db->order_by("year_pass", "desc"); 
        $query = $this->db->get('placements');
        return $query->result_array();

    }
     public function get_history() {
        
       
        $this->db->where('valid',"1");
         $this->db->order_by("company", "asc"); 
        $query = $this->db->get('placements');
        return $query->result_array();

    }
    public function get_verifiedlist() {
       // $this->db->join('students', 'students.username = placements.username', 'inner');
        $this->db->where('placements.valid',"1");
        $query = $this->db->get('placements');
        return $query->result_array();

    }
public function get_verifylist() {
        $this->db->join('students', 'students.username = placements.username', 'inner');
        $this->db->where('placements.valid',"0");
        $query = $this->db->get('placements');
        return $query->result_array();

    }
    public function add_placements()
    {
        if ($this->input->post('username')!="") {
            $username=$this->input->post('username');
             $year_pass=$this->input->post('year_pass');
            $valid="1";
        }
        else{
            $username=$this->session->userdata('username');
            $year_pass=$this->session->userdata('year_pass');
            $valid="0";
        }
    	$data = array('username'=>$username,
   'company' => $this->input->post('company') ,
   'details' => $this->input->post('details') ,'year_pass'=>$year_pass,'valid'=>$valid
);

return $this->db->insert('placements', $data); 
    }

    

    
}

?>