<?php

/**
* 
*/
class Placement_semesters extends CI_Model
{	

    public function get_semesters() {
        $query = $this->db->get('semesters');
        return $query->result_array();

    }
}

?>