<?php 

	class AdvertisementModel extends CI_Model{ 
		public function insert_new_ad($data,$condition){
			// print_r($data);
			if(count($this->db->where($condition)->get('ads_')->result())==0){
				if($this->db->insert('ads_',$data)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}

	}

?>