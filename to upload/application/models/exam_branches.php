<?php

/**
* 
*/
class Exam_branches extends CI_Model
{	

    public function get_branches() {
        $query = $this->db->get('branches');
        return $query->result_array();

    }
}

?>