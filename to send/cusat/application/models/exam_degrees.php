<?php

/**
* 
*/
class Exam_degrees extends CI_Model
{	

	public function add_degree()
	{
		$data = array(
		              'college_id' => $this->input->post('college') ,
		              'degree_name' => $this->input->post('name') 
		              );



		return $this->db->insert('degrees', $data); 
	}

	public function get_degrees($college_id=0) {
		
		
		$this->db->where('valid', 1);
		if($college_id!=0)
			$query = $this->db->where('college_id',$college_id);
		$query = $this->db->get('degrees');

		return $query->result_array();

	}
}

?>