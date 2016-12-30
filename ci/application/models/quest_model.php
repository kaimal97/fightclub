<?php
class Quest extends CI_Model
{
	function insertdb($question,$username)
	{
		$time=date('m/d/Y h:i:s a', time());
		$this->db->set('question',strip_tags($question));
		$this->db->set('username',$username);
		$this->db->set('time',$time);
		$this->db->insert_id();
		$this->db->insert("questable");
	}
}
?>