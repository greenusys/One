<?php
    class ProfileModel extends CI_Model{
        public function getMyDetails($id){
        	// print_r($condition);
        	$this->db->where('user_id',$id);
        	return $this->db->get('users')->result();
        }
        public function getMyAlbum($id){
        	$this->db->where('user_id',$id);
        	return $this->db->get('album_')->result();
        }

        public function GetRecentActivity()
        {          
            $this->db->select('*');
            $this->db->from('recent_activity');
            $this->db->where('done_on >DATE_SUB(CURDATE(),INTERVAL 1 DAY)');
            return $this->db->get()->result();  
        }
        
    }
