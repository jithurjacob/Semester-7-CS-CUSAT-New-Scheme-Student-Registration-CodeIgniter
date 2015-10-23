<?php

/**
* 
*/
class Exam_degrees extends CI_Model
{	

    public function get_degrees($college_id=0) {
    
		

    	if($college_id!=0)
        $query = $this->db->where('college_id',$college_id);
    	$query = $this->db->get('degrees');

        return $query->result_array();

    }
}

?>