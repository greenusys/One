<?php
	class AboutModel extends CI_Model{

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
  function addUserSocial($condition){
  		$this->db->where('user_id',$condition['user_id']);
		$res = $this->db->get('user_social_details')->result();
	
			$temp =1;
			//echo count($condition['us_social_link']);
			for($i=0 ; $i < count($condition['us_social_link']);$i++){
				$cond = array("user_id"=>$condition['user_id'],"us_social_link"=>$condition['us_social_link'][$i],"us_social_type"=>$condition['us_social_type'][$i]);
				
				if(!$this->db->insert('user_social_details',$cond)){
					$temp =0;
				}
			}
			 if($temp==1){
			 return true;
			}else{
				return false;
			}
		// }else{

		// 	$rsarry= array('us_social_link'=>$condition['us_social_link'],'us_social_type'=>$condition['us_social_type'],'us_social_privacy'=>$condition['us_social_privacy']);
		// 	 $this->db->where('user_id',$condition['user_id']);
		// 	 if($this->db->update('user_social_details',$rsarry)){
		// 	 	return true;
		// 		}else{
		// 			return false;
		// 		}
		// }
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