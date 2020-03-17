<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	public $notification;
	function __construct(){
		parent::__construct();
		$this->notification = $this->fetchNotification();
	}

	function fetchNotification(){
		$my_Id_=$_SESSION['logged_in'][0]->user_id;
	return $this->db->query("select * from notifications_ where notify_to = '$my_Id_'")->result();
		//print_r($res);
	}

	public function checkFunction(){
		echo 'working Fine';
	}
}


?>