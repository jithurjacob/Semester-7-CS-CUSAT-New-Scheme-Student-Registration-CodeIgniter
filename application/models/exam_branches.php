<?php

/**
* 
*/
class Exam_branches extends CI_Model
{	

public function add_branch()
	{
		$data = array(
		              'college_course' => $this->input->post('degree_addbranch') ,
		              'branch_name' => $this->input->post('branchname') 
		              );



		return $this->db->insert('branches', $data); 
	}
	public function get_branches($course_id=0) {

		
		$this->db->where('valid', 1);
		if($course_id!=0)
			$query = $this->db->where('college_course',$course_id);
		$query = $this->db->get('branches');

		return $query->result_array();

	}
}

?>