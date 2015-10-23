<?php

/**
* 
*/
class Exam_colleges extends CI_Model
{	

    public function get_colleges() {
        $query = $this->db->get('college');
        return $query->result_array();

    }
}

?>