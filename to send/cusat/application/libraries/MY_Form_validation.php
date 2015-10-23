<?php
class MY_Form_validation extends CI_Form_validation
{
    private $_custom_field_errors = array();
    public function clear_field_data() {
        $this->_field_data = array();
        return $this;
    }
    public function _execute($row, $rules, $postdata = NULL, $cycles = 0) {
        
        // Execute the parent method from CI_Form_validation.
        parent::_execute($row, $rules, $postdata, $cycles);
        
        // Override any error messages for the current field.
        if (isset($this->_error_array[$row['field']]) && isset($this->_custom_field_errors[$row['field']])) {
            $message = str_replace('%s', !empty($row['label']) ? $row['label'] : $row['field'], $this->_custom_field_errors[$row['field']]);
            
            $this->_error_array[$row['field']] = $message;
            $this->_field_data[$row['field']]['error'] = $message;
        }
    }
    
    
    
    public function set_rules($field, $label = '', $rules = '', $message = '') {
        $rules = parent::set_rules($field, $label, $rules);
        
        if (!empty($message)) {
            $this->_custom_field_errors[$field] = $message;
        }
        
        return $rules;
    }
    
    /**
     * Alpha space
     *
     * @access  public
     * @param   string
     * @return  bool
     */
    public function alpha_space($str) {
        $this->set_message('alpha_space', 'The %s field can contain only alphabets and space');
        return (!preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }
    
    public function less_than_or_equal_to($str,$max) {
        $this->set_message('less_than_or_equal_to', 'The %s field can must be less than or equal to %s');
        return ($str > $max) ? FALSE : TRUE;
    }

    /**
     * Validate URL
     *
     * @access    public
     * @param    string
     * @return    string
     */
    function valid_url($str) {
        $this->set_message('valid_url', 'The %s is not a valid URL');
        $pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
        if (!preg_match($pattern, $str)) {
            return FALSE;
        }
        
        return TRUE;
    }
    
    function valid_dob($str) {
        $this->set_message('valid_dob', 'The %s is not a valid Date of Birth format');
        $pattern = "/^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]$/i";
        if (!preg_match($pattern, $str)) {
            return FALSE;
        }
        
        return TRUE;
    }
    public function valid_admnno($str) {
        $this->set_message('valid_admnno', '%s already registerd if this was not you please contact administrator immediately');
        
        return $this->is_unique($str, "students.admnno");
    }
    public function valid_regno($str) {
        $this->set_message('valid_regno', '%s already registerd if this was not you please contact administrator immediately');
        
        return $this->is_unique($str, "students.regno");
    }
    function valid_username($str) {
        $this->set_message('valid_username', 'The %s can contain only alphabets , numbers and underscore');
        
        $pattern = "/^([a-zA-Z0-9_])+$/i";
        if (!preg_match($pattern, $str)) {
            return FALSE;
        }
        
        return TRUE;
    }
    
    // --------------------------------------------------------------------
    
    
    
    /**
     * Real URL
     *
     * @access    public
     * @param    string
     * @return    string
     */
    function real_url($url) {
        return @fsockopen("$url", 80, $errno, $errstr, 30);
    }
}
?>