<?php
	class AboutModel extends CI_Model{

	function socialLinkUpdate($data){
	 $this->db->where('user_id',$data['user_id']);
	 if($this->db->update('user_details',array('usd_social_link'=>$data['usd_social_link'],'usd_social_type'=>$data['usd_social_type']))){
	 	return true;
		}else{
			return false;
		}
	}

	function phoneUpdate($data){
	 $this->db->where('user_id',$data['user_id']);
	 if($this->db->update('user_details',array('usd_phone'=>$data['usd_num']))){
	 	return true;
		}else{
			return false;
		}
	}

	function addPhoneNo($condition){
		$this->db->where('user_id',$condition['user_id']);
		$res = $this->db->get('user_details')->result();
		if(count($res) < 1){
			 if($this->db->insert('user_details',$condition)){
			 return true;
			}else{
				return false;
			}
		}else{
			$older_num=$res[0]->usd_phone;
			if ($older_num!="" || $older_num!=NULL) {
				$exploder=explode(",",$older_num);
					if (count($exploder)>=2) {
					return false;
			    }
				else{
					$newer_num=explode(",",$condition['usd_phone']);
					$final_nums=array_merge($exploder,$newer_num);
					$final_string=implode(",",$final_nums);
					//print_r($final_nums);
					//$usd_phone = $res[0]->usd_phone.','.$condition['usd_phone'];
					$rsarry= array('usd_phone'=>$final_string,'usd_phone_privacy'=>$condition['usd_phone_privacy']);
					 $this->db->where('user_id',$condition['user_id']);
					 if($this->db->update('user_details',$rsarry)){
					 	return true;
						}else{
							return false;
						}
				}
			}
			else{
			$rsarry= array('usd_phone'=>$condition['usd_phone'],'usd_phone_privacy'=>$condition['usd_phone_privacy']);
			 $this->db->where('user_id',$condition['user_id']);
			 if($this->db->update('user_details',$rsarry)){
			 	return true;
				}else{
					return false;
				}
			}
		}
	}
  function addUserAddress($condition){
  		$this->db->where('user_id',$condition['user_id']);
		$res = $this->db->get('user_details')->result();
		if(count($res) < 1){
			 if($this->db->insert('user_details',$condition)){
			 return true;
			}else{
				return false;
			}
		}else{

			$rsarry= array('usd_address'=>$condition['usd_address'],'usd_address_privacy'=>$condition['usd_address_privacy']);
			 $this->db->where('user_id',$condition['user_id']);
			 if($this->db->update('user_details',$rsarry)){
			 	return true;
				}else{
					return false;
				}
		}
  }

  function addUserWebsite($condition){
  		$this->db->where('user_id',$condition['user_id']);
		$res = $this->db->get('user_details')->result();
		if(count($res) < 1){
			 if($this->db->insert('user_details',$condition)){
			 return true;
			}else{
				return false;
			}
		}else{

			$rsarry= array('usd_website'=>$condition['usd_website'],'usd_website_privacy'=>$condition['usd_website_privacy']);
			 $this->db->where('user_id',$condition['user_id']);
			 if($this->db->update('user_details',$rsarry)){
			 	return true;
				}else{
					return false;
				}
		}
  }

  public function InsertSocial($data){
  		$this->db->insert('user_details',$data);
  		return true;
  }

  public function FetchData($id){
  		$this->db->where('user_id',$id);
		$res = $this->db->get('user_details')->result_array();
		return $res;
  }

  public function UpdateRelStatus($rel_status,$user_id){
  		$this->db->where('user_id',$user_id);
		if($this->db->update('user_details',array('relationship_status'=>$rel_status))){
			 	return true;
				}else{
					return false;
		}
  }

  public function UpdateSocial($new_data,$id){
  		$this->db->where('user_id',$id);
		if($this->db->update('user_details',$new_data)){
			 	return true;
				}else{
					return false;
		}
  }

  public function checkUser($id){
  		$this->db->where('user_id',$id);
		$res = $this->db->get('user_details')->result_array();
		if(count($res)==0){
			return true;
		}
		else{
			return false;
		}
  }

  function addUserSocial($condition){

  }

	public function updateUserdob($condition){
			$this->db->where('user_id',$condition['user_id']);
			 if($this->db->update('users',$condition)){
			 		return true;
				}else{
					return false;
				}
	}

	public function updateUserGender($condition){
		$this->db->where('user_id',$condition['user_id']);
			 if($this->db->update('users',$condition)){
			 		return true;
				}else{
					return false;
				}
	}

	function addUserLanguages($condition){
  		$this->db->where('user_id',$condition['user_id']);
		$res = $this->db->get('user_details')->result();
		if(count($res) < 1){
			 if($this->db->insert('user_details',$condition)){
			 return true;
			}else{
				return false;
			}
		}else{

			$rsarry= array('usd_languages'=>$condition['usd_languages']);
			 $this->db->where('user_id',$condition['user_id']);
			 if($this->db->update('user_details',$rsarry)){
			 	return true;
				}else{
					return false;
				}
		}
	}

	function addUserInterested($condition){
  		$this->db->where('user_id',$condition['user_id']);
		$res = $this->db->get('user_details')->result();
		if(count($res) < 1){
			 if($this->db->insert('user_details',$condition)){
			 return true;
			}else{
				return false;
			}
		}else{

			//$rsarry= array('usd_interested_in'=>$condition['usd_interested_in']);
			 $this->db->where('user_id',$condition['user_id']);
			 if($this->db->update('user_details',$condition)){
			 	return true;
				}else{
					return false;
				}
		}
    }
}
?>