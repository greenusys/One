
<?php
	class TestModel extends CI_Model{
		public function updateMyProfilePic($condition,$toUpdate){
			$this->db->where($condition);
			if(count($this->db->get('users')->result())>0){
				$this->db->where($condition);
				if($this->db->update('users',$toUpdate)){
					return true;
				}else{
					return false;
				}
				// echo 'Inside If Block :';
			}else{
				// echo 'Out side ';
				return false;
			}
		}
		public function postNotification($data){
			$this->db->where($data);
			if(count($this->db->get('notifications_')->result())==0){				
				if($this->db->insert('notifications_',$data)){
					return true;
				}else{
					return false;
				}
				// echo 'Inside If Block :';
			}else{
				// echo 'Out side ';
				return false;
			}
		}
		public function getRandomUser($id){
    		$FrdsArr=$this->getMyFriends($id);
		
			  
			if(count($FrdsArr)>0) {
				foreach ($FrdsArr as $each) {
					$friends[]=$each->user_id;
				}
				array_push($friends,$id);
				$ids = join("','",$friends);
				$sql = "SELECT * FROM users  WHERE user_id NOT IN ('$ids') order by rand() ";
			}else{
				$sql = "SELECT * FROM users  WHERE user_id NOT IN ('$id') order by rand() ";
			}
			
			return $this->db->query($sql)->result();
    		// return $res;
		}
		public function getMyFriends($myId){
			$result=$this->db->query("select * from friends_ join users on users.user_id=friends_.user_id where friends_.friend_id='$myId'")->result(); 
    		$result_=$this->db->query("select * from friends_ join users on users.user_id=friends_.friend_id where friends_.user_id='$myId'")->result();
    		$myFriends=array_merge($result_,$result);
			return $myFriends;
		}

		public function search_friends($name){
			$result=$this->db->select('*')->from('users')->where("full_name LIKE '%$name%'")->get()->result_array();
			return $result;
		}
		 public function fetchCountries()
    {
         return $this->db->get('countries')->result();
    }
    public function fetchState_Byid($countryid)
	{
		$this->db->where('country_id',$countryid);
		return $this->db->get('states')->result();
	}
	public function fetchCities_Byid($stateId)
	{
		$this->db->where('state_id',$stateId);
		return $this->db->get('cities')->result();
	}
    
			public function insert_JobPostData($data)
    	{
    		$this->db->where($data);
    		$re=$this->db->get('jobpost_')->result();
    		if(count($re)==0)
    		{
    			$results=$this->db->insert('jobpost_',$data);
    			if($results)
    			{
    				return 1;
    			}
    			else
    			{
    				return 0;
    			}
    
    		}
    		else
    		{
    			return 2;
    	    }
	    }
    	public function fetchJobPostData()
    	{
    	   return $this->db->get('jobpost_')->result();
    	}


		public function makefvrtData($data)
	    {
	        $this->db->where($data);
    		$re=$this->db->get('user_fav_section')->result();
    		if(count($re)==0)
    		{
    			$results=$this->db->insert('user_fav_section',$data);
    			if($results)
    			{
    				return 1;
    			}
    			else
    			{
    				return 0;
    			}
    
    		}
    		else
    		{
    			$this->db->where($data);
  				$res = $this->db->delete('user_fav_section'); 
    			return 2;
    	    }
	        
	    }
	    public function favphoto(){
    		$this->db->join('users','users.user_id=user_fav_section.user_id');
        	$this->db->join('album_','album_.album_id=user_fav_section.album_id');
        	$re=$this->db->get('user_fav_section')->result();
	        return $re;
	        
	    }
	    public function favchat(){
        	$this->db->join('users','users.user_id=user_fav_section.user_id');
        	$this->db->join('messages_','messages_.msg_id=user_fav_section.conversation_id');
    		$re=$this->db->get('user_fav_section')->result();
	        return $re;
	    }
	    public function followUser($data){
	    	 // `follow_user`(`id`, `user_id`, `follow_to`, `followed_on`)
	    	 if(count($this->db->where($data)->get('follow_user')->result())==0){
	    	 	if($this->db->insert('follow_user',$data)){
	    	 		return 1;
	    	 	}else{
	    	 		return 0;
	    	 	}
	    	 }else{
	    	 	return 2;
	    	 }

	    }
	    public function UpComingBirthdays(){
	    	$id=$_SESSION['logged_in'][0]->user_id ;
	    	// $id=10;
	    	$FrdsArr=$this->getMyFriends($id);
			$myFrndUpcomingBdy=array();
			if(count($FrdsArr)>0){
				foreach ($FrdsArr as $each) {
					$friends[]=$each->user_id;
				}
				$ids = join("','",$friends);   
				$sql = "SELECT users.full_name, users.profile_picture, users.date_of_birth, users.user_id, users.cover_photo FROM users  WHERE users.user_id IN ('$ids') group by users.date_of_birth";
				if(count($data=$this->db->query($sql)->result())>=0){
	    	 	foreach ($data as $value) {
	    	 		$d_o_b=date('d-m-Y', strtotime($value->date_of_birth));
	    	 		$month=date('m', strtotime($value->date_of_birth));
	    	 		$this_month=date('m');
	    	 		$effectiveMonth = date('m', strtotime("+3 months"));
	    	 		$effectiveMonth;
	    	 		if(($month < $effectiveMonth)&& ($month>=$this_month)){
	    	 			$myFrndUpcomingBdy[]=$value;
	    	 		}	
	    	 	}
	    	 }
			}
			return $myFrndUpcomingBdy;
	    }
	    public function addAdvertisement(){
	    	
	    }
	}
?>

