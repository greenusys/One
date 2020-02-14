<<<<<<< HEAD
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
    		$re=$this->db->get('Jobpost_')->result();
    		if(count($re)==0)
    		{
    			$results=$this->db->insert('Jobpost_',$data);
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
    	   return $this->db->get('Jobpost_')->result();
    	}
	     
	}
?>
=======
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
	}
?>
>>>>>>> 26781e4687724a9f5cafcf548fad229aad328a06
