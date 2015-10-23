<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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

	public function index($page="home")
	{
		
       $this->headers();
		if($page=="home"){
		$this->load->view('home_body');
		
		}else{
			$this->load->view('404');
		}
		$this->footers();
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
	public function headers(){
		$this->load->view('bootstrap/header');
		$this->load->view('bootstrap/nav');
	}
	public function footers(){
		$this->load->view('bootstrap/secondary');
		$this->load->view('bootstrap/footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
