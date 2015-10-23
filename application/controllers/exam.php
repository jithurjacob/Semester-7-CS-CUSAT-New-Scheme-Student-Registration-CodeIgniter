<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exam extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * see http://codeigniter.com/user_guide/general/urls.html 
     */
    /* ------------------------- admin fns --------------------- */

    public function add_college() {
        $this->check_isadmin();
        $this->load->library('form_validation', array(), 'college_form');
        $this->college_form->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->college_form->set_rules('username', 'User Name', 'trim|required|xss_clean');
        $this->college_form->set_rules('password', 'Password', 'trim|required|xss_clean');
        if (!$this->college_form->run()) {
            $data['exams_add_clg_form_msg'] = validation_errors();
            $this->admin("college_details", $data);
        } else {

            $this->load->model('exam_colleges');
            if ($this->exam_colleges->add_college()) {
                $data['exams_add_clg_form_error_msg'] = "Adding college failed Username already existed";
                $this->admin("college_details", $data);
            } else if ($this->exam_colleges->add_college()) {

                $data['exams_add_clg_form_success_msg'] = "College added successfully";
                $this->admin("college_details", $data);
            } else {

                $data['exams_add_clg_form_error_msg'] = "Adding college failed report this immediately to admin";
                $this->admin("college_details", $data);
            }
        }
    }

    public function add_degree() {
        $this->check_isadmin();
        $this->load->library('form_validation', array(), 'degree_form');
        $this->degree_form->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->degree_form->set_rules('college', 'College Name', 'trim|required|xss_clean');
        if (!$this->degree_form->run()) {
            $data['exams_add_degree_form_msg'] = validation_errors();
            $this->admin("college_details", $data);
        } else {

            $this->load->model('exam_degrees');
            if ($this->exam_degrees->add_degree()) {

                $data['exams_add_degree_form_success_msg'] = "Degree added successfully";
                $this->admin("college_details", $data);
            } else {

                $data['exams_add_degree_form_error_msg'] = "Adding degree failed report this immediately to admin";
                $this->admin("college_details", $data);
            }
        }
    }

    public function add_branch() {
        $this->check_isadmin();
        $this->load->library('form_validation', array(), 'branch_form');
        $this->branch_form->set_rules('branchname', 'Branch Name', 'trim|required|xss_clean');
        $this->branch_form->set_rules('degree_addbranch', 'Degree Name', 'trim|required|xss_clean');
        if (!$this->branch_form->run()) {
            $data['exams_add_branch_form_msg'] = validation_errors();
            $this->admin("college_details", $data);
        } else {

            $this->load->model('exam_branches');
            if ($this->exam_branches->add_branch()) {

                $data['exams_add_branch_form_success_msg'] = "Branch added successfully";
                $this->admin("college_details", $data);
            } else {

                $data['exams_add_branch_form_error_msg'] = "Adding branch failed report this immediately to admin";
                $this->admin("college_details", $data);
            }
        }
    }

    public function add_news() {
        $this->check_isadmin();
        $this->load->library('form_validation', array(), 'news_form');
        $this->news_form->set_rules('title', 'Title', 'trim|required|xss_clean');

        $this->news_form->set_rules('desc', 'Description', 'trim|required|xss_clean');
        if (!$this->news_form->run()) {
            $data['news_form_error_msg'] = validation_errors();
            $this->admin("news", $data);
        } else {

            $this->load->model('exam_news');
            if ($this->exam_news->add_news()) {

                $data['news_form_success_msg'] = "News added successfully";
                $this->admin("news", $data);
            } else {

                $data['news_form_error_msg'] = "Adding news failed report this immediately to admin";
                $this->admin("news", $data);
            }
        }
    }

    public function news_delete($value = '') {
        if ($this->input->is_ajax_request()) {
            $this->check_isvalidated();
            $this->check_isadmin();
            $this->load->model('exam_news');
            $this->load->library('encrypt');
            //echo $this->encrypt->decode($this->input->post('id'));
            if ($this->exam_news->news_delete($this->encrypt->decode($this->input->post('id'))))// echo "ok";
                $this->load->view('response_ok');
            else //echo "not ok";
                $this->load->view('response_notok');
        }else {
            $this->load->view('response_error');
        }
    }
public function admin_update_password()
    {
        $this->load->library('form_validation', array(), 'password_form');
        $this->password_form->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[r_password]|xss_clean');
        $this->password_form->set_rules('r_password', 'RetypePassword', 'trim|required|min_length[8]|xss_clean');
        
         if (!$this->password_form->run()) {
            
            // $this->load->view('exam_students_register', $data);
            
            $data['update_form_error_msg'] = validation_errors();
            $this->admin("settings", $data);
        } else {
            
            $this->load->model('exam_admin');
            
            if ($this->exam_admin->changepwd()) {
                $this->password_form->clear_field_data();
                $data['update_form_success_msg'] = "Password changed successfully";
                $this->admin("settings", $data);
            } else {
                $data['update_form_error_msg'] = "Password changing failed";
                $this->admin("settings", $data);
            }
        }
    }
    /* ------------------------- end of admin ------------------- */

    /* ------------------------- college fns ------------------- */

    public function students_add() {

        $this->load->library('form_validation', array(), 'college_form');
        $this->college_form->set_rules('admnno', 'Admission Number', 'trim|required|xss_clean');
        $this->college_form->set_rules('month', 'month', 'trim|required|xss_clean');
        $this->college_form->set_rules('year', 'year', 'trim|required|xss_clean');
        $this->college_form->set_rules('degree', 'degree', 'trim|required|xss_clean');

        $this->college_form->set_rules('branch', 'branch', 'trim|required|xss_clean');
        $this->college_form->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->college_form->set_rules('name', 'name', 'trim|required|xss_clean');
        if (!$this->college_form->run()) {
            $this->load->view('response_notok');
        } else {

            $this->load->model('exam_students');
            if ($this->exam_students->check_exists('admnno', $this->input->post('admnno'))) {
                $data['msg'] = "Admission Number already exists";
                $this->load->view('response_notok', $data);
            } else if ($this->exam_students->check_exists('email', $this->input->post('email'))) {
                $data['msg'] = "Email already exists";
                $this->load->view('response_notok', $data);
            } else if ($this->exam_students->add_student()) {
                $this->load->view('response_ok');
            } else {

                $this->load->view('response_notok');
            }
        }
    }
    public function college_update_password()
    {
        $this->load->library('form_validation', array(), 'password_form');
        $this->password_form->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[r_password]|xss_clean');
        $this->password_form->set_rules('r_password', 'RetypePassword', 'trim|required|min_length[8]|xss_clean');
        
         if (!$this->password_form->run()) {
            
            // $this->load->view('exam_students_register', $data);
            
            $data['update_form_error_msg'] = validation_errors();
            $this->colleges("settings", $data);
        } else {
            
            $this->load->model('exam_colleges');
            
            if ($this->exam_colleges->changepwd()) {
                $this->password_form->clear_field_data();
                $data['update_form_success_msg'] = "Password changed successfully";
                $this->colleges("settings", $data);
            } else {
                $data['update_form_error_msg'] = "Password changing failed";
                $this->colleges("settings", $data);
            }
        }
    }

    /* -------------------------- end of clg fnss ----------------------- */


    /*  ------------------- student functions ----------------- */

    public function students_register_loaddata() {
        $this->load->model('exam_students');
        $data['admnno'] = $this->input->post('admnno');
        $data['securitycode'] = $this->input->post('securitycode');
        $data['month'] = $this->input->post('month');
        $data['year'] = $this->input->post('year');
        $data['college'] = $this->input->post('college');
        $data['degree'] = $this->input->post('degree');
        $data['branch'] = $this->input->post('branch');
        $data['email'] = $this->input->post('email');
        if($this->exam_students->register_completed()){
                $data['msg']="You have already completed registration";
                
         }
        $data['students_data'] = $this->exam_students->load_data($data);
        $this->load->view('exam_students_register_load_data', $data);
    }

    public function students_register_add() {

        /*--- save pic and sign -----*/
        $img_pic = $this->input->post('pic');
         $img_pic = str_replace('data:image/jpeg;base64,', '', $img_pic);
         $img_pic = str_replace('data:image/jpg;base64,', '', $img_pic);
         $img_pic = str_replace('[removed]', '', $img_pic);
        $img_pic = str_replace(' ', '+', $img_pic);
        $data_pic = base64_decode($img_pic);
        $file1 =   'uploads/pic/'.(rand()*100000).'.jpg';
         $success1 = file_put_contents($file1, $data_pic);

         $img_sign = $this->input->post('sign');
         $img_sign = str_replace('data:image/jpeg;base64,', '', $img_sign);
         $img_sign = str_replace('data:image/jpg;base64,', '', $img_sign);
         $img_sign = str_replace('[removed]', '', $img_sign);
        $img_sign = str_replace(' ', '+', $img_sign);
        $data_sign = base64_decode($img_sign);
        $file2 =   'uploads/sign/'.(rand()*100000).'.jpg';
         $success2 = file_put_contents($file2, $data_sign);

    /*-----------------------------------------------*/
  $this->load->library('recaptcha');
        $this->load->library('form_validation', array(), 'college_form');
        if(base_url()=="http://127.0.0.1/cusat/")
        $this->college_form->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check|xss_clean');
        else
          $this->college_form->set_rules('recaptcha_response_field', 'Captcha', 'trim|required|callback_captcha_check|xss_clean');
        
        $this->college_form->set_rules('admnno', 'Admission Number', 'trim|required|xss_clean');
        $this->college_form->set_rules('month', 'month', 'trim|required|xss_clean');
        $this->college_form->set_rules('year', 'year', 'trim|required|xss_clean');
        $this->college_form->set_rules('degree', 'degree', 'trim|required|xss_clean');

        $this->college_form->set_rules('branch', 'branch', 'trim|required|xss_clean');
        $this->college_form->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->college_form->set_rules('name', 'name', 'trim|required|xss_clean');
         $this->college_form->set_message('captcha_check', 'Incorrect Captcha');
        
        if (!$this->college_form->run()) {
            $data['msg']= "not ok;".validation_errors();
            $this->load->view('response_notok',$data);
        } else {

            $this->load->model('exam_students');
            $data['pic']=$file1;
            $data['sign']=$file2;
            if($this->exam_students->register_completed()){
                $data['msg']="not ok;"."You have already completed registration";
                $this->load->view('response_notok',$data);
            }
             else{
                $result=$this->exam_students->register_student($data);
              if (!$result) {
                 $this->load->view('response_notok');
            } else {
                $data['msg']="ok;".$result;
                $this->load->view('response_ok',$data);
               
            }
        }
        }
    }
public function captcha_check($value = '') {
        
      if(base_url()!="http://127.0.0.1/cusat/"){
         $this->recaptcha->recaptcha_check_answer();
        if(!$this->recaptcha->getIsValid()) {
                      return false;     
                        }
                        else{
                          return true;
                        }
      }

        // First, delete old captchas
        $expiration = time() - 7200;
        
        // Two hour limit
        $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);
        
        // Then see if a captcha exists:
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        
        if ($row->count == 0) {
            return FALSE;
        }
        return TRUE;
    }
    /* ----------------------------- general functions ------------------ */
    public function download_registerform()
    {
        $this->load->model('exam_students');
         $this->load->library('form_validation', array(), 'college_form');
        $this->college_form->set_rules('admnno', 'Admission Number', 'trim|required|xss_clean');
        $this->college_form->set_rules('securitycode', 'Security Code', 'trim|required|xss_clean');
         if (!$this->college_form->run()) {
            $data['msg']= "not ok;".validation_errors();
            $this->load->view('response_notok',$data);
        } else {

            
             $this->load->model('exam_colleges');
            $this->load->model('exam_degrees');
            $this->load->model('exam_branches');
            $data['college_details'] = $this->exam_colleges->get_colleges();
            $data['degree_details'] = $this->exam_degrees->get_degrees();
            $data['branch_details'] = $this->exam_branches->get_branches();
            $data['student_details']=$this->exam_students->download_registerform();
            //var_dump($data);
            $this->load->view('download_registerform',$data);
               
            }

        



    }
    public function colleges($page, $data = "") {
        if (!isset($page))
            exit();

        if (($page != "register")) {
            $this->check_isvalidated();
            $this->headers($page, "college");
        } else {
            $this->headers($page, "home");
        }
        if ($page == "home") {
            $this->load->model('exam_students');
            $data['student_status'] = $this->exam_students->status();

            $this->load->model('exam_colleges');
            $this->load->model('exam_degrees');
            $this->load->model('exam_branches');
            $data['college_details'] = $this->exam_colleges->get_colleges();
            $data['degree_details'] = $this->exam_degrees->get_degrees();
            $data['branch_details'] = $this->exam_branches->get_branches();

            $this->load->view('exam_college_home', $data);
        } else if ($page == "students") {

            $this->load->view('exam_college_studentsdetails', $data);
        } else if ($page == "search") {
            $this->load->model('exam_branches');
            $this->load->model('exam_students');
            $data['year_minmax'] =0;// $this->exam_students->get_minmax();
            $data['session'] = $this->session->all_userdata();
            $data['branch_details'] = $this->exam_branches->get_branches();
            $this->load->view('exam_search', $data);
        } else if ($page == "register") {
            $this->load->library('recaptcha');

            //Store the captcha HTML for correct MVC pattern use.
            $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();

            $this->load->model('exam_news');
            $data['news_data'] = $this->exam_news->get_news();
            $this->load->view('exam_college_register', $data);
        } else if ($page == "settings") {
            $this->load->view('exam_college_settings', $data);
        } else {
            $this->load->view('404');
        }
        if (!$page = "register") {
            $this->footers("college");
        } else {
            $this->footers("home");
        }
    }

    public function admin($page = "home", $data = "") {
        if (!isset($page))
            exit();

        $this->check_isvalidated();
        $this->check_isadmin();
        // @page is for page requested
        // @ active is for setting selecte at nav bar
        $this->headers($page, "admin");
        $this->load->library('encrypt');
        if ($page == "home") {
            $this->load->model('exam_colleges');
            $data['colleges_status'] = $this->exam_colleges->status();

            $this->load->model('exam_students');
            $data['student_status'] = $this->exam_students->status();


            $data['active'] = "home";
            $this->load->view('exam_admin_home', $data);
        } else if ($page == "college_details") {
            $this->load->model('exam_colleges');
            $this->load->model('exam_degrees');
            $this->load->model('exam_branches');
            $data['college_details'] = $this->exam_colleges->get_colleges();
            $data['degree_details'] = $this->exam_degrees->get_degrees();
            $data['branch_details'] = $this->exam_branches->get_branches();
            $data['clg_details'] = $this->exam_colleges->get_colleges();

            $this->load->view('exam_colleges_details', $data);
        } else if ($page == "student_verification") {
            $this->load->model('exam_students');
            $this->load->library('encrypt');
            $data['marks_details'] = 0;//$this->exam_students->get_admin_markdetails();
            $data['student_details'] = $this->exam_students->allstudent_details();
            $this->load->view('exam_student_verification', $data);
        } else if ($page == "exam_details") {
            $this->load->model('exam_exams');
            $data['exam_details'] = $this->exam_exams->get_verifylist();
            $data['verified_exam_details'] = $this->exam_exams->get_verifiedlist();
            $this->load->model('exam_offers');
            $this->load->model('exam_students');
            $data['verified_offer_details'] = $this->exam_offers->get_verifiedlist();
            $data['offer_details'] = $this->exam_offers->get_verifylist();
            $data['student_details'] = $this->exam_students->students_list_name();

            $data['active'] = "exam_details";
            $this->load->view('exam_admin_details', $data);
        } else if ($page == "news") {
            $data['active'] = "news";
            $this->load->model('exam_news');
            $data['news_data'] = $this->exam_news->get_news();
            $this->load->view('exam_admin_news', $data);
        } else if ($page == "settings") {
            $data['active'] = "settings";
            
            $this->load->view('exam_admin_settings', $data);
        } else if ($page == "search") {
            $data['active'] = "search";
            $this->load->model('exam_branches');
            $this->load->model('exam_students');
            $data['year_minmax'] =0;// $this->exam_students->get_minmax();
            $data['session'] = $this->session->all_userdata();
            $data['branch_details'] = $this->exam_branches->get_branches();
            $this->load->view('exam_search', $data);
        } else if ($page == "verify") {
            $this->load->library('email');
            $this->load->model('exam_branches');
            $this->load->model('exam_students');
            $this->load->model('exam_colleges');
            $data['branch_details'] = $this->exam_branches->get_branches();
            $data['students_newreg'] = $this->exam_students->verify_newreg();
            $data['colleges_newreg'] = $this->exam_colleges->verify_newreg();
            //$this->exam_students->verify_newreg();
            $data['active'] = "verify";
            $this->load->view('exam_admin_verify', $data);
        } else {
            $data['active'] = "home";
            $this->load->view('404');
        }

        $this->footers("admin");
    }

    public function headers($page = "", $type = "") {

        if ($page != "") {
            $data['active'] = $page;
        } else {

            $data['active'] = "home";
        }

        $this->load->view('bootstrap/exam_header', $data);
        if ($type == "admin") {
            $this->check_isadmin();
            $this->load->view('bootstrap/exam_admin_nav', $data);
        } else if ($type == "students") {
            $this->load->view('bootstrap/exam_students_nav', $data);
        } else if ($type == "college") {
            $this->load->view('bootstrap/exam_college_nav', $data);
        } else if ($page == "view_profile") {
            
        } else {
            $this->load->view('bootstrap/exam_nav', $data);
        }
    }

    public function index($page = "home") {
        $this->headers();
        $this->load->model('exam_news');
        $data['news_data'] = $this->exam_news->get_news();
        if ($page == "home") {

            $this->load->view('home_body_exam', $data);
        } else {
            $this->load->view('404');
        }
        $this->footers();
    }

    public function students($page, $data = "") {
        if (!isset($page))
            exit();
        if (($page != "register")) {
            $this->check_isvalidated();
            $this->headers($page, "students");
            $this->load->model('exam_students');
            $this->load->model('exam_branches');
            $this->load->model('exam_semesters');
            $data['student_details'] = $this->exam_students->get_details();
            $data['branch_details'] = $this->exam_branches->get_branches();
            $data['semester_details'] = $this->exam_semesters->get_semesters();
        } else {
            $this->headers($page, "home");
        }

        if ($page == "home") {
            $this->load->library('encrypt');
            $this->load->view('exam_students_home', $data);
        } else if ($page == "register") {
            $this->load->library('recaptcha');

            //Store the captcha HTML for correct MVC pattern use.
            $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();

            $this->load->model('exam_news');
            $data['news_data'] = $this->exam_news->get_news();
            $this->load->model('exam_colleges');
            $data['clg_details'] = $this->exam_colleges->get_colleges();
            $this->load->view('exam_students_register', $data);
        } else {
            $this->load->view('404');
        }

        if (!$page = "register") {
            $this->footers("students");
        } else {
            $this->footers("home");
        }
    }

    public function home($page = "home", $data = "", $rec = "") {

        // @msg is used to pass error msgs from login validation
        // @page is for page requested
        // @ active is for setting selecte at nav bar
        if ($page == "resetpwd")
            if (!is_array($data))
                $data = array();
        $this->headers($page);
        if ($page != "resetpwd") {
            $this->load->model('exam_news');
            $data['news_data'] = $this->exam_news->get_news();
        }
        if ($page == "home") {
            $data['active'] = "home";
            $this->load->view('home_body_exam', $data);
        } else if ($page == "instructions") {
            $data['active'] = "instructions";
            $this->load->view('exam_instructions', $data);
        } else if ($page == "downloads") {
            $data['active'] = "downloads";
            $this->load->view('exam_downloads', $data);
        } else if ($page == "history") {
            $this->load->model('exam_exams');
            //    $this->load->model('exam_students');
            $data['exam_data'] = $this->exam_exams->get_history();
            $data['year_data'] = $this->exam_exams->get_year();
            // $data['student_details'] = $this->exam_students->students_list_name();
            $data['active'] = "history";
            $this->load->view('exam_history', $data);
        } else if ($page == "news_details") {

            $this->load->view('exam_news_details', $data);
        } else if ($page == "contact") {
            $data['active'] = "contact";
            $this->load->view('exam_contact', $data);
        } else if ($page == "forgotpassword") {
            $data['active'] = "forgot_pwd";
            $this->load->view('exam_forgotpwd', $data);
        } else if ($page == "resetpwd") {
            $data['active'] = "resetpwd";
            $data['rec'] = $rec;
            $this->load->model('exam_admin');
            $this->load->model('exam_colleges');
            $this->load->model('exam_students');
            $this->load->library('encrypt');
            $user = $this->exam_students->recover($rec);
            // echo $user.$rec;
            if ($user == "")
                $user = $this->exam_colleges->recover($rec);
            if ($user == "")
                $user = $this->exam_admin->recover($rec);
            if ($user == "")
                $user = "invalid";
            $data['user'] = $user;
            $this->load->view('exam_resetpwd', $data);
        }

        else {
            $data['active'] = "home";
            $this->load->view('404');
        }

        $this->footers();
    }

    public function reset_password() {
        $this->load->library('email');
        $this->load->library('encrypt');
        $this->load->library('form_validation', array(), 'password_form');
        $this->password_form->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[r_password]|xss_clean');
        $this->password_form->set_rules('r_password', 'RetypePassword', 'trim|required|min_length[8]|xss_clean');

        if (!$this->password_form->run()) {

            // $this->load->view('exam_students_register', $data);

            $data['update_form_error_msg'] = validation_errors();
            $this->home("resetpwd", $data, $this->input->post('rec'));
        } else {
            $user = $this->encrypt->decode($this->input->post('user'));
            $this->load->model('exam_students');
            $this->load->model('exam_admin');
            $this->load->model('exam_colleges');

            if ($this->exam_students->resetpwd($user) || $this->exam_admin->resetpwd($user) || $this->exam_colleges->resetpwd($user)) {
                $this->password_form->clear_field_data();
                $data['update_form_success_msg'] = "Password changed successfully";
                $this->home("resetpwd", $data);
            } else {
                $data['update_form_error_msg'] = "Password changing failed";
                $this->home("resetpwd", $data);
            }
        }
    }

    public function vision_and_mission() {
        $this->headers();
        $this->load->view('vision_and_mission');
        $this->footers();
    }

    public function events($page = 'events') {
        $this->load->model('Events');
        $this->Model->msg = "hi";
        $this->Model->save();
    }

    public function footers($type = "") {
        if ($type == "admin" || $type == "students" || $type == "college")
            $data['session'] = $this->session->all_userdata();
        $this->load->view('bootstrap/exam_secondary');
        $this->load->view('bootstrap/exam_footer');
        if ($type == "admin" || $type == "students" || $type == "college") {
            $this->load->view('security_check');
        }
    }

    public function forgot_pwd($value = '') {
        $data = array();
        $this->load->library('form_validation', array(), 'forgotpwd_form');
        $this->forgotpwd_form->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        if (!$this->forgotpwd_form->run()) {
            $data['forgotpwd_form_error_msg'] = validation_errors();
            $this->home("forgotpassword", $data);
        } else {


            $this->load->model('exam_admin');
            $this->load->model('exam_students');
            $this->load->model('exam_colleges');
            if ($this->exam_admin->forgot_pwd() || $this->exam_colleges->forgot_pwd() || $this->exam_students->forgot_pwd()) {
                $data['forgotpwd_form_success_msg'] = "Password reset link has been send to your Email Address<br>Use the following link to reset your password " . base_url() . "index.php/exam/home/resetpwd/resetpwd/{recovery key}";
            } else {
                $data['forgotpwd_form_error_msg'] = "Email address not found";
            }
            $this->home('forgotpassword', $data);
        }
    }

    public function logout() {

        $this->session->sess_destroy();

        $this->load->view('logout');

        //redirect('exam/home');
    }

    public function branch_list() {
        $this->load->model('exam_branches');
        if ($this->input->is_ajax_request()) {
            $data['course_id'] = $this->input->post('course_id');
            $data['branch_data'] = $this->exam_branches->get_branches($this->input->post('course_id'));
        } else
            $data['branch_data'] = $this->exam_branches->get_branches();
        $this->load->view('exam_branch_list', $data);
    }

    public function degree_list() {
        $this->load->model('exam_degrees');
        if ($this->input->is_ajax_request()) {
            $data['college_id'] = $this->input->post('college_id');
            $data['degree_data'] = $this->exam_degrees->get_degrees($this->input->post('college_id'));
        } else
            $data['degree_data'] = $this->exam_degrees->get_degrees();
        $this->load->view('exam_degree_list', $data);
    }

    public function loginverify() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        if ($this->form_validation->run() != FALSE) {

            // Load the model
            $this->load->model('exam_admin');
            $this->load->model('exam_students');
            $this->load->model('exam_colleges');

            // Validate the user can login
            $result = $this->exam_admin->check_login();

            // Now we verify the result
            if ($result == "false") {

                // admin check failed
                // $result = $this->exam_students->check_login(); //student login disabled
                $result = "false";
                if ($result == "false") {

                    // students check failed try colleges
                    $result = $this->exam_colleges->check_login();
                    if ($result == "false") {

                        // If user did not validate, then show them login page again
                        $data['login_form_error_msg'] = 'Invalid username and/or password.';
                        $this->home("home", $data);
                    } else if ($result == "true") {
                        redirect('exam/colleges/home', 'refresh');
                    } else if ($result == "PENDING") {
                        $data['login_form_error_msg'] = 'Account verification pending.';
                        $this->home("home", $data);
                    } else if ($result == "REJECT") {
                        $data['login_form_error_msg'] = 'Account has been suspended.';
                        $this->home("home", $data);
                    }
                } else if ($result == "true") {

                    // If user did validate,
                    // Send them to students area

                    redirect('exam/students/home', 'refresh');
                } else if ($result == "PENDING") {
                    $data['login_form_error_msg'] = 'Account verification pending.';
                    $this->home("home", $data);
                } else if ($result == "REJECT") {
                    $data['login_form_error_msg'] = 'Account has been suspended.';
                    $this->home("home", $data);
                }
            } else if ($result == "true") {
                redirect('exam/admin/home', 'refresh');

                //redirect to admin page
            } else if ($result == "PENDING") {
                $data['login_form_error_msg'] = 'Account verification pending.';
                $this->home("home", $data);
            } else if ($result == "REJECT") {
                $data['login_form_error_msg'] = 'Account has been suspended.';
                $this->home("home", $data);
            }
        } else {
            $data['login_form_error_msg'] = validation_errors();
            $this->home("home", $data);
        }
    }

    public function check_isvalidated() {
        if (!$this->session->userdata('validated')) {

            $this->session->sess_destroy();
            $this->load->view('login_to_continue');
        } else {
            return TRUE;
        }
    }

    public function check_isadmin() {
        if (!$this->session->userdata('admin')) {

            //print_r($this->session->userdata);
            // redirect('exam/home');
            $this->session->sess_destroy();
            $this->load->view('login_to_continue');
        } else {
            return TRUE;
        }
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
