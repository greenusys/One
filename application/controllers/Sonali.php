<?php  
  /**
   * 
   */
  class Sonali extends CI_Controller
  {
  	
  	// function __construct(argument)
  	// {
  	// 	# code...
  	// }
  	public function  jobslist()
  	{
  		$this->load->view('web/template/header');
  		$this->load->view('web/joblist');

  	}
  }
?>