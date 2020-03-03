<?php
	class Rahul extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('TestModel', 'Demo');
		}
		public function followUser(){
			$data=array(
							"user_id"=>$this->input->post('follow_by'),
							"follow_to"=>$this->input->post('follow_to')
						);
			$status=$this->Demo->followUser($data);
			switch ($status) {
				case 0:die(json_encode(array("code"=>0,"data"=>"Failed To Follow.")));
					break;
				case 1:die(json_encode(array("code"=>1,"data"=>"Follow Successfully.")));
					break;
				case 2:die(json_encode(array("code"=>2,"data"=>"You Follow This User Already.")));
					break;
				default:
					die(json_encode(array("code"=>3,"data"=>"Server Error.")));
					break;
			}
		}
		public function UpComingBirthdays(){
			$result=$this->Demo->UpComingBirthdays();
			if(count($result)>0){
				die(json_encode(array("code"=>1,"data"=>$result)));
			}else{
				die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
			}
		}
		public function addAdvertisement(){
	    	
	    }
	}

?>