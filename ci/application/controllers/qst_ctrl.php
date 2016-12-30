<?php
class qst extends CI_Controller
	{
	public function _construct()
	{
		parent::_construct();
		
		$this->load->library('session');
	}
	public function index()
	{
		if(1)//isset($this->session->userdata('logged_in')))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username']=$session_data['username'];
			$this->load->view('question',$data);
		}
		else
		{
			$this->load->view('login_view');
		}
	}
	public function insert()
	{
		$this->load->model('quest','',TRUE);
		$username=$this->input->post('username');
		$question=$this->input->post('question');
		if($question&&$username)
		{
			$this->quest->insertdb($question,$username);
			$chakka['question']=$question;
			$chakka['username']=$username;
			$this->load->view('view_ques',$chakka);
		}
		else
		{
			$this->load->view('invalid');
		}
	}
}
?>