<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();

class VerifyLogin extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->library('session');
 }

 public function index()
 {
   $this->load->library('form_validation');
   //$this->form_validation->set_rules('username','username','trim|required|xss_clean');
  // $this->form_validation->set_rules('password','password','trim|required|xss_clean');
   //if($this->form_validation->run()==FALSE)
   //{
   //   $this->load->view('login_view');
  // }
   //else
   //{
      $username=$this->input->post('username');
      $password=$this->input->post('password');
      $result=$this->user->login($username,$password);
    if($result)
    {
      $session_data = array(
      'username' => $result[0]->username,
      );
      $this->session->set_userdata('logged_in', $session_data);
      redirect('qst/index','refresh');
    }
    else
    {
      //$this->load->view('invalid');
      $this->load->view('invalid');
    }
//}
 }
}
?>

