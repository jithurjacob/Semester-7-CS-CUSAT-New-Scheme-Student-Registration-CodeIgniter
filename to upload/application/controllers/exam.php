<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * see http://codeigniter.com/user_guide/general/urls.html 
	 */

public function degree_list()
{
 $this->load->model('exam_degrees');
        if($this->input->is_ajax_request()){
            $data['college_id']=$this->input->post('college_id');
            $data['degree_data'] =$this->exam_degrees->get_degrees($this->input->post('college_id')); 
        }else
         $data['degree_data'] =$this->exam_degrees->get_degrees(); 
            $this->load->view('exam_degree_list',$data); 
}
	
	public function vision_and_mission()
	{	$this->headers();
        $this->load->view('vision_and_mission');
        $this->footers();
	}
	public function events($page='events')
	{		$this->load->model('Events');
			$this->Model->msg="hi";
			$this->Model->save();

			
	}
	
    public function headers($page = "", $type = "") {
        
        if ($page != "") {
            $data['active'] = $page;
        } else {
            
            $data['active'] = "home";
        }
        
        $this->load->view('bootstrap/exam_header',$data);
        if ($type == "admin") {
          $this->check_isadmin();
            $this->load->view('bootstrap/exam_admin_nav', $data);
        } else if ($type == "students") {
            $this->load->view('bootstrap/exam_students_nav', $data);
        } else if ($type == "college") {
            $this->load->view('bootstrap/exam_college_nav', $data);
        }else if ($page == "view_profile") {

        } else {
            $this->load->view('bootstrap/exam_nav', $data);
        }
    }
    
    public function footers($type = "") {
        if ($type == "admin" || $type == "students" || $type == "college")
            $data['session']=$this->session->all_userdata();
        $this->load->view('bootstrap/exam_secondary');
        $this->load->view('bootstrap/exam_footer');
        if ($type == "admin" || $type == "students" || $type == "college") {
            $this->load->view('security_check');
        }
    }
    
    public function index($page = "home") {
        $this->headers();
        $this->load->model('exam_news');
        $data['news_data'] =$this->exam_news->get_news();
        if ($page == "home") {
          
            $this->load->view('home_body_exam',$data);
        } else {
            $this->load->view('404');
        }
        $this->footers();
    }

    public function students($page, $data = "")
    {
         if(!isset($page)) exit();
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
            $data['news_data'] =$this->exam_news->get_news();
            $this->load->model('exam_colleges');
            $data['clg_details'] = $this->exam_colleges->get_colleges();
            $this->load->view('exam_students_register', $data);
        }else {
            $this->load->view('404');
        }
        
        if (!$page = "register") {
            $this->footers("students");
        } else {
            $this->footers("home");
        }


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
        $this->load->model('exam_news');
        $data['news_data'] =$this->exam_news->get_news();
      }
        if ($page == "home") {
            $data['active'] = "home";
            $this->load->view('home_body_exam', $data);
            
        }else if ($page == "instructions") {
            $data['active'] = "instructions";
            $this->load->view('exam_instructions', $data);
        } else if ($page == "history") {
            $this->load->model('exam_exams');
           //    $this->load->model('exam_students');
        $data['exam_data'] =$this->exam_exams->get_history();
          $data['year_data'] =$this->exam_exams->get_year();
         // $data['student_details'] = $this->exam_students->students_list_name();
            $data['active'] = "history";
            $this->load->view('exam_history', $data);
        }else if ($page == "news_details") {
            
            $this->load->view('exam_news_details', $data);
        }else if ($page == "contact") {
            $data['active'] = "contact";
            $this->load->view('exam_contact', $data);
        }else if ($page == "forgotpassword") {
            $data['active'] = "forgot_pwd";
            $this->load->view('exam_forgotpwd', $data);
        }else if ($page == "resetpwd") {
            $data['active'] = "resetpwd";
            $data['rec']=$rec;
            $this->load->model('exam_admin');
             $this->load->model('exam_college');
              $this->load->model('exam_students');
               $this->load->library('encrypt');
              $user=$this->exam_students->recover($rec);
             // echo $user.$rec;
              if($user=="")
                $user=$this->exam_college->recover($rec);
              if($user=="")
              $user=$this->exam_admin->recover($rec);
            if($user=="")
              $user="invalid";
            $data['user']=$user;
            $this->load->view('exam_resetpwd', $data);
        }

         else {
            $data['active'] = "home";
            $this->load->view('404');
        }
        
        $this->footers();
    }
    

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
