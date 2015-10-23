<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Placement extends CI_Controller
{
    
    /** * Index Page for this controller. * * Maps to the following URL * http://example.com/index.php/welcome * - or - * http://example.com/index.php/welcome/index * - or - * Since this controller is set as the default controller in * config/routes.php, it 's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * see http://codeigniter.com/user_guide/general/urls.html
     */

    public function give_offer()
    {
      if ($this->input->is_ajax_request()) {
            $this->check_isvalidated();
          $this->check_iscompany();
                $this->load->model('placement_offers');
              
            $this->load->library('encrypt');
            //echo $this->encrypt->decode($this->input->post('id'));
            $response=$this->placement_offers->add_offer($this->encrypt->decode($this->input->post('company')),$this->encrypt->decode($this->input->post('std')),$this->input->post('desc'));
               if ($response=="1") //echo "ok";
                $this->load->view('response_ok');
               else if($response == "sent")// echo "sent";
                $this->load->view('response_sent');
                else
                // echo "not ok";
                  $this->load->view('response_notok');
            
        }
    }
    public function student_list_year_branch( $valid = '') {
        if ($this->input->is_ajax_request()) {
            $this->check_isvalidated();
             $this->check_isadmin();
            if ($this->input->post('type') == "coordinator") {
                $this->load->model('placement_students');
                $data['student_list_year_branch']=$this->placement_students->student_list_year_branch();
                $this->load->library('encrypt');
               $this->load->view('student_list_year_branch', $data); 
            }
        }
    }

  public function marks_validate_ajax( $valid = '') {
        if ($this->input->is_ajax_request()) {

            $this->check_isvalidated();
             $this->check_iscoordinator();
            $this->load->library('email');
                $this->load->model('placement_students');
                $this->load->model('placement_marks');
                if ($this->placement_students->marks_validate($valid)){
                   if($valid=="v") $this->placement_marks->verified();
                // echo "ok";
                   $this->load->view('response_ok');
               }
                else //echo "not ok";
            $this->load->view('response_notok');
           
        }else{
          $this->load->view('response_notok');
        }
    }
 public function validate_placement_ajax() {
        if ($this->input->is_ajax_request()) {
           
            $this->check_isvalidated();
            $this->check_isadmin();
             $this->load->library('encrypt');
            $this->load->model('placement_offers');
                $this->load->model('placement_placements');
                if($this->input->post('type')=="placement"){
                if ($this->placement_placements->validate($this->encrypt->decode($this->input->post('id'))))
                // echo "ok";
                  $this->load->view('response_ok');
                else// echo "not ok";
                $this->load->view('response_notok');
            }else   if($this->input->post('type')=="offer"){
                if ($this->placement_offers->validate($this->encrypt->decode($this->input->post('id'))))
                // echo "ok";
                  $this->load->view('response_ok');
                else//                 echo "not ok";
                $this->load->view('response_notok');
            }
           
        }
    }
    public function news_delete($value='')
    {
      if ($this->input->is_ajax_request()) {
            $this->check_isvalidated();
            $this->check_isadmin();
            $this->load->model('placement_news');
            $this->load->library('encrypt');
            //echo $this->encrypt->decode($this->input->post('id'));
                if ($this->placement_news->news_delete($this->encrypt->decode($this->input->post('id'))))// echo "ok";
                $this->load->view('response_ok');
                else //echo "not ok";
                $this->load->view('response_notok');
          }else{
             $this->load->view('response_error');
          }
    }
    
    public function validate_reg_ajax( $valid = '') {
        if ($this->input->is_ajax_request()) {
            $this->check_isvalidated();
            $this->check_isadmin();
            if ($this->input->post('type') == "student") {
                $this->load->model('placement_students');
                if ($this->placement_students->validate($valid)) //echo "ok";
                $this->load->view('response_ok');
                else// echo "not ok";
                $this->load->view('response_notok');
            }else if ($this->input->post('type') == "coordinator") {
                $this->load->model('placement_students');
                if ($this->placement_students->validate_coordinator($valid))// echo "ok";
                $this->load->view('response_ok');
                else //echo "not ok";
                $this->load->view('response_notok');
            } else if ($this->input->post('type') == "company") {
                $this->load->model('placement_company');
                if ($this->placement_company->validate($valid)) //echo "ok";
                $this->load->view('response_ok');
                else //echo "not ok";
                $this->load->view('response_notok');
            } else {
                //echo "error";
              $this->load->view('response_error');
                //error
                ;
            }
        }
    }
    
    public function events($page = 'events') {
        
        $data = array();
        $this->load->model('Events');
        $events = new Events();
        $events->load(1);
        $data['events'] = $events;
        
        //$this->Events->msg='k'; //insert
        //$this->Events->save();
       // echo '<div>' . var_export($this->Events, TRUE) . '</div>';
    }
    
    public function logout() {

        $this->session->sess_destroy();
        
        $this->load->view('logout');
        
        //redirect('placement/home');
        
        
    }
    
    public function headers($page = "", $type = "") {
        
        if ($page != "") {
            $data['active'] = $page;
        } else {
            
            $data['active'] = "home";
        }
        
        $this->load->view('bootstrap/placement_header',$data);
        if ($type == "admin") {
          $this->check_isadmin();
            $this->load->view('bootstrap/placement_admin_nav', $data);
        } else if ($type == "students") {
            $this->load->view('bootstrap/placement_students_nav', $data);
        } else if ($type == "company") {
            $this->load->view('bootstrap/placement_company_nav', $data);
        }else if ($page == "view_profile") {

        } else {
            $this->load->view('bootstrap/placement_nav', $data);
        }
    }
    
    public function footers($type = "") {
        if ($type == "admin" || $type == "students" || $type == "company")
            $data['session']=$this->session->all_userdata();
        $this->load->view('bootstrap/placement_secondary');
        $this->load->view('bootstrap/placement_footer');
        if ($type == "admin" || $type == "students" || $type == "company") {
            $this->load->view('security_check');
        }
    }
    
    public function index($page = "home") {
        $this->headers();
        $this->load->model('placement_news');
        $data['news_data'] =$this->placement_news->get_news();
        if ($page == "home") {
          
            $this->load->view('home_body_placement',$data);
        } else {
            $this->load->view('404');
        }
        $this->footers();
    }
    public function developers($page = "developers")
    {
     
     if($this->session->userdata('admin')=='true')
      $this->headers($page, "admin");
      else if($this->session->userdata('company')=='true')
      $this->headers($page, "company");
    else if($this->session->userdata('students')=='true')
      $this->headers($page, "students");
    else
      $this->headers();
            $data['active'] = "developers";
            $this->load->view('placement_developers', $data);
       
      $this->footers(); 
    }
    public function home($page = "home", $data = "", $rec="") {
        
        // @msg is used to pass error msgs from login validation
        // @page is for page requested
        // @ active is for setting selecte at nav bar
       if($page=="resetpwd")
        if(!is_array($data))
       $data=array();
        $this->headers($page);
         if($page!="resetpwd"){
        $this->load->model('placement_news');
        $data['news_data'] =$this->placement_news->get_news();
      }
        if ($page == "home") {
            $data['active'] = "home";
            $this->load->view('home_body_placement', $data);
            
        }else if ($page == "alumni") {
            $data['active'] = "alumni";
            $this->load->view('placement_alumni', $data);
        }else if ($page == "instructions") {
            $data['active'] = "instructions";
            $this->load->view('placement_instructions', $data);
        } else if ($page == "history") {
            $this->load->model('placement_placements');
           //    $this->load->model('placement_students');
        $data['placement_data'] =$this->placement_placements->get_history();
          $data['year_data'] =$this->placement_placements->get_year();
         // $data['student_details'] = $this->placement_students->students_list_name();
            $data['active'] = "history";
            $this->load->view('placement_history', $data);
        }else if ($page == "news_details") {
            
            $this->load->view('placement_news_details', $data);
        }else if ($page == "contact") {
            $data['active'] = "contact";
            $this->load->view('placement_contact', $data);
        }else if ($page == "forgotpassword") {
            $data['active'] = "forgot_pwd";
            $this->load->view('placement_forgotpwd', $data);
        }else if ($page == "resetpwd") {
            $data['active'] = "resetpwd";
            $data['rec']=$rec;
            $this->load->model('placement_admin');
             $this->load->model('placement_company');
              $this->load->model('placement_students');
               $this->load->library('encrypt');
              $user=$this->placement_students->recover($rec);
             // echo $user.$rec;
              if($user=="")
                $user=$this->placement_company->recover($rec);
              if($user=="")
              $user=$this->placement_admin->recover($rec);
            if($user=="")
              $user="invalid";
            $data['user']=$user;
            $this->load->view('placement_resetpwd', $data);
        }

         else {
            $data['active'] = "home";
            $this->load->view('404');
        }
        
        $this->footers();
    }
    
    public function admin($page = "home", $data = "") {
        if(!isset($page)) exit();
        
        $this->check_isvalidated();
        $this->check_isadmin();
        // @page is for page requested
        // @ active is for setting selecte at nav bar
        $this->headers($page, "admin");
        $this->load->library('encrypt');
        if ($page == "home") {
            $this->load->model('placement_company');
            $data['company_status']=$this->placement_company->status();

            $this->load->model('placement_students');
            $data['student_status']=$this->placement_students->status();

            $this->load->model('placement_marks');
            $data['mark_status']=$this->placement_marks->status();

            $this->load->model('placement_offers');
            $data['offers_status']=$this->placement_offers->status();

            $data['active'] = "home";
            $this->load->view('placement_admin_home', $data);
        } else if ($page == "history") {
            $data['active'] = "history";
            $this->load->view('placement_admin_history', $data);
        } else if ($page == "mark_verification") {
             $this->load->model('placement_students');
             $this->load->library('encrypt');
             $data['marks_details'] = $this->placement_students->get_admin_markdetails();
           $data['student_details']=$this->placement_students->student_list_year_branch("admin");
            $this->load->view('placement_coordinator_mark_verification', $data);
        } else if ($page == "placement_details") {
            $this->load->model('placement_placements');
            $data['placement_details']=$this->placement_placements->get_verifylist();
            $data['verified_placement_details']=$this->placement_placements->get_verifiedlist();
            $this->load->model('placement_offers');
            $this->load->model('placement_students');
            $data['verified_offer_details']=$this->placement_offers->get_verifiedlist();
            $data['offer_details']=$this->placement_offers->get_verifylist();
            $data['student_details'] = $this->placement_students->students_list_name();

            $data['active'] = "placement_details";
            $this->load->view('placement_admin_details', $data);
        } else if ($page == "news") {
            $data['active'] = "news";
            $this->load->model('placement_news');
        $data['news_data'] =$this->placement_news->get_news();
            $this->load->view('placement_admin_news', $data);
        }else if ($page == "search") {
            $data['active'] = "search";
            $this->load->model('placement_branches');
            $this->load->model('placement_students');
            $data['year_minmax']=$this->placement_students->get_minmax();
            $data['session']=$this->session->all_userdata();
            $data['branch_details'] = $this->placement_branches->get_branches();
            $this->load->view('placement_search', $data);
        }
         else if ($page == "verify") {
          $this->load->library('email');
                        $this->load->model('placement_branches');
              $this->load->model('placement_students');
            $this->load->model('placement_company');
            $data['branch_details'] = $this->placement_branches->get_branches();
            $data['students_newreg'] = $this->placement_students->verify_newreg();
            $data['company_newreg'] = $this->placement_company->verify_newreg();
            //$this->placement_students->verify_newreg();
            $data['active'] = "verify";
            $this->load->view('placement_admin_verify', $data);
        }else if ($page == "coordinators") {
            $this->load->model('placement_branches');
            $data['branch_details'] = $this->placement_branches->get_branches();
            
           
            $this->load->model('placement_students');
            $data['year_details']=$this->placement_students->year_details();
            $data['coordinator_list'] = $this->placement_students->coordinator_list();
            $data['active'] = "coordinator";
            $this->load->view('placement_admin_coordinator', $data);
         }else {
            $data['active'] = "home";
            $this->load->view('404');
        }
        
        $this->footers("admin");
    }

    public function performance_marks()
    { 
      if( $this->check_isvalidated()){
        $data=array();
        //echo $this->input->post('list');

        $data['list']=json_decode($this->input->post('list'));
        // print_r($list);
      
        $this->load->model('placement_marks');
        if($this->session->userdata('admin') || $this->session->userdata('company'))
        $data['marks_details'] = $this->placement_marks->performance(json_decode($this->input->post('list')));
        else
          $data['marks_details'] = $this->placement_marks->performance();

        $this->load->model('placement_students');
        if($this->session->userdata('admin') || $this->session->userdata('company'))
        $data['student_name_regno'] = $this->placement_students->student_name_regno(json_decode($this->input->post('list')));
        else
          $data['student_name_regno'] = $this->placement_students->student_name_regno();
        
        $this->load->view('performance', $data);
      }
    }
    public function viewprofile()
    {
      if( $this->check_isvalidated()){
        $data=array();
         $this->load->library('encrypt');
       $data['session']=$this->session->all_userdata();
       if(NULL!==$this->input->post('id')){

        $decode=$this->encrypt->decode($this->input->post('id'));
        if(!strpos($decode, "@#$")){
          $this->logout();
          $this->check_isvalidated();
          return;
        }
        $data["username"]=str_replace("@#$","",$decode);
        if($data["username"]==""){
          $this->logout();
          $this->check_isvalidated();
          return;
        }
   }else{
    exit();
    return FALSE ;
}


    if(NULL!==$this->input->post('target'))
        $data["target"]=$this->input->post('target');
        
        if($data["target"]=="newtab")
        $this->headers("view_profile");



        $this->load->model('placement_students');
        $this->load->model('placement_marks');
        $this->load->model('placement_offers');
        $data['offer_details'] = $this->placement_offers->get_offers($data["username"]);

        $data['student_details'] = $this->placement_students->profileview($data["username"]);
           $regno=$data['student_details'][0]['regno'];
            $data['mark_details'] = $this->placement_marks->profileview($regno);

            if(NULL!==$this->input->post('profile_settings_check')){

              if($this->input->post('profile_settings_check')=="true"){
                //echo "string";

                if($data["username"]!=$this->session->userdata('username'))
                  $this->logout();
                else{
                  $data['profile_check']="true";
                  $data['session']['regno']="-1";
                  $data['session']['year_pass']="-1";
                  $data['session']['branch']="-1";
                  $data['session']['admin']="false";
                  $data['session']['company']="false";
                if($this->input->post('type')=="self"){
                  $data['session']['regno']=$this->session->userdata('regno');
                  $data['session']['year_pass']=$this->session->userdata('year_pass');
                  $data['session']['branch']=$this->session->userdata('branch');
                }
                elseif($this->input->post('type')=="classmates"){
                  $data['session']['year_pass']=$this->session->userdata('year_pass');
                  $data['session']['branch']=$this->session->userdata('branch');
                }
                elseif($this->input->post('type')=="batchmates"){
                  $data['session']['year_pass']=$this->session->userdata('year_pass');
                  
                }
                elseif($this->input->post('type')=="admin"){
                  $data['session']['admin']="true";
                  
                }
              }
              }
            }

       $this->load->view('placement_viewprofile',$data);
       

       if($data["target"]=="newtab")
        $this->footers();
     }   
    }
    public function search_results()
    {$this->load->library('session');
        $this->check_isvalidated();
        if ($this->input->is_ajax_request()) {
        $this->load->library('form_validation', array(), 'search_form');
        $config = array(
               array(
                     'field'   => 'name', 
                     'label'   => 'Name', 
                     'rules'   => 'trim|xss_clean'
                  ),
               array(
                     'field'   => 'branch', 
                     'label'   => 'Password', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'year_pass_min', 
                     'label'   => 'Year Min', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'year_pass_max', 
                     'label'   => 'Year Max', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'arrier_min', 
                     'label'   => 'Arrier Min', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'arrier_max', 
                     'label'   => 'Arrier Max', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'percent_min', 
                     'label'   => 'Percent Min', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'percent_max', 
                     'label'   => 'Percent Max', 
                     'rules'   => 'trim|required|xss_clean'
                  )
            );
        $this->search_form->set_rules($config);
        if($this->search_form->run()){
             $this->load->model('placement_students');
            
             $data['students_search']=$this->placement_students->search();
          // print_r($data);
        if(sizeof($data['students_search'])>0){
             $this->load->library('encrypt');

            $this->load->model('placement_branches');
            $data['branch_details'] = $this->placement_branches->get_branches();
             
             $this->load->model('placement_marks');
           $data['marks_search']=$this->placement_marks->search();

           $data['session']=$this->session->all_userdata();

            $this->load->view('search_results',$data);
        }
    
        else{
            $this->load->view('search_results_empty');
        }
    }
    else{//echo "string";
            $this->load->view('search_results_empty');}
    }
    else{//echo "string";
      $this->load->view('search_results_empty');   
    }
    }
    public function students_update_privacy()
    {
        $this->load->library('form_validation', array(), 'privacy_form');
        $this->privacy_form->set_rules('privacy_profile_pic', 'Privacy Profile Picture', 'trim|required|xss_clean');
        $this->privacy_form->set_rules('privacy_personal', 'Privacy Personal', 'trim|required|xss_clean');
        $this->privacy_form->set_rules('privacy_academic', 'Privacy Academic', 'trim|required|xss_clean');
        $this->privacy_form->set_rules('privacy_resume', 'Privacy Resume', 'trim|required|xss_clean');
        
        
         if (!$this->privacy_form->run()) {
            
            // $this->load->view('placement_students_register', $data);
            
            $data['privacy_form_error_msg'] = validation_errors();
            $this->students("settings", $data);
        } else {
            
            $this->load->model('placement_students');
            
            if ($this->placement_students->changeprivacy()) {
                $this->privacy_form->clear_field_data();
                $data['privacy_form_success_msg'] = "Privacy settings changed successfully";
                $this->students("settings", $data);
            } else {
                $data['privacy_form_error_msg'] = "Privacy settings changing failed";
                $this->students("settings", $data);
            }
        }
    }
    public function send_mail($mail,$subject,$msg)
    {
      $this->load->helper('email');
      if (!valid_email($mail))
      {
           return false;
      }

      $this->email->from('cusat@gmail.com', 'Exam Cell Cusat');
      $this->email->to($mail);
      $this->email->subject($sub);
      $this->email->message($msg);  

      $this->email->send();

      //echo $this->email->print_debugger();
    }

   
public function reset_password()
    {   $this->load->library('email');
    $this->load->library('encrypt');
        $this->load->library('form_validation', array(), 'password_form');
        $this->password_form->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[r_password]|xss_clean');
        $this->password_form->set_rules('r_password', 'RetypePassword', 'trim|required|min_length[8]|xss_clean');
        
         if (!$this->password_form->run()) {
            
            // $this->load->view('placement_students_register', $data);
            
            $data['update_form_error_msg'] = validation_errors();
            $this->home("resetpwd", $data,$this->input->post('rec'));
        } else {
            $user=$this->encrypt->decode($this->input->post('user'));
            $this->load->model('placement_students');
            $this->load->model('placement_admin');
            $this->load->model('placement_company');

            if ($this->placement_students->resetpwd($user) || $this->placement_admin->resetpwd($user) || $this->placement_company->resetpwd($user)) {
                $this->password_form->clear_field_data();
                $data['update_form_success_msg'] = "Password changed successfully";
                $this->home("resetpwd", $data);
            } else {
                $data['update_form_error_msg'] = "Password changing failed";
                $this->home("resetpwd", $data);
            }
        }
    }
    public function students_update_password()
    {   $this->load->library('email');
        $this->load->library('form_validation', array(), 'password_form');
        $this->password_form->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[r_password]|xss_clean');
        $this->password_form->set_rules('r_password', 'RetypePassword', 'trim|required|min_length[8]|xss_clean');
        
         if (!$this->password_form->run()) {
            
            // $this->load->view('placement_students_register', $data);
            
            $data['update_form_error_msg'] = validation_errors();
            $this->students("settings", $data);
        } else {
            
            $this->load->model('placement_students');
            
            if ($this->placement_students->changepwd()) {
                $this->password_form->clear_field_data();
                $data['update_form_success_msg'] = "Password changed successfully";
                $this->students("settings", $data);
            } else {
                $data['update_form_error_msg'] = "Password changing failed";
                $this->students("settings", $data);
            }
        }
    }
public function company_update_password()
    {
        $this->load->library('form_validation', array(), 'password_form');
        $this->password_form->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[r_password]|xss_clean');
        $this->password_form->set_rules('r_password', 'RetypePassword', 'trim|required|min_length[8]|xss_clean');
        
         if (!$this->password_form->run()) {
            
            // $this->load->view('placement_students_register', $data);
            
            $data['update_form_error_msg'] = validation_errors();
            $this->company("settings", $data);
        } else {
            
            $this->load->model('placement_company');
            
            if ($this->placement_company->changepwd()) {
                $this->password_form->clear_field_data();
                $data['update_form_success_msg'] = "Password changed successfully";
                $this->company("settings", $data);
            } else {
                $data['update_form_error_msg'] = "Password changing failed";
                $this->company("settings", $data);
            }
        }
    }
    public function students($page, $data = "") {
        if(!isset($page)) exit();
        if (($page != "register")) {
            $this->check_isvalidated();
            $this->headers($page, "students");
            $this->load->model('placement_students');
            $this->load->model('placement_branches');
            $this->load->model('placement_semesters');
            $data['student_details'] = $this->placement_students->get_details();
            $data['branch_details'] = $this->placement_branches->get_branches();
            $data['semester_details'] = $this->placement_semesters->get_semesters();
        } else {
            $this->headers($page, "home");
        }
        
        if ($page == "home") {
          $this->load->library('encrypt');
            $this->load->view('placement_students_home', $data);
        } else if ($page == "register") {
          $this->load->library('recaptcha');

                    //Store the captcha HTML for correct MVC pattern use.
          $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();

          $this->load->model('placement_news');
            $data['news_data'] =$this->placement_news->get_news();
            $this->load->model('placement_branches');
            $data['branch_details'] = $this->placement_branches->get_branches();
            $this->load->view('placement_students_register', $data);
        } else if ($page == "update") {
            $this->load->view('placement_students_update', $data);
        } else if ($page == "marks") {
            $this->load->model('placement_marks');
            $data['session']=$this->session->all_userdata();
                $data['marks_details'] = $this->placement_marks->get_marksdetails_students();
                $this->load->view('placement_students_marks', $data); 
        } else if ($page == "performance") {
            $this->load->model('placement_students');
             $data['student_details'] = $this->placement_students->students_performance();
             $data['session']=$this->session->all_userdata();
            $this->load->view('placement_students_performance', $data);
        } else if ($page == "resume") {
             $this->load->model('placement_students');
             $data['student_details'] = $this->placement_students->get_details();
            $this->load->view('placement_students_resume', $data);
        } else if ($page == "offers") {
           $this->load->library('encrypt');
           $this->load->model('placement_offers');

            $data['offers_data'] =$this->placement_offers->get_offers($this->session->userdata('username'),"valid");
            $this->load->view('placement_students_offers', $data);
        }else if ($page == "search") {
          $data['active'] = "search";
            $this->load->model('placement_branches');
            $this->load->model('placement_students');
            $data['year_minmax']=$this->placement_students->get_minmax();
            $data['session']=$this->session->all_userdata();
            $data['branch_details'] = $this->placement_branches->get_branches();
            $this->load->view('placement_search', $data);
        }else if ($page == "mark_verification") {
             $this->load->model('placement_students');
             $this->load->library('encrypt');
             $data['marks_details'] = $this->placement_students->get_coordinator_markdetails();
           $data['student_details']=$this->placement_students->student_list_year_branch("coordinator");
            $this->load->view('placement_coordinator_mark_verification', $data);
        }   else if ($page == "placements") {
            $this->load->model('placement_placements');
            $data['placements_data'] =$this->placement_placements->get_placements();
            $this->load->view('placement_students_placements', $data);
        } else if ($page == "settings") {
            $this->load->view('placement_students_settings', $data);
        } else if ($page == "help") {
            $this->load->view('placement_students_help', $data);
        } else {
            $this->load->view('404');
        }
        
        if (!$page = "register") {
            $this->footers("students");
        } else {
            $this->footers("home");
        }

        
    }
    
    public function company($page, $data = "") {
        if(!isset($page)) exit();

        if (($page != "register")) {
            $this->check_isvalidated();
            $this->headers($page, "company");
        } else {
            $this->headers($page, "home");
        }
        if ($page == "home") {
                      

            $this->load->model('placement_students');
            $data['student_status']=$this->placement_students->status();

             $this->load->model('placement_offers');
            $data['offer_status']=$this->placement_offers->status_company();

           
            $this->load->view('placement_company_home', $data);

        }else if ($page == "search") {
          $this->load->model('placement_branches');
            $this->load->model('placement_students');
            $data['year_minmax']=$this->placement_students->get_minmax();
            $data['session']=$this->session->all_userdata();
            $data['branch_details'] = $this->placement_branches->get_branches();
            $this->load->view('placement_search', $data);
        }else if ($page == "offers") {
          $this->load->library('encrypt');
          $this->load->model('placement_offers');
            $data['offers_data'] =$this->placement_offers->get_offers_company();
          $data['active']="offers";
           $this->load->view('placement_company_offers', $data);
        } else if ($page == "register") {
          $this->load->library('recaptcha');

                    //Store the captcha HTML for correct MVC pattern use.
          $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();

            $this->load->model('placement_news');
            $data['news_data'] =$this->placement_news->get_news();
            $this->load->view('placement_company_register', $data);
        }else if ($page == "settings") {
          $this->load->view('placement_company_settings', $data);
        } else {
            $this->load->view('404');
        }
        if (!$page = "register") {
            $this->footers("company");
        } else {
            $this->footers("home");
        }
    }
    
    public function upload_profile_pic_student() {
        $config['upload_path'] = 'profile_pics/';
        $config['allowed_types'] = 'jpeg|jpg';
        $config['max_size'] = '500';
        $config['max_width'] = '800';
        $config['max_height'] = '800';
        $config['file_name'] = rand(0, 999999999);
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            
            $this->students('home', $data);
        } else {
            
            //$data['upload_data']= $this->upload->data();
            $this->load->model('placement_students');
            $this->placement_students->profile_pic_update($config['file_name']);
            $this->students('home');
        }
    }
    
    public function upload_resume_student() {
        $config['upload_path'] = 'resume/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '500';
        $config['file_name'] = rand(0, 999999999);
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            
            $this->students('resume', $data);
        } else {
            
            //$data['upload_data']= $this->upload->data();
            $this->load->model('placement_students');
            $this->placement_students->resume_update($config['file_name']);
            $this->students('resume');
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

    public function forgot_pwd($value='')
    {   $data =  array();
         $this->load->library('form_validation', array(), 'forgotpwd_form');
         $this->forgotpwd_form->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
         if (!$this->forgotpwd_form->run()) {
             $data['forgotpwd_form_error_msg'] = validation_errors();
             $this->home("forgotpassword", $data);
         } else {
            

        $this->load->model('placement_admin');
        $this->load->model('placement_students');
        $this->load->model('placement_company');
        if($this->placement_admin->forgot_pwd() || $this->placement_company->forgot_pwd() || $this->placement_students->forgot_pwd()){
            $data['forgotpwd_form_success_msg']="Password reset link has been send to your Email Address";
        }else{
            $data['forgotpwd_form_error_msg']="Email address not found";
        }
            $this->home('forgotpassword',$data );
         }
    }

    public function add_news()
    {
      $this->check_isadmin();
       $this->load->library('form_validation', array(), 'news_form');
       $this->news_form->set_rules('title', 'Title', 'trim|required|xss_clean');

       $this->news_form->set_rules('desc', 'Description', 'trim|required|xss_clean');
        if (!$this->news_form->run() ) {
           $data['news_form_error_msg'] = validation_errors();
            $this->admin("news", $data);
        } else {
            
            $this->load->model('placement_news');
            if ($this->placement_news->add_news()) {
               
                $data['news_form_success_msg'] = "News added successfully";
                $this->admin("news", $data);
            } else {
                
                $data['news_form_error_msg'] = "Adding news failed report this immediately to admin";
                $this->admin("news", $data);
            }
            }
          
    }
    public function add_placements()
    {

       $this->load->library('form_validation', array(), 'placements_form');
       $this->placements_form->set_rules('company', 'Company Name', 'trim|required|xss_clean');
       if($this->session->userdata('admin')=="true")
        $this->placements_form->set_rules('year_pass', 'Year of Passing', 'trim|required|xss_clean');
       $this->placements_form->set_rules('details', 'Details', 'trim|required|xss_clean');
        if (!$this->placements_form->run() ) {
           $data['placements_form_error_msg'] = validation_errors();
            if($this->session->userdata('admin')=="true")
                $this->admin("placement_details", $data);
            else
            $this->students("placements", $data);
        
            
        } else {
            
            $this->load->model('placement_placements');
            if ($this->placement_placements->add_placements()) {
               
                $data['placements_form_success_msg'] = "Placement details added successfully Data would be added after admin verification";
                 if($this->session->userdata('admin')=="true")
            
        {
             $data['placements_form_success_msg'] = "Placement details added successfully";
            $this->admin("placement_details", $data);
        }else
        $this->students("placements", $data);
            } else {
                
                $data['placements_form_error_msg'] = "Adding placement details failed report this immediately to admin";
                if($this->session->userdata('admin')=="true")
            
        {
            $data['placements_form_error_msg'] = "Adding placement details failed report this immediately to developer";
            $this->admin("placement_details", $data);
        }else
        $this->students("placements", $data);
            }
            }
          
    }
    public function students_editmarks() {
        //print_r($this->input->post());
        $this->load->library('form_validation', array(), 'editmarks_form');
        $data['error'] = FALSE;
        $this->editmarks_form->set_rules('edit_percent', 'Percent', 'trim|less_than_or_equal_to[100]|required|xss_clean');
        
        $this->editmarks_form->set_rules('edit_semester', 'Semester', 'trim|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub1', 'Subject 1', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub2', 'Subject 2', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub3', 'Subject 3', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub4', 'Subject 4', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        if($this->input->post('edit_semester')==2){
        $this->editmarks_form->set_rules('edit_sub5', 'Subject 5', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub6', 'Subject 6', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub7', 'Subject 7', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub8', 'Subject 8', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub9', 'Subject 9', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub10', 'Subject 10', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub11', 'Subject 11', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        
          if($this->session->userdata('year_pass')>2015){
            $this->editmarks_form->set_rules('edit_sub12', 'Subject 12', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
          $this->editmarks_form->set_rules('edit_total', 'Total', 'trim|is_natural|less_than_or_equal_to[1650]|required|xss_clean');
          }else
          $this->editmarks_form->set_rules('edit_total', 'Total', 'trim|is_natural|less_than_or_equal_to[1550]|required|xss_clean');
        
        }
        if($this->input->post('edit_semester')==3 || $this->input->post('edit_semester')==4 || $this->input->post('edit_semester')==5 || $this->input->post('edit_semester')==6){
        $this->editmarks_form->set_rules('edit_sub5', 'Subject 5', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub6', 'Subject 6', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub7', 'Subject 7', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub8', 'Subject 8', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_total', 'Total', 'trim|is_natural|less_than_or_equal_to[1100]|required|xss_clean');
        
        }
         if($this->input->post('edit_semester')==7){
          $this->editmarks_form->set_rules('edit_sub5', 'Subject 5', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub6', 'Subject 6', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub7', 'Subject 7', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub8', 'Subject 8', 'trim|is_natural|less_than_or_equal_to[50]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub8', 'Subject 9', 'trim|is_natural|less_than_or_equal_to[50]|required|xss_clean');
          $this->editmarks_form->set_rules('edit_total', 'Total', 'trim|is_natural|less_than_or_equal_to[1050]|required|xss_clean');
        
         }
         if($this->input->post('edit_semester')==8){
          $this->editmarks_form->set_rules('edit_sub5', 'Subject 5', 'trim|is_natural|less_than_or_equal_to[300]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_sub6', 'Subject 6', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->editmarks_form->set_rules('edit_total', 'Total', 'trim|is_natural|less_than_or_equal_to[1000]|required|xss_clean');
        
          
         }
         
        $data['processed']=TRUE;
         if (!$this->editmarks_form->run()) {
            $data['success']=FALSE;
            $data['error'] = TRUE;
            $data['editmarks_form_error_msg'] = validation_errors();
            $this->students("marks", $data);
        } else {
            
            $this->load->model('placement_marks');
            
            if ($this->placement_marks->editmarks()) {
                $this->placement_marks->unverified();
                $this->editmarks_form->clear_field_data();
                $data['success']=TRUE;
                $data['editmarks_form_success_msg'] = "Marks updated successfully";
                $this->students("marks", $data);
            } else {
                $data['success']=FALSE;
                $data['editmarks_form_error_msg'] = "Updating marks failed report this immediately to admin";
                $this->students("marks", $data);
            }
        }
    }
    public function students_addmarks() {
        
        $this->load->library('form_validation', array(), 'addmarks_form');
        $data['error'] = FALSE;
        $this->addmarks_form->set_rules('percent', 'Percent', 'trim|less_than_or_equal_to[100]|required|xss_clean');
        
        $this->addmarks_form->set_rules('add_semester', 'Semester', 'trim|required|xss_clean');
        $this->addmarks_form->set_rules('sub1', 'Subject 1', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub2', 'Subject 2', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub3', 'Subject 3', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub4', 'Subject 4', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        if($this->input->post('add_semester')==2){
        $this->addmarks_form->set_rules('sub5', 'Subject 5', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub6', 'Subject 6', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub7', 'Subject 7', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub8', 'Subject 8', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub9', 'Subject 9', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub10', 'Subject 10', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->addmarks_form->set_rules('sub11', 'Subject 11', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        if ($this->session->userdata('year_pass')>2015) {
          $this->addmarks_form->set_rules('sub12', 'Subject 12', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->addmarks_form->set_rules('total', 'Total', 'trim|is_natural|less_than_or_equal_to[1650]|required|xss_clean');
        
        }else
        $this->addmarks_form->set_rules('total', 'Total', 'trim|is_natural|less_than_or_equal_to[1550]|required|xss_clean');
        
        }
        if($this->input->post('add_semester')==3 || $this->input->post('add_semester')==4 || $this->input->post('add_semester')==5 || $this->input->post('add_semester')==6){
        $this->addmarks_form->set_rules('sub5', 'Subject 5', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub6', 'Subject 6', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub7', 'Subject 7', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->addmarks_form->set_rules('sub8', 'Subject 8', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->addmarks_form->set_rules('total', 'Total', 'trim|is_natural|less_than_or_equal_to[1100]|required|xss_clean');
        
        }
         if($this->input->post('add_semester')==7){
          $this->addmarks_form->set_rules('sub5', 'Subject 5', 'trim|is_natural|less_than_or_equal_to[150]|required|xss_clean');
        $this->addmarks_form->set_rules('sub6', 'Subject 6', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->addmarks_form->set_rules('sub7', 'Subject 7', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->addmarks_form->set_rules('sub8', 'Subject 8', 'trim|is_natural|less_than_or_equal_to[50]|required|xss_clean');
        $this->addmarks_form->set_rules('sub8', 'Subject 9', 'trim|is_natural|less_than_or_equal_to[50]|required|xss_clean');
          $this->addmarks_form->set_rules('total', 'Total', 'trim|is_natural|less_than_or_equal_to[1050]|required|xss_clean');
        
         }
         if($this->input->post('add_semester')==8){
          $this->addmarks_form->set_rules('sub5', 'Subject 5', 'trim|is_natural|less_than_or_equal_to[300]|required|xss_clean');
        $this->addmarks_form->set_rules('sub6', 'Subject 6', 'trim|is_natural|less_than_or_equal_to[100]|required|xss_clean');
        $this->addmarks_form->set_rules('total', 'Total', 'trim|is_natural|less_than_or_equal_to[1000]|required|xss_clean');
        
          
         }

        $data['processed']=TRUE;
         if (!$this->addmarks_form->run()) {
            $data['success']=FALSE;
            $data['error'] = TRUE;
            $data['addmarks_form_error_msg'] = validation_errors();
            $this->students("marks", $data);
        } else {
            
            $this->load->model('placement_marks');
            
            if ($this->placement_marks->addmarks()) {
                $this->placement_marks->unverified();
                $this->addmarks_form->clear_field_data();
                $data['success']=TRUE;
                $data['addmarks_form_success_msg'] = "Marks added successfully";
                $this->students("marks", $data);
            } else {
                $data['success']=FALSE;
                $data['addmarks_form_error_msg'] = "Adding marks failed report this immediately to admin";
                $this->students("marks", $data);
            }
        }
    }
    public function students_update_verify() {
        
        $this->load->library('form_validation', array(), 'update_form');
        $data['error'] = FALSE;
        
        $this->update_form->set_rules('name', 'Name', 'trim|alpha_space|required|xss_clean');
        $this->update_form->set_rules('gender', 'Gender', 'trim|required|xss_clean');
        //$this->update_form->set_rules('branch', 'Branch', 'trim|required|xss_clean');
        $this->update_form->set_rules('semester', 'Semester', 'trim|required|xss_clean');
        $this->update_form->set_rules('dob', 'Date of Birth', 'trim|required|valid_dob|xss_clean');
        $this->update_form->set_rules('mobno', 'Mobile Number', 'trim|exact_length[10]|is_natural_no_zero|required|xss_clean');
//        $this->update_form->set_rules('contactno', 'Contact Number', 'trim|is_natural_no_zero|xss_clean');
        $this->update_form->set_rules('tenth', 'Tenth', 'trim|required|is_natural_no_zero|less_than[100]|xss_clean');
        $this->update_form->set_rules('twelth', 'Twelth', 'trim|required|is_natural_no_zero|less_than[100]|xss_clean');
        $this->update_form->set_rules('entrance_rank', 'Entrance Rank', 'trim|required|is_natural_no_zero|xss_clean');
        $this->update_form->set_rules('perm_addr', 'Permanent Address', 'trim|required|xss_clean');
        $this->update_form->set_rules('temp_addr', 'Current Address', 'trim|xss_clean');
        //$this->update_form->set_rules('year_pass', 'Year of Passing', 'trim|required|is_natural_no_zero|greater_than[2000]|xss_clean');
        
        if (!$this->update_form->run()) {
            
            // $this->load->view('placement_students_update', $data);
            $data['error'] = TRUE;
            $data['update_form_error_msg'] = validation_errors();
            $this->students("update", $data);
        } else {
            
            $this->load->model('placement_students');
            
            if ($this->placement_students->update()) {
                $this->update_form->clear_field_data();
                $data['update_form_success_msg'] = "Profile updated successfully";
                $this->students("update", $data);
            } else {
                $data['update_form_error_msg'] = "Updation failed report this immediately to admin";
                $this->students("update", $data);
            }
        }
    }
    
public function students_register_verify() {
         $this->load->library('recaptcha');
        $this->load->library('form_validation', array(), 'register_form');
        if(base_url()=="http://127.0.0.1/cusat/")
        $this->register_form->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check|xss_clean');
        else
          $this->register_form->set_rules('recaptcha_response_field', 'Captcha', 'trim|required|callback_captcha_check|xss_clean');
        
        $this->register_form->set_rules('name', 'Name', 'trim|alpha_space|required|xss_clean');
        $this->register_form->set_rules('username', 'Username', 'trim|min_length[5]|required|is_unique[students.username]|is_unique[company.username]|is_unique[admin.username]|valid_username|xss_clean');
        $this->register_form->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[students.email]|is_unique[company.email]|xss_clean');
        $this->register_form->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[r_password]|xss_clean');
        $this->register_form->set_rules('branch', 'Branch', 'trim|required|xss_clean');
        $this->register_form->set_rules('r_password', 'RetypePassword', 'trim|required|min_length[8]|xss_clean');
        $this->register_form->set_rules('admnno', 'Admission Number', 'trim|required|numeric|is_natural_no_zero|valid_admnno|xss_clean');
        $this->register_form->set_rules('regno', 'Registration Number', 'trim|required|numeric|greater_than[0]|valid_regno|xss_clean');
        $this->register_form->set_rules('year_pass', 'Year of Passing', 'trim|required|numeric|greater_than[2000]|less_than[2030]|xss_clean');
        
        $this->register_form->set_message('captcha_check', 'Incorrect Captcha');
        
        if (!$this->register_form->run()) {
            
            // $this->load->view('placement_students_register', $data);
            
            $data['register_form_error_msg'] = validation_errors();
            $this->students("register", $data);
        } else {
            
            $this->load->model('placement_students');
            
            if ($this->placement_students->register()) {
                $this->register_form->clear_field_data();
                $data['register_form_success_msg'] = "Registerd successfully wait for confirmation mail to login";
                $this->students("register", $data);
            } else {
                $data['register_form_error_msg'] = "Registration failed report this immediately to admin";
                $this->students("register", $data);
            }
        }
    }
    
    public function company_register_verify() {
      $this->load->library('recaptcha');
        $this->load->library('form_validation', array(), 'company_form');
        $this->company_form->set_rules('companyname', 'Company Name', 'trim|required|xss_clean');
        $this->company_form->set_rules('username', 'Username', 'trim|min_length[5]|required|is_unique[students.username]|is_unique[company.username]|is_unique[admin.username]|valid_username|xss_clean');
        if(base_url()=="http://127.0.0.1/cusat/")
        $this->company_form->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check|xss_clean');
        else
          $this->company_form->set_rules('recaptcha_response_field', 'Captcha', 'trim|required|callback_captcha_check|xss_clean');
        
        $this->company_form->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[students.email]|is_unique[company.email]|xss_clean');
        $this->company_form->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[r_password]|xss_clean');
        $this->company_form->set_rules('r_password', 'RetypePassword', 'trim|required|min_length[8]|xss_clean');
        $this->company_form->set_rules('mobno', 'Mobile Number', 'trim|exact_length[10]|is_natural_no_zero|required|xss_clean');
        $this->company_form->set_rules('website', 'Website', 'trim|required|prep_url|valid_url|xss_clean');
        $this->company_form->set_message('captcha_check', 'Incorrect Captcha');
        if (!$this->company_form->run()) {
            
            // $this->load->view('placement_students_register', $data);
            
            $data['register_form_error_msg'] = validation_errors();
            $this->company("register", $data);
        } else {
            
            $this->load->model('placement_company');
            
            if ($this->placement_company->register()) {
                $this->company_form->clear_field_data();
                $data['register_form_success_msg'] = "Registerd successfully wait for confirmation mail to login";
                $this->company("register", $data);
            } else {
                $data['register_form_error_msg'] = "Registration failed report this immediately to admin";
                $this->company("register", $data);
            }
        }
    }
    
    public function loginverify() {
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        if ($this->form_validation->run() != FALSE) {
            
            // Load the model
            $this->load->model('placement_admin');
            $this->load->model('placement_students');
            $this->load->model('placement_company');
            
            // Validate the user can login
            $result = $this->placement_admin->check_login();
            
            // Now we verify the result
            if ($result == "false") {
                
                // admin check failed
                $result = $this->placement_students->check_login();
                
                if ($result == "false") {
                    
                    // students check failed try company
                    $result = $this->placement_company->check_login();
                    if ($result == "false") {
                        
                        // If user did not validate, then show them login page again
                        $data['login_form_error_msg'] = 'Invalid username and/or password.';
                        $this->home("home", $data);
                    } else if ($result == "true") {
                        redirect('placement/company/home', 'refresh');
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
                    //echo "here";
                    redirect('placement/students/home', 'refresh');
                } else if ($result == "PENDING") {
                    $data['login_form_error_msg'] = 'Account verification pending.';
                    $this->home("home", $data);
                } else if ($result == "REJECT") {
                    $data['login_form_error_msg'] = 'Account has been suspended.';
                    $this->home("home", $data);
                }
            } else if ($result == "true") {
                redirect('placement/admin/home', 'refresh');
                
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
            
            //print_r($this->session->userdata);
            // redirect('placement/home');
            $this->session->sess_destroy();
            $this->load->view('login_to_continue');
           

        }else{
            return TRUE;
        }
    }
    public function check_iscompany() {
        if (!$this->session->userdata('company')) {
            
            //print_r($this->session->userdata);
            // redirect('placement/home');
            $this->session->sess_destroy();
            $this->load->view('login_to_continue');
        }else{
            return TRUE;
        }
    }
     public function check_isadmin() {
        if (!$this->session->userdata('admin')) {
            
            //print_r($this->session->userdata);
            // redirect('placement/home');
            $this->session->sess_destroy();
            $this->load->view('login_to_continue');
        }else{
            return TRUE;
        }
    }
    public function check_iscoordinator()
    {
        if($this->session->userdata('coordinator')!=1 &&  !$this->session->userdata('admin')){

            $this->logout();
        }
    }
}
 ?>
