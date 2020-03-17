<?php  
  /**
   * 
   */
  class Jobs extends CI_Controller
  {
  	
  function __construct(){
      parent::__construct();
      $this->load->model('JobModel');
       $this->load->model('TestModel','Test');
    }
  	public function  jobslist()
  	{  
      $data['fetchjobpost']=$this->Test->fetchJobPostData();
  		$this->load->view('web/template/header');
  		$this->load->view('web/joblist',$data);

  	}
  }
?>