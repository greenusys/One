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
        
    }
?>